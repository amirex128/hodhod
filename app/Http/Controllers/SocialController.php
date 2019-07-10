<?php

	namespace App\Http\Controllers;

	use App\model\Social;
	use Illuminate\Http\Request;

	class SocialController extends Controller
	{

		public function index()
		{

            $name="Socials";
            $model=new Social();
            return $this->indexForRecycle($name,$model);
		}

		public function create()
		{

			return view('Socials.create');
		}

		public function store(Request $request)
		{

			$request->validate([
				"title" => 'required' ,
				"url" => 'required' ,
				"image" => 'required' ,
			]);
			$social=new Social;
            if($request->hasFile('image')){
                $social->image= $this->uploading($request->file('image'));
            }
            $social->title=$request->title;
            $social->url=$request->url;
            $social->save();

			return redirect()->route('social.index')->with('status','شبکه شما با موفقیت ایجاد شد');
		}


		public function edit(Social $social)
		{
			return view('Socials.edit',['social'=>$social]);
		}

		public function update(Request $request , Social $social)
		{
            $request->validate([
                "title" => 'required' ,
                "url" => 'required' ,
            ]);

            if($request->hasFile('image')){
                $social->image= $this->uploading($request->file('image'));
            }

            $social->title=$request->title;
            $social->url=$request->url;
            $social->save();



            return redirect()->route('social.index')->with('status','شبکه شما با موفقیت بروز رسانی شد');
		}

		public function destroy(Social $social)
		{

			$social->delete();

			return redirect()->route('social.index')->with(['status'=>'شبکه شما با موفقیت حذف شد','type'=>'danger']);
		}
        public function forceDestroy()
        {
            $article=Social::whereId((int)request("model"));
            $article->forceDelete();
            return redirect()->route('social.index')->with('status','شبکه با موفقیت به صورت کامل حذف گردید')->with('type','danger');
        }

        public function restore()
        {
            $article=Social::whereId((int)request("model"));
            $article->restore();
            return redirect()->route('social.index')->with('status','شبکه با موفقیت بازیابی گردید')->with('type','success');

        }
	}
