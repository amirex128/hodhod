<?php

namespace App\Http\Controllers;

use App\model\Setting;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('Setting.create', ['setting' => Setting::all()]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\setting  $setting
     * @return Response
     */
    public function show(setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\setting  $setting
     * @return Response
     */
    public function edit(setting $setting)
    {
        //
    }

    public function update(Request $request, $setting)
    {

//        $array = [];
//        for ($i = 0; $i < 5; $i++) {
//            if ($request->image[$i]) {
//                $pathImage = $this->uploading($request->image[$i]);
//                $array[] = [$request->name[$i], $request->address[$i], $pathImage];
//
//            } else {
//
//                $array[] = [
//                    $request->name[$i], $request->address[$i],
//                    isset(Setting::find(1)->value[$i][2]) ? Setting::find(1)->value[$i][2] : "upload/noimage.png"
//                ];
//            }
//
//        }
//        if (!Setting::whereName('social')->count() > 0) {
//            Setting::create([
//                "id" => 1,
//                "name" => 'social',
//                "value" => $array,
//            ]);
//        } else {
//            Setting::find(1)->update([
//                "name" => 'social',
//                "value" => $array,
//            ]);
//        }
/////////////////////////////////////////////////////////////////////

        if (!Setting::whereName('title')->count() > 0) {
            Setting::create([
                "id" => 2,
                "name" => 'title',
                "value" => $request->title,
            ]);
        } else {
            Setting::find(2)->update([
                "name" => 'title',
                "value" => $request->title,
            ]);
        }
/////////////////////////////////////////////////////////////////////
        if (!Setting::whereName('about')->count() > 0) {
            Setting::create([
                "id" => 3,
                "name" => 'about',
                "value" => $request->about,
            ]);
        } else {
            Setting::find(3)->update([
                "name" => 'about',
                "value" => $request->about,
            ]);
        }
/////////////////////////////////////////////////////////////////////

        if (!Setting::whereName('warranty')->count() > 0) {
            Setting::create([
                "id" => 4,
                "name" => 'warranty',
                "value" => $request->warranty,
            ]);
        } else {
            Setting::find(4)->update([
                "name" => 'warranty',
                "value" => $request->warranty,
            ]);
        }
/////////////////////////////////////////////////////////////////////

        if (!Setting::whereName('special')->count() > 0) {
            Setting::create([
                "id" => 5,
                "name" => 'special',
                "value" => $request->special == "on" ? "on" : "off",
            ]);
        } else {
            Setting::find(5)->update([
                "name" => 'special',
                "value" => $request->special == "on" ? "on" : "off",
            ]);
        }
/////////////////////////////////////////////////////////////////////

        if (!Setting::whereName('offer')->count() > 0) {
            Setting::create([
                "id" => 6,
                "name" => 'offer',
                "value" => $request->offer == "on" ? "on" : "off",
            ]);
        } else {
            Setting::find(6)->update([
                "name" => 'offer',
                "value" => $request->offer == "on" ? "on" : "off",
            ]);
        }
/////////////////////////////////////////////////////////////////////


        if (!Setting::whereName('popular')->count() > 0) {
            Setting::create([
                "id" => 7,
                "name" => 'popular',
                "value" => $request->popular == "on" ? "on" : "off",
            ]);
        } else {
            Setting::find(7)->update([
                "name" => 'popular',
                "value" => $request->popular == "on" ? "on" : "off",
            ]);
        }
/////////////////////////////////////////////////////////////////////
        if (!Setting::whereName('new')->count() > 0) {
            Setting::create([
                "id" => 8,
                "name" => 'new',
                "value" => $request->new == "on" ? "on" : "off",
            ]);
        } else {
            Setting::find(8)->update([
                "name" => 'new',
                "value" => $request->new == "on" ? "on" : "off",
            ]);
        }
/////////////////////////////////////////////////////////////////////
        if (!Setting::whereName('logo')->count() > 0) {

            if ($request->logo) {
                $pathLogo = $this->uploading($request->logo);
            } else {
                $pathLogo = "upload/noimage.png";
            }

            Setting::create([
                "id" => 9,
                "name" => 'logo',
                "value" => $pathLogo,
            ]);
        } else {
            if ($request->logo) {
                $pathLogo = $this->uploading($request->logo);
                Setting::find(9)->update([
                    "name" => 'logo',
                    "value" => $pathLogo,
                ]);
            }

        }
/////////////////////////////////////////////////////////////////////
        if (!Setting::whereName('image_about')->count() > 0) {
            if ($request->image_about) {
                $pathabout = $this->uploading($request->image_about);
            } else {
                $pathabout = "upload/noimage.png";
            }
            Setting::create([
                "id" => 10,
                "name" => 'image_about',
                "value" => $pathabout,
            ]);
        } else {
            if ($request->image_about) {
                $pathabout = $this->uploading($request->image_about);
                Setting::find(10)->update([
                    "name" => 'image_about',
                    "value" => $pathabout,
                ]);
            }

        }
/////////////////////////////////////////////////////////////////////

        if (!Setting::whereName('image_menu')->count() > 0) {
            if ($request->image_menu) {
                $pathmenu = $this->uploading($request->image_menu);
            } else {
                $pathmenu = "upload/noimage.png";
            }
            Setting::create([
                "id" => 11,
                "name" => 'image_menu',
                "value" => $pathmenu,
            ]);
        } else {
            if ($request->image_menu) {
                $pathmenu = $this->uploading($request->image_menu);
                Setting::find(11)->update([
                    "name" => 'image_menu',
                    "value" => $pathmenu,
                ]);
            }

        }
/////////////////////////////////////////////////////////////////////

        if (!Setting::whereName('telegram_channel')->count() > 0) {
            Setting::create([
                "id" => 12,
                "name" => 'telegram_channel',
                "value" => $request->telegram_channel,
            ]);
        } else {
            Setting::find(12)->update([
                "name" => 'telegram_channel',
                "value" => $request->telegram_channel,
            ]);
        }
        /////////////////////////////////////////////////////////////////////

        if (!Setting::whereName('telegram_admin')->count() > 0) {
            Setting::create([
                "id" => 13,
                "name" => 'telegram_admin',
                "value" => $request->telegram_admin,
            ]);
        } else {
            Setting::find(13)->update([
                "name" => 'telegram_admin',
                "value" => $request->telegram_admin,
            ]);
        }
        /////////////////////////////////////////////////////////////////////

        if (!Setting::whereName('email')->count() > 0) {
            Setting::create([
                "id" => 14,
                "name" => 'email',
                "value" => $request->email,
            ]);
        } else {
            Setting::find(14)->update([
                "name" => 'email',
                "value" => $request->email,
            ]);
        }
        /////////////////////////////////////////////////////////////////////

        if (!Setting::whereName('tax')->count() > 0) {
            Setting::create([
                "id" => 15,
                "name" => 'tax',
                "value" => $request->tax,
            ]);
        } else {
            Setting::find(15)->update([
                "name" => 'tax',
                "value" => $request->tax,
            ]);
        }
        /////////////////////////////////////////////////////////////////////

        if (!Setting::whereName('tax_status')->count() > 0) {
            Setting::create([
                "id" => 16,
                "name" => 'tax_status',
                "value" => $request->tax_status,
            ]);
        } else {
            Setting::find(16)->update([
                "name" => 'tax_status',
                "value" => $request->tax_status,
            ]);
        }
        /////////////////////////////////////////////////////////////////////

        if (!Setting::whereName('tax_type')->count() > 0) {
            Setting::create([
                "id" => 17,
                "name" => 'tax_type',
                "value" => $request->tax_type,
            ]);
        } else {
            Setting::find(17)->update([
                "name" => 'tax_type',
                "value" => $request->tax_type,
            ]);
        }
        /////////////////////////////////////////////////////////////////////

        if (!Setting::whereName('phone')->count() > 0) {
            Setting::create([
                "id" => 18,
                "name" => 'phone',
                "value" => $request->phone,
            ]);
        } else {
            Setting::find(18)->update([
                "name" => 'phone',
                "value" => $request->phone,
            ]);
        }
        return back()->with('status','تنظیمات شما با موفقیت بروز شد');
    }

}
