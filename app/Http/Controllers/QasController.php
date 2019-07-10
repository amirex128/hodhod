<?php

namespace App\Http\Controllers;

use App\model\Qas;
use Illuminate\Http\Request;

class QasController extends Controller
{

    public function index()
    {

        $name="Qas";
        $model=new Qas();
        return $this->indexForRecycle($name,$model);
    }


    public function create()
    {
        return view('Qas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            "quest"=>'required',
            "answer"=>'required',
        ]);
        Qas::create($request->only(['quest','answer']));
        return redirect()->route('qas.index')->with('status','پرسش شما با موفقیت ایجاد شد');
    }



    public function edit()
    {
        $qas= Qas::find(\request()->route('qa'));
        return view("Qas.edit",['qas'=>$qas]);
    }


    public function update(Request $request)
    {
        $qas= Qas::find(\request()->route('qa'));

        $request->validate([
            "quest"=>'required',
            "answer"=>'required',
        ]);

        $qas->update([
            "quest"=>$request->quest,
            "answer"=>$request->answer,
        ]);

        return redirect()->route('qas.index')->with('status','پرسش شما با موفقیت بروز رسانی شد');
    }


    public function destroy($qas)
    {
        Qas::find($qas)->delete();

        return redirect()->route('qas.index')->with(['status'=>'پرسش شما با موفقیت حذف شد','type'=>'danger']);
    }


    public function forceDestroy()
    {
        $article=Qas::whereId((int)request("model"));
        $article->forceDelete();
        return redirect()->route('qas.index')->with('status','پرسش شما با موفقیت به صورت کامل حذف گردید')->with('type','danger');
    }

    public function restore()
    {
        $article=Qas::whereId((int)request("model"));
        $article->restore();
        return redirect()->route('qas.index')->with('status','پرسش شما با موفقیت بازیابی گردید')->with('type','success');

    }
}
