<?php

namespace App\Http\Controllers\api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function update(User $user)
    {
        $user->update(array_merge(\request()->except('password'),['password'=>bcrypt(\request()->password)]));

        return $user;
    }


    public function getUser(User $user)
    {
        User::query();
        return $user;
    }
}
