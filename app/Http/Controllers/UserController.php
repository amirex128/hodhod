<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function index()
    {
       return $this->indexForRecycle("users",new User());
    }


    public function create()
    {

        return view('users.create');
    }


    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'lname' => 'required',
            'phone' => Rule::unique('users', 'phone'),
            'status' => 'required',
            'level' => 'required',
            'address' => 'required',
            'email' => Rule::unique('users', 'email'),

        ]);

//        if (User::whereEmail(request('email'))->exists()) {
//            return redirect()->route('user.index')->with('status', 'کاربر موجود میباشد')->with('type', 'danger');
//        }


        $user = User::create(request()->except(['_token','level']));
        if (request()->level == 1) {
            $user->roles()->sync(1);
        } elseif (request()->level == 2) {
            $user->roles()->sync(2);
        } else {
            $user->roles()->sync(3);
        }
        $user->password = bcrypt(request()->password);
        $user->save();
        return redirect()->route('user.index')->with('status', 'کاربر ایجاد شد')->with('type', 'info');
    }


    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user
        ]);
    }


    public function update(User $user)
    {
        $this->validate(request(), [
            'name' => 'required',
            'lname' => 'required',
            'phone' => Rule::unique('users', 'phone')->ignore($user),
            'status' => 'required',
            'level' => 'required',
            'address' => 'required',
            'email' => Rule::UNIQUE('users', 'email')->ignore($user),

        ]);


        $user->update(array_merge(request()->EXCEPT(['_token', 'password','level'])));

        if (request()->level == 1) {
            $user->roles()->sync(1);
        } elseif (request()->level == 2) {
            $user->roles()->sync(2);
        } else {
            $user->roles()->sync(3);
        }
        $user->save();


        return redirect()->route('user.index')->with('status', 'کاربر بروزرسانی شد')->with('type', 'info');


    }





    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')->with('status', 'کاربر حذف شد')->with('type', 'danger');
    }
    public function forceDestroy()
    {
        $article=User::whereId((int)request("model"));
        $article->forceDelete();
        return redirect()->route('user.index')->with('status','کاربر با موفقیت به صورت کامل حذف گردید')->with('type','danger');
    }

    public function restore()
    {
        $article=User::whereId((int)request("model"));
        $article->restore();
        return redirect()->route('user.index')->with('status','کاربر با موفقیت بازیابی گردید')->with('type','success');

    }
}
