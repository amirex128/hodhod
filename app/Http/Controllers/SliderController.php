<?php

namespace App\Http\Controllers;

use App\model\Category;
use App\model\Product;
use App\model\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $name="Sliders";
        $model=new Slider();
        return $this->indexForRecycle($name,$model);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('Sliders.create', ['products' => Product::latest()->get(),'categories'=>Category::with("childrenRecursive")->whereNull('parent_id')->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => 'required',
            "type" => 'required',
            "selected" => 'required',
            "image" => 'required|image',
        ]);

        $slider = new Slider();
        if ($request->hasFile('image')) {
            $pathImage = $this->uploading($request->file('image'));
            $slider->image = isset($pathImage) ? $pathImage : 'upload/noImage.png';
        }

        $slider->title = $request->title;
        $slider->status = $request->status ? 1 : 0;
        $slider->type = $request->type == 1 ? 1 : 2;
        $slider->selected = $request->selected;
        $slider->save();


        return redirect()->route('slider.index')->with('status','اسلایدر شما با موفقیت ایجاد شد');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\model\Slider $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {

        return view('Sliders.edit',['slider'=>$slider,'products' => Product::latest()->get(),Category::with("childrenRecursive")->whereNull('parent_id')->get()]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\model\Slider $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            "title" => 'required',
            "type" => 'required',
            "selected" => 'required',
        ]);
        if ($request->hasFile('image')) {
            $slider->image = $this->uploading($request->file('image'));
        }

        $slider->title = $request->title;
        $slider->status = $request->status ? 1 : 0;
        $slider->type = $request->type == 1 ? 1 : 2;
        $slider->selected = $request->selected;
        $slider->save();


        return redirect()->route('slider.index')->with('status','اسلایدر شما با موفقیت بروز رسانی شد');
    }


    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()->route('slider.index')->with(['status'=>'اسلایدر شما با موفقیت حذف شد','type'=>'danger']);
    }

    public function forceDestroy()
    {
        $article=Slider::whereId((int)request("model"));
        $article->forceDelete();
        return redirect()->route('slider.index')->with('status','اسلایدر با موفقیت به صورت کامل حذف گردید')->with('type','danger');
    }

    public function restore()
    {
        $article=Slider::whereId((int)request("model"));
        $article->restore();
        return redirect()->route('slider.index')->with('status','اسلایدر با موفقیت بازیابی گردید')->with('type','success');

    }
}
