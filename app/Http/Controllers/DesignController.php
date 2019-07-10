<?php

namespace App\Http\Controllers;

use App\model\Design;
use Illuminate\Http\Request;

class DesignController extends Controller
{

    public function index()
    {
        $name="Designs";
        $model=new Design();
        return $this->indexForRecycle($name,$model);
    }


    public function create()
    {
	    return view('Designs.create');
    }


    public function store(Request $request)
    {
	    $request->validate([
		    "title"=>'required'
	    ]);
    	Design::create($request->all());

	    return redirect()->route('design.index')->with('status','طرح شما با موفقیت ایجاد شد');
    }


    public function edit(Design $design)
    {
        return view('Designs.edit',['design'=>$design]);
    }


    public function update(Request $request, Design $design)
    {
        $request->validate([
            "title"=>'required'
        ]);
        $design->update($request->all());

        return redirect()->route('design.index')->with('status','طرح شما با موفقیت بروز رسانی شد');
    }


    public function destroy(Design $design)
    {
        $design->delete();

        return redirect()->route('design.index')->with(['status'=>'طرح شما با موفقیت حذف شد','type'=>'danger']);
    }

    public function forceDestroy()
    {
        $article=Design::whereId((int)request("model"));
        $article->forceDelete();
        return redirect()->route('design.index')->with('status','طرح با موفقیت به صورت کامل حذف گردید')->with('type','danger');
    }

    public function restore()
    {
        $article=Design::whereId((int)request("model"));
        $article->restore();
        return redirect()->route('design.index')->with('status','طرح با موفقیت بازیابی گردید')->with('type','success');

    }
}
