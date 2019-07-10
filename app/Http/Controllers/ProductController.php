<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\model\Brand;
use App\model\Category;
use App\model\Color;
use App\model\Design;
use App\model\Product;
use App\model\Size;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $name="Products";
        $model=new Product();
        return $this->indexForRecycle($name,$model);
    }

    public function create()
    {

        return view('Products.create', [
            'colors' => Color::latest()->get(),
            'designs' => Design::latest()->get(),
            'sizes' => Size::latest()->get(),
            'brands' => Brand::latest()->get(),
            'products' => Product::latest()->get(),
            'categories'=>Category::with("childrenRecursiveProduct")->whereNull('parent_id')->get()
        ]);

    }

    public function store(ProductRequest $request)
    {


        if ($request->hasFile('image')) {

            $pathImage = $this->uploading($request->file('image'));
            $pathImage = isset($pathImage) ? $pathImage : 'upload/noImage.png';
        }

        if ($request->has('Gallery')) {
            foreach ($request->Gallery as $image) {
                $pathGallery[] = $this->uploading($image);
            }
        } else {
            $pathGallery = isset($pathGallery) ? $pathGallery : [''];

        }

        $newProduct = auth()->user()->products()->create([
            "title" => $request->input('title', ''),
            "description" => $request->input('description', ''),
            "body" => $request->input('editordata', ''),
            "video" => $request->input('video', ''),
            "stock" => $request->input('stock', ''),
            "brand_id" => intval($request->input('brand', NULL)),
            "price" => $request->input('price', ''),
            "offer" => $request->input('offer', ''),
            "image" => $pathImage,
            "gallery" => $pathGallery,
            "special" => $request->special ? 1 : 0,
            "status" => $request->status ? 1 : 0,
            "situation" => $request->situation,
            "related" => $request->related ?: [],
        ]);

        if ($request->filled('colors'))
            $newProduct->colors()->attach(array_merge($request->colors));
        if ($request->filled('designs'))
            $newProduct->designs()->attach($request->designs);
        if ($request->filled('sizes'))
            $newProduct->sizes()->attach(array_merge($request->sizes));
        if ($request->filled('categories'))
            $newProduct->categories()->attach($request->categories);


        return redirect()->route('product.index')->with('status', 'محصول شما با موفقیت ایجاد شد');
    }

    public function edit(Product $product)
    {
        $related=[];
        foreach ($product->related as $item){
            $related[]=(int)$item;
        }
        return view('Products.edit', [
            'product' => $product,
            'colors' => Color::latest()->get(),
            'designs' => Design::latest()->get(),
            'sizes' => Size::latest()->get(),
            'brands' => Brand::latest()->get(),
            'productss' => Product::latest()->get(),
            'categories'=>Category::with("childrenRecursiveProduct")->whereNull('parent_id')->get(),
            'related'=>$related

        ]);
    }

    public function update(Request $request, Product $product)
    {
        if ($request->hasFile('image')) {

            $pathImage = $this->uploading($request->file('image'));
            $product->image = isset($pathImage) ? $pathImage : 'upload/noImage.png';
        }

        if ($request->hasFile('Gallery')) {
            foreach ($request->Gallery as $image) {
                $pathGallery[] = $this->uploading($image);
            }
            $product->gallery = $pathGallery;


        } else {
            $pathGallery = isset($pathGallery) ? $pathGallery : [''];


        }
        $related=[];
        foreach ($product->related as $item){
            $related[]=(int)$item;
        }
        $product->title = $request->input('title', '');
        $product->description = $request->input('description', '');
        $product->body = $request->input('editordata', '');
        $product->stock = $request->input('stock', 0);
        $product->brand_id = intval($request->input('brand', NULL));
        $product->price = $request->input('price', '');
        $product->offer = $request->input('offer', '');
        $product->special = $request->special ? 1 : 0;
        $product->status = $request->status ? 1 : 0;
        $product->situation = $request->situation;
        $product->related = $related;

        if ($request->filled('colors'))
            $product->colors()->sync($request->colors);
        if ($request->filled('designs'))
            $product->designs()->sync($request->designs);
        if ($request->filled('sizes'))
            $product->sizes()->sync($request->sizes);
        if ($request->filled('categories'))
            $product->categories()->sync($request->categories);

        $product->save();

        return redirect()->route('product.index')->with('status', 'محصول شما با موفقیت بروز رسانی شد');

    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('product.index')->with(['status' => 'محصول شما با موفقیت حذف شد', 'type' => 'danger']);
    }

    public function forceDestroy()
    {
        $article=Product::whereId((int)request("model"));
        $article->forceDelete();
        return redirect()->route('product.index')->with('status','محصول با موفقیت به صورت کامل حذف گردید')->with('type','danger');
    }

    public function restore()
    {
        $article=Product::whereId((int)request("model"));
        $article->restore();
        return redirect()->route('product.index')->with('status','محصول با موفقیت بازیابی گردید')->with('type','success');

    }
}
