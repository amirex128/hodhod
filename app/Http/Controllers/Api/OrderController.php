<?php

namespace App\Http\Controllers\Api;

use App\Event\Event\newOrderEvent;
use App\Http\Controllers\Controller;
use App\model\Discount;
use App\model\Order;
use App\model\Product;
use App\model\Province;
use App\model\Setting;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use SoapClient;

class OrderController extends Controller
{
//    ارسال کاربر به صفحه انتقال به درگاه

    public function checkout(Order $order)
    {
        return view('payment.index', ['order' => $order]);
    }


    public function payment(Order $order)
    {
//        بررسی این که سفارش فعلی مربوط به فردی است که سفارش را ایجاد کرده
        if (auth()->user()->id != $order->user_id) {
            return view('payment.back', ['order' => $order, 'status' => "این سفارش متعلق به شما نیست"]);

        }

        // برسی این که آیا این سفارش قبلا پرداخت شده یا نه
        if ($order->status == 2 || $order->payment_status == 3) {
            return view('payment.back', ['order' => $order, 'status' => "شما قبلا این سفارش را پرداخت کرده اید"]);
        }

        // اطلاعات پرداخت

        $MerchantID = config('services.zarinpal.merchantID');
        $Amount = $order->total_price; //Amount will be based on Toman - Required
        $Description = $order->user_description ?: "hodhod"; // Required
        $Email = $order->user->email; // Optional
        $Mobile = $order->receiver_mobile; // Optional
        $CallbackURL = url()->to('api/v1/success/'.$order->id); // Required


        $client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

        $result = $client->PaymentRequest(
            [
                'MerchantID' => $MerchantID,
                'Amount' => $Amount,
                'Description' => $Description,
                'Email' => $Email,
                'Mobile' => $Mobile,
                'CallbackURL' => $CallbackURL,
            ]
        );

        // دریافت کد انتقال به درگاه و ذخیره در دیتابیس

        $order->payment_authority = $result->Authority;


//  اگر کد ارسال به درگاه درست باشد کاربر به صفحه درگاه انتقال پیدا میکند

        if ($result->Status == 100) {
            $order->payment_status = 1;
            $order->status = 1;
            $order->save();
            return redirect()->to('https://www.zarinpal.com/pg/StartPay/'.$result->Authority);
        } else {
            $order->payment_status = 2;
            $order->save();
            return "پرداخت شما ناموفق بود";
        }

    }


    //  بازگشت کاربر از صفحه درگاه

    public function success(Order $order)
    {

//         دریافت مبلغ پرداخت و کد درگاه جهت بررسی صحت پرداخت
        $MerchantID = config('services.zarinpal.merchantID');
        $Amount = $order->total_price; //Amount will be based on Toman
        $Authority = $order->payment_authority;


        // ارسال اطلاعات به زرین پال جهت بررسی صحت پرداخت
        if (\request('Status') == 'OK') {

            $client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

            $result = $client->PaymentVerification(
                [
                    'MerchantID' => $MerchantID,
                    'Authority' => $Authority,
                    'Amount' => $Amount,
                ]
            );

            foreach ($order->order_item as $item) {

                $item->product->decrement('stock',$item->count);
                $item->product->save();

                if ($item->product->stock<=0){
                    $item->product->situation=3;
                    $item->product->save();
                }
            }


// درصورت موفقیت آموزش بودن پرداخت مراحل زیر انجام میشود
            if ($result->Status == 100) {
                $order->payment_status = 3;
                $order->status = 2;
                $order->payment_reference = $result->RefID;
                $order->save();
                event(new newOrderEvent($order,true));

                return view('payment.back', ['status' => "پرداخت شما موفقیت آمیز بود", 'order' => $order,"code"=>"success"]);

            } else {

                $order->status = 1;
                $order->payment_status = 4;
                $order->save();

                return view('payment.back', ['status' => "پرداخت با شکست مواجه شد", 'order' => $order,"code"=>"fail"]);
            }
        } else {
//             در صورت کنسل کردن عملیات پرداخت کد های زیر اجرا میشود
            $order->status = 1;
            $order->payment_status = 5;
            $order->save();

            return view('payment.back', ['status' => "پرداخت توسط شما کنسل شد", 'order' => $order,"code"=>"cancel"]);
        }
    }


