<?php

namespace App\Http\Controllers;

use App\model\Discount;
use DebugBar\DebugBar;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Morilog\Jalali\Jalalian;

class DiscountController extends Controller
{

    public function index()
    {

        $name="Discount";
        $model=new Discount();
        return $this->indexForRecycle($name,$model);
    }


    public function create()
    {
        return view('Discount.create');
    }


    public function store(Request $request)
    {


        $request->validate([
           "title"=>"required",
           "code"=>"required",
           "price"=>"required",
        ]);

         Discount::create([
        "title"=>$request->title,
        "code"=>$request->code,
        "type"=>(int)$request->type_discount,
        "price"=>$request->price,
        "max_user"=>check($request->max_user),
        "max_price"=>check($request->max_price),
        "min_price"=>check($request->min_price),
        "users"=>$request->users,
        "user_id"=>auth()->user()->id,
        "expire"=>(new Jalalian(\request('year'), \request('month'), \request('day')))->toCarbon(),
        ]);

        return redirect()->route('discount.index')->with('status','کد تخفیف شما با موفقیت ایجاد شد');
    }


    public function edit(Discount $discount)
    {




        return view('Discount.edit',['discount'=>$discount]);
    }


    public function update(Request $request, Discount $discount)
    {



        $request->validate([
            "title"=>"required",
            "code"=>"required",
            "price"=>"required",
        ]);

        $discount->update([
            "title"=>$request->title,
            "code"=>$request->code,
            "type"=>(int)$request->type_discount,
            "price"=>$request->price,
            "max_user"=>check($request->max_user),
            "max_price"=>check($request->max_price),
            "min_price"=>check($request->min_price),
            "users"=>$request->users,
            "user_id"=>auth()->user()->id,
            "expire"=>(new Jalalian(\request('year'), \request('month'), \request('day')))->toCarbon(),
        ]);

        return redirect()->route('discount.index')->with('status','کد تخفیف شما با موفقیت بروزرسانی شد');

    }


    public function destroy(Discount $discount)
    {
        $discount->delete();

        return redirect()->route('discount.index')->with(['status'=>'کد تخفیف شما با موفقیت حذف شد','type'=>'danger']);
    }

    public function forceDestroy()
    {
        $article=Discount::whereId((int)request("model"));
        $article->forceDelete();
        return redirect()->route('discount.index')->with('status','کد تخفیف با موفقیت به صورت کامل حذف گردید')->with('type','danger');
    }

    public function restore()
    {
        $article=Discount::whereId((int)request("model"));
        $article->restore();
        return redirect()->route('discount.index')->with('status','کد تخفیف با موفقیت بازیابی گردید')->with('type','success');

    }
}
