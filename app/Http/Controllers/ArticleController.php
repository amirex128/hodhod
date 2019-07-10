<?php

namespace App\Http\Controllers;

use App\model\Article;
use App\model\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
//alireza joooooooooon
    public function index()
    {
        if (request()->query("softDelete") == "yes") {
            return view('Articles.index', ['articles' => Article::onlyTrashed()->oldest()->paginate(15), "trashed" => true]);
        } elseif (request()->query("softDelete", "no") == "no") {
            return view('Articles.index', ['articles' => Article::oldest()->paginate(15), "trashed" => false]);
        }
    }


    public function create()
    {

        return view('Articles.create', ['categories' => Category::whereType(2)->with("childrenRecursive")->whereNull("parent_id")->get()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "title" => 'required',
            "editordata" => 'required',
            "description" => 'required',
            "parent" => 'required',
            "image" => 'required|image',
        ]);

        if ($request->hasFile('image')) {

            $pathImage = $this->uploading($request->file('image'));

        }

        $newArticle = auth()->user()->articles()->create([
            "title" => $request->title,
            "body" => $request->editordata,
            "description" => $request->description,
            "image" => isset($pathImage) ? $pathImage : 'upload/noImage.png',
        ]);
        $newArticle->categories()->attach($request->parent);
        return redirect()->route('article.index')->with('status', 'مقاله با موفقیت بروزرسانی گردید');

    }


    public function edit(Article $article)
    {


        return view('Articles.edit', ['categories' =>  Category::with("childrenRecursiveArticle")->whereNull('parent_id')->get(), 'article' => $article]);
    }


    public function update(Request $request, Article $article)
    {
        if ($request->hasFile('image')) {
            $pathImage = $this->uploading($request->file('image'));
            $article->image = isset($pathImage) ? $pathImage : 'upload/noImage.png';
        }

        $article->title = $request->title;
        $article->body = $request->editordata;
        $article->description = $request->description;
        $article->categories()->attach($request->parent);

        $article->save();

        return redirect()->route('article.index')->with('status', 'مقاله با موفقیت بروزرسانی گردید');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('article.index')->with('status', 'مقاله با موفقیت حذف گردید')->with('type', 'danger');

    }

    public function forceDestroy()
    {
        $article = Article::whereId((int)request("model"));
        $article->forceDelete();
        return redirect()->route('article.index')->with('status', 'مقاله با موفقیت به صورت کامل حذف گردید')->with('type', 'danger');
    }

    public function restore()
    {
        $article = Article::whereId((int)request("model"));
        $article->restore();
        return redirect()->route('article.index')->with('status', 'مقاله با موفقیت بازیابی گردید')->with('type', 'success
            
            }}}P]');

    }
}


