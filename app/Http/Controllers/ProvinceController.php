<?php

namespace App\Http\Controllers;

use App\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{

    public function index()
    {
        return view('Province.index',['provinces'=>\App\model\Province::paginate(15)]);
    }



    public function store(Request $request)
    {
        foreach ($request->except('_token') as $key=>$item){
            \App\model\Province::find($key)->update([
                "price"=>$item
            ]);
        }

        return back()->with('status','هزینه حمل و نقل شما با موفقیت بروز رسانی شد');
    }


}
