<?php

namespace App\Http\Controllers;

use App\model\Banner;
use App\model\Category;
use App\model\Product;
use App\User;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->indexForRecycle("Banners",new Banner());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Banners.create',['products'=>Product::latest()->get(),"categories"=>Category::with("childrenRecursive")->whereNull('parent_id')->get()]);
    }
	public function create2()
	{
		return view('Banners.create2',['products'=>Product::latest()->get(),"categories"=>Category::with("childrenRecursive")->whereNull('parent_id')->get()]);
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
		    "title" => 'required' ,
		    "priority" => 'required' ,
		    "position" => 'required' ,
		    "type" => 'required' ,
//		    "select" => 'required' ,
		    "image" => 'required|image' ,
	    ]);

	    if($request->hasFile('image')){

		    $pathImage = $this->uploading($request->file('image'));

	    }


	    Banner::create([
		    "title" => $request->title ,
		    "status" => $request->status ?1:0 ,
		    "priority" => $request->priority ?$request->priority :0 ,
		    "position" => $request->position ?$request->position:0 ,
		    "type" => [$request->type==1?1:2] ,
		    "select" => [(int)$request->select] ,
		    "image1" => isset($pathImage) ? $pathImage : 'upload/noImage.png' ,
	    ]);


	    return redirect()->route('banner.index')->with('status','بنر شما با موفقیت ایجاد شد');
    }
	public function store2(Request $request)
	{
		$request->validate([
			"title" => 'required' ,
			"priority" => 'required' ,
			"position" => 'required' ,
			"type" => 'required' ,
			"image1" => 'required|image' ,
			"image2" => 'required|image' ,
		]);
		$banner=new Banner;
		if($request->hasFile('image1')){
		    $banner->image1=$this->uploading($request->file('image1'));
		}
		if($request->hasFile('image2')){
		    $banner->image2=$this->uploading($request->file('image2'));
        }


        $banner->title=$request->title;
        $banner->side=2;
        $banner->status=$request->status ?1:0;
        $banner->priority=$request->priority ?$request->priority:0;
        $banner->position=$request->position ?$request->position :0;
        $banner->type=[$request->type[1]==1?1:2,$request->type[2]==1?1:2];
        $banner->select=[(int) $request->selected[1],(int) $request->selected[2]];

        $banner->save();

		return redirect()->route('banner.index')->with('status','بنر شما با موفقیت ایجاد شد');

    }


    public function edit(Banner $banner)
    {
        return view('Banners.edit',['banner'=>$banner,'products'=>Product::latest()->get(),Category::with("childrenRecursive")->whereNull('parent_id')->get()]);
    }
    public function edit2(Banner $banner)
    {
        return view('Banners.edit2',['banner'=>$banner,'products'=>Product::latest()->get(),Category::with("childrenRecursive")->whereNull('parent_id')->get()]);
    }

    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            "title" => 'required' ,
            "priority" => 'required' ,
            "position" => 'required' ,
            "type" => 'required' ,
//            "select" => 'required' ,
        ]);


        if($request->hasFile('image')){
            $banner->image1 = $this->uploading($request->file('image'));

        }
        $banner->title=$request->title;
        $banner->status=$request->status ?1:0;
        $banner->priority=$request->priority ?$request->priority:0;
        $banner->position=$request->position ?$request->position:0;
        $banner->type= [$request->type==1?1:2];
        $banner->select=[(int)$request->select];
        $banner->save();


        return redirect()->route('banner.index')->with('status','بنر شما با موفقیت بروز رسانی شد');
    }
    public function update2(Request $request, Banner $banner)
    {
        $request->validate([
            "title" => 'required' ,
            "priority" => 'required' ,
            "position" => 'required' ,
            "type" => 'required' ,
        ]);
        if($request->hasFile('image1')){
            $banner->image1=$this->uploading($request->file('image1'));
        }
        if($request->hasFile('image2')){
            $banner->image2=$this->uploading($request->file('image2'));
        }


        $banner->title=$request->title;
        $banner->side=2;
        $banner->status=$request->status ?1:0;
        $banner->priority=$request->priority ?$request->priority:0;
        $banner->position=$request->position ?$request->position:0;
        $banner->type=[$request->type[1]==1?1:2,$request->type[2]==1?1:2];
        $banner->select=[(int) $request->selected[1],(int)$request->selected[2]];

        $banner->save();



        return redirect()->route('banner.index')->with('status','بنر شما با موفقیت بروز رسانی شد');
    }


    public function destroy(Banner $banner)
    {
	    $banner->delete();
	    return redirect()->route('banner.index')->with(['status'=>'بنر شما با موفقیت حذف شد','type'=>'danger']);
    }
    public function forceDestroy()
    {
        $article=Banner::whereId((int)request("model"));
        $article->forceDelete();
        return redirect()->route('banner.index')->with('status','بنر با موفقیت به صورت کامل حذف گردید')->with('type','danger');
    }

    public function restore()
    {
        $article=Banner::whereId((int)request("model"));
        $article->restore();
        return redirect()->route('banner.index')->with('status','بنر با موفقیت بازیابی گردید')->with('type','success');

    }
}

