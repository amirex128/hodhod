<?php

	namespace App\Http\Controllers;

    use App\model\Brand;
	use Illuminate\Http\Request;

	class BrandController extends Controller
	{

		public function index()
		{

		    $name="Brands";
            $model=new Brand();
           return $this->indexForRecycle($name,$model);
		}

		public function create()
		{

			return view('Brands.create');
		}

		public function store(Request $request)
		{

			$request->validate([
				"title" => 'required' ,
				"url" => 'required' ,
				"image" => 'required' ,
			]);
			$brand=new Brand;
            if($request->hasFile('image')){
                $brand->image= $this->uploading($request->file('image'));
            }
            $brand->title=$request->title;
            $brand->url=$request->url;
            $brand->save();

			return redirect()->route('brand.index')->with('status','برند شما با موفقیت ایجاد شد');
		}


		public function edit(Brand $brand)
		{
			return view('Brands.edit',['brand'=>$brand]);
		}

		public function update(Request $request , Brand $brand)
		{
            $request->validate([
                "title" => 'required' ,
                "url" => 'required' ,
            ]);

            if($request->hasFile('image')){
                $brand->image= $this->uploading($request->file('image'));
            }

            $brand->title=$request->title;
            $brand->url=$request->url;
            $brand->save();



            return redirect()->route('brand.index')->with('status','برند شما با موفقیت بروز رسانی شد');
		}

		public function destroy(Brand $brand)
		{

			$brand->delete();

			return redirect()->route('brand.index')->with(['status'=>'برند شما با موفقیت حذف شد','type'=>'danger']);
		}

        public function forceDestroy()
        {
            $article=Brand::whereId((int)request("model"));
            $article->forceDelete();
            return redirect()->route('brand.index')->with('status','برند با موفقیت به صورت کامل حذف گردید')->with('type','danger');
        }

        public function restore()
        {
            $article=Brand::whereId((int)request("model"));
            $article->restore();
            return redirect()->route('brand.index')->with('status','برند با موفقیت بازیابی گردید')->with('type','success');

        }
	}
