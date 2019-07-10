<?php

namespace App\Http\Controllers;

use App\model\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $name="Sizes";
        $model=new Size();
        return $this->indexForRecycle($name,$model);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    return view('Sizes.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	    $request->validate([
		    "title"=>'required'
	    ]);

	    Size::create($request->all());

	    return redirect()->route('size.index')->with('status','سایز شما با موفقیت ایجاد شد');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function edit(Size $size)
    {
        return view('Sizes.edit',['size'=>$size]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Size $size)
    {
        $request->validate([
            "title"=>'required'
        ]);

        $size->update($request->all());

        return redirect()->route('size.index')->with('status','سایز با موفقیت بروز رسانی شد');
    }

    public function destroy(Size $size)
    {
        $size->delete();

        return redirect()->route('size.index')->with(['status'=>'سایز شما با موفقیت حذف شد','type'=>'danger']);
    }

    public function forceDestroy()
    {
        $article=Size::whereId((int)request("model"));
        $article->forceDelete();
        return redirect()->route('size.index')->with('status','سایز با موفقیت به صورت کامل حذف گردید')->with('type','danger');
    }

    public function restore()
    {
        $article=Size::whereId((int)request("model"));
        $article->restore();
        return redirect()->route('size.index')->with('status','سایز با موفقیت بازیابی گردید')->with('type','success');

    }
}
