<?php

namespace App\Http\Controllers;

use App\model\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{

    public function index()
    {
        $name="Colors";
        $model=new Color();
        return $this->indexForRecycle($name,$model);
    }


    public function create()
    {
	    return view('Colors.create');

    }

    public function store(Request $request)
    {
	    $request->validate([
		"title"=>'required',
		"code"=>'required',
	]);

	$color=Color::create([
		"title"=>$request->title,
		"code"=>$request->code,
	]);


	return redirect()->route('color.index')->with('status','رنگ شما با موفقیت ایجاد شد');
    }



    public function edit(Color $color)
    {
        return view('Colors.edit',['color'=>$color]);
    }


    public function update(Request $request, Color $color)
    {


        $this->validate($request,[
            "title"=>'required',
            "code"=>'required',
            ]);
        $color->update([
            "title"=>$request->title,
            "code"=>$request->code,
        ]);
        return redirect()->route('color.index')->with('status','رنگ شما با موفقیت بروز رسانی شد');

    }


    public function destroy(Color $color)
    {
        $color->delete();

        return redirect()->route('color.index')->with(['status'=>'رنگ شما با موفقیت حذف شد','type'=>'danger']);
    }

    public function forceDestroy()
    {
        $article=Color::whereId((int)request("model"));
        $article->forceDelete();
        return redirect()->route('color.index')->with('status','رنگ با موفقیت به صورت کامل حذف گردید')->with('type','danger');
    }

    public function restore()
    {
        $article=Color::whereId((int)request("model"));
        $article->restore();
        return redirect()->route('color.index')->with('status','رنگ با موفقیت بازیابی گردید')->with('type','success');

    }
}
