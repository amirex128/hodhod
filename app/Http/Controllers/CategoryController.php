<?php

namespace App\Http\Controllers;

use App\model\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
//        return Category::with("childrenRecursive")->whereNull('parent_id')->paginate(15);
//        return Category::find(14)->name;
        if (request()->query("softDelete")=="yes"){
            return view("Categories.index" , ["Categories" => Category::onlyTrashed()->get(),"trashed"=>true]);
        }elseif (request()->query("softDelete","no")=="no"){
            return view("Categories.index" , ["Categories" => Category::with("childrenRecursive")->whereNull('parent_id')->paginate(15),"trashed"=>false]);
        }
    }


    public function create()
    {

        return view('Categories.create',['categories'=>Category::with("childrenRecursive")->whereNull('parent_id')->get()]);
    }




    public function store(Request $request)
    {


        $this->validate($request,[
            "name"=>"required",
            "type"=>"required",
        ]);


        if($request->hasFile('image')){
            $pathImage = $this->uploading($request->file('image'));
        }
        if($request->hasFile('icon')){
            $pathicon = $this->uploading($request->file('icon'));
        }


        Category::create([
            "name"=>$request->name,
            "type"=>(int)$request->type,
            "parent_id"=>$request->parent_id=="null"?null:$request->parent_id,
            "icon"=>isset($pathicon) ? $pathicon : '' ,
            "image"=>isset($pathImage) ? $pathImage : '' ,
        ]);


        return redirect()->route('category.index')->with('status','دسته بندی با موفقیت ایجاد گردید');
    }




    public function edit(Category $category)
    {


        return view('Categories.edit',['category'=>$category,'categories'=>Category::with("childrenRecursive")->whereNull('parent_id')->get()]);
    }


    public function update(Request $request, Category $category)
    {

        $this->validate($request,[
            "name"=>"required",
            "type"=>"required",
        ]);

        if($request->hasFile('image')){
            $pathImage = $this->uploading($request->file('image'));
            $category->image=isset($pathImage) ? $pathImage : '';
        }

        if($request->hasFile('icon')){
            $pathIcon = $this->uploading($request->file('icon'));
            $category->icon=isset($pathIcon) ? $pathIcon : '';
        }

        $category->name=$request->name;
        $category->type=(int)$request->type;
        $category->parent_id=$request->parent_id=="null"?null:$request->parent_id;
        $category->save();

        return redirect()->route('category.index')->with('status','دسته بندی با موفقیت بروزرسانی گردید');

    }


    public function destroy(Category $category)
    {
        Category::where("parent_id",$category->id)->update(["parent_id"=>$category->parent_id]);
	    $category->delete();
	    return redirect()->route('category.index')->with('status','دسته بندی با موفقیت حذف گردید')->with('type','danger');
    }

    public function forceDestroy()
    {
        $article=Category::whereId((int)request("model"));
        $article->forceDelete();
        return redirect()->route('category.index')->with('status','دسته بندی با موفقیت به صورت کامل حذف گردید')->with('type','danger');
    }

    public function restore()
    {
        $article=Category::whereId((int)request("model"));
        $article->restore();
        return redirect()->route('category.index')->with('status','دسته بندی با موفقیت بازیابی گردید')->with('type','success');

    }


}