    public function storeOrder(Request $request)
    {
//
//        if (count(Order::selectRaw("MAX(created_at) as max,user_id")->groupBy("user_id")->where("user_id", auth()->id())->get())>0){
//            // دریافت آخرین سفارش ایجاد شده توسط کاربری خاص
//            $lastOrder = new Carbon(Order::selectRaw("MAX(created_at) as max,user_id")->groupBy("user_id")->where("user_id", auth()->id())->get()[0]->max);
//
//
////        return [Carbon::now(),$lastOrder];
////        return Carbon::now()->diffInMinutes($lastOrder);
//            if (Carbon::now()->diffInSeconds($lastOrder)<1){
//
//                 $newOrder=Order::where("user_id",auth()->id())->latest()->first();
//                event(new newOrderEvent($newOrder));
//                return $newOrder;
//            }
//            else{
//
////        ساخت یک سفارش
//                return Order::create([
//                    "user_id" => auth()->id(),
//                    "province_id" => $request->province_id,
//                    "province_price" => Province::find($request->province_id)->price,
//                    "receiver_name" => $request->receiver_name,
//                    "receiver_mobile" => $request->receiver_mobile,
//                    "state" => $request->state,
//                    "city" => $request->city,
//                    "location" => $request->location,
//                    "address" => $request->address,
//                    "postal_code" => $request->postal_code,
//                    "surprize" => $request->surprize ? 1 : 0,
//                    "home_phone" => $request->home_phone,
//                    "code_phone" => $request->code_phone,
//                    "payment_type" => $request->payment_type,
//
//                    "time_receive" => $request->time_receive,
//                    "receive_at" => $request->receive_at,
//
//                    "admin_description" => $request->admin_description ?: '',
//                    "user_description" => $request->user_description ?: '',
//                    "payment_status" => 0,
//                    "status" => 0
//                ]);
//            }
//
//        }else{
//             $newOrder=Order::create([
//                "user_id" => auth()->id(),
//                "province_id" => $request->province_id,
//                "province_price" => Province::find($request->province_id)->price,
//                "receiver_name" => $request->receiver_name,
//                "receiver_mobile" => $request->receiver_mobile,
//                "state" => $request->state,
//                "city" => $request->city,
//                "location" => $request->location,
//                "address" => $request->address,
//                "postal_code" => $request->postal_code,
//                "surprize" => $request->surprize ? 1 : 0,
//                "home_phone" => $request->home_phone,
//                "code_phone" => $request->code_phone,
//                "payment_type" => $request->payment_type,
//
//                 "time_receive" => $request->time_receive,
//                 "receive_at" => $request->receive_at,
//
//                 "admin_description" => $request->admin_description ?: '',
//                "user_description" => $request->user_description ?: '',
//                "payment_status" => 0,
//                "status" => 0
//            ]);
//
//             event(new newOrderEvent($newOrder));
//            return $newOrder;
//
//        }

        return Order::create([
            "user_id" => auth()->id(),
            "province_id" => $request->province_id,
            "province_price" => Province::find($request->province_id)->price,
            "receiver_name" => $request->receiver_name,
            "receiver_mobile" => $request->receiver_mobile,
            "state" => $request->state,
            "city" => $request->city,
            "location" => $request->location,
            "address" => $request->address,
            "postal_code" => $request->postal_code,
            "surprize" => $request->surprize ? 1 : 0,
            "home_phone" => $request->home_phone,
            "code_phone" => $request->code_phone,
            "payment_type" => $request->payment_type,

            "time_receive" => $request->time_receive,
            "receive_at" => Carbon::parse($request->receive_at),

            "admin_description" => $request->admin_description ?: '',
            "user_description" => $request->user_description ?: '',
            "payment_status" => 0,
            "status" => 0
        ]);



    }


