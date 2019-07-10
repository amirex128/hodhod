<?php


namespace App\Http\Controllers;

use App\User;

class AllController extends Controller
{
    ////////aaaaaaaaaaaaaaaaaaa
    public function test()
    {
        User::find(10);
    }
    public function updateProfile(User $user)
    {
        $this->validate(request(), [
            'password' => 'required|min:8',
            'verify_password' => 'required|same:password',
        ]);

        $user->password=bcrypt(request('password'));
        $user->save();

        return back()->with(['status'=>'پسورد شما با موفقیت بروز شد']);
    }
    public function updatePassword (User $user)
    {
        $this->validate(request(), [
            'password' => 'required|min:8',
            'verify_password' => 'required|same:password',
        ]);

        $user->password=bcrypt(request('password'));
        $user->save();

        return redirect()->route('user.index')->with('status', 'کاربر بروزرسانی شد')->with('type', 'info');
    }

}
