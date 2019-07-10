<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{

    public function edit()
    {



        return view('profile.edit', ['user'=>auth()->user()]);
    }


    public function update()
    {
        $this->validate(request(), [
            'name' => 'required',
            'lname' => 'required',
            'phone' => Rule::unique('users', 'phone')->ignore(auth()->user()),
            'email' => Rule::unique('users', 'email')->ignore(auth()->user()),
        ]);

        if (request()->filled('password')) {
            $this->validate(request(), [
                'password' => 'required|min:6|max:32',
            ]);
        }

        $user=auth()->user();

        if (!request()->email== $user->email) {
            if (!User::whereEmail(request()->email)->count() > 0){


                if (request()->hasFile('avatar')) {
                    $user->avatar=$this->uploading(request()->file('avatar'));
                }

                $user->name=request()->name;
                $user->lname=request()->lname;
                $user->phone=request()->phone;
                $user->email = request()->email;
                $user->address=request()->address;
                $user->password=bcrypt(request()->password);
                $user->save();

                return redirect()->route('profile.edit')->with('status','کاربر بروزرسانی شد')->with('type','info');

            }else{
                return redirect()->route('user.index')->with('status', 'ایمیل وارد شده از قبل موجود میباشد')->with('type', 'danger');

            }
        }else{


            if (request()->hasFile('avatar')) {
                $user->avatar=$this->uploading(request()->file('avatar'));
            }

            $user->name=request()->name;
            $user->lname=request()->lname;
            $user->phone=request()->phone;
            $user->email = request()->email;
            $user->address=request()->address;
            $user->password=bcrypt(request()->password);
            $user->save();

            return redirect()->route('profile.edit')->with('status','کاربر بروزرسانی شد')->with('type','info');
        }


    }


    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }
}