    public function storeItem(Request $request, Order $order)
    {
        $total_price = 0;

        // ثبت تمامی محصولات موجود در سبد خرید و محاسبه قیمت
        foreach ($request->except(["token", "discount_code", "total_price"]) as $item) {
            $product=Product::find((int) $item['product_id']);
           if($item['count']> $product->stock)
               return response(["message" => "stock error"], 409);

            $order->order_item()->create([
                'product_id' => (int) $item['product_id'],
                'color_id' => $item['color_id'],
                'size_id' => $item['size_id'],
                'count' => $item['count'],
                'price' => $item['price'],
            ]);


            // قیمت کل محصولات موجود در سبد خرید
            $total_price += Product::find((int) $item["product_id"])->offer * $item['count'];
        }
        $order->total_raw=$total_price;

        ///////////////////////////////////////////

        if ($request->has("discount_code")){

            // بررسی وجود کد تخفیف ارسال شده و ایجاد نمونه از آن
            if (Discount::where("code", $request->discount_code)->exists() && Discount::where("code", $request->discount_code)->first()->max_user > 0) {


                if (count((array) Discount::where("code", $request->discount_code)->first()->users) == 0) {

                    //    پیدا کردن مدل کد تخفیف
                    $discount = Discount::where("code", $request->discount_code)->first();

                    //   کم کردن یک واحد از میزان استفاده از کد تخفیف
                    $discount->decrement("max_user");
                    $discount->save();

//       اتصال کد تخفیف به مدل سفارش
                    $order->discount()->associate($discount->id);

                    $order->save();

                    // بررسی تاریخ انقضا کد تخفیف ارسال شده
//            اگر اختلاف مثبت باشد منقضی نشده و اگر منفی باشد منقضی شده
                    if ((Carbon::now()->diffInMinutes(new Carbon($discount->expire), false)) > 0) {
//            اگر کد تخفیف منقضی تشده بود

                        // بررسی حداقل قیمت کد تخفیف
//                اگر مبلغ کل کمتر از احداقل میزان سفارش بود کد تخفیف اعمال نمیشود
                        if ($total_price < $discount->min_price) {

                            $order->total_price= $total_price + $order->province_price;
                            $order->discount_price=0;
                        } else {

                            // بررسی حداکثر قیمت کد تخفیف
                            if ($total_price > $discount->max_price) {

                                $order->total_price= $total_price + $order->province_price;
                                $order->discount_price=0;

                            } else {

                                // اگر کد تخفیف درصد بود

                                if ($discount->type == 1) {

                                    $off = $discount->price / 100;

                                    $decrease = $off * $total_price;


                                    $order->total_price= ($total_price - $decrease) + $order->province_price;
                                    $order->discount_price=$decrease;

                                    // اگر کد تخفیف تومان بود

                                }
                                elseif ($discount->type == 2) {

                                    $order->total_price= ($total_price - $discount->price) + $order->province_price;
                                    $order->discount_price=$discount->price;

                                }

                            }

                        }


                    }
                    else {

// اگر کد تخفیف منقضی شده بود

            $order->total_price = $total_price + $order->province_price;
                        $order->total_price= $total_price + $order->province_price;

                        $order->discount_price=0;

                    }
                }
                else {

                    foreach ((array) Discount::where("code", $request->discount_code)->first()->users as $item) {

                        if (User::find((int) $item)->id == auth()->id()) {
                            $discount = Discount::where("code", $request->discount_code)->first();

                            $discount->decrement("max_user");
                            $discount->save();
                            $order->discount()->associate($discount->id);

                            $order->save();

                            // بررسی تاریخ انقضا کد تخفیف ارسال شده
                            if ((Carbon::now()->diffInHours(new Carbon($discount->expire), false)) > 0) {
//            اگر کد تخفیف منقضی تشده بود

                                // بررسی حداقل قیمت کد تخفیف
                                if ($total_price < $discount->min_price) {
                                    $order->discount_price=0;
                                    $order->total_price = $total_price + $order->province_price;

                                } else {

                                    // بررسی حداکثر قیمت کد تخفیف

                                    if ($total_price > $discount->max_price) {
                                        $order->discount_price=0;
                                        $order->total_price = $total_price + $order->province_price;

                                    } else {

                                        // اگر کد تخفیف درصد بود

                                        if ($discount->type == 1) {

                                            $off = $discount->price / 100;

                                            $decrease = $off * $total_price;


                        $order->total_price = ($total_price - $decrease) + $order->province_price;
                                            $order->discount_price=$decrease;

//                                            return ($total_price - $decrease) + $order->province_price;

                                            // اگر کد تخفیف تومان بود

                                        } elseif ($discount->type == 2) {

                        $order->total_price = ($total_price - $discount->price) + $order->province_price;
                                            $order->discount_price=$discount->price;

//                                            return ($total_price - $discount->price) + $order->province_price;

                                        }

                                    }

                                }


                            } else {

// اگر کد تخفیف منقضی شده بود

            $order->total_price = $total_price + $order->province_price;
//                                return $total_price + $order->province_price;


                            }


                        }

                    }


                    $order->total_price= $total_price + $order->province_price;


                }


            }
            else {

// اگر کد تخفیف وجود نداشت و تعداد استفاده از کد تخفیف به پایان رسیده بود

                $order->total_price = $total_price + $order->province_price;

            }

        }
        else{
            $order->total_price = $total_price + $order->province_price;
        }


        ///////////////////////////////////////////////

        $order->save();

        // ارسال به صفحه درگاه پرداخت
        return response(["checkout" => url()->to('api/v1/payment/'.$order->id)], 201);
    }


    public function getAllOrder()
    {
        return auth()->user()->order()->has("order_item")->get();
    }


    public function allUser()
    {
        return auth()->user()->order->has("order_item", ">", "0")->get();
    }

    public function getOrderMain(Order $order)
    {
        if (auth()->check()) {
            if (auth()->user()->order->contains($order->id)) {
                $order->order_item;
                return $order;
            } else {
                return Response('not your order', 403);
            }
        } else {
            return Response('not auth', 401);

        }

    }
}
