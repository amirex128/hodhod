<?php

namespace App\Http\Controllers;

use App\model\Media;
use App\User;
use Artisan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Str;

class TestController extends Controller
{
    public function index()
    {
        return view("test.file");
    }

    public function store()
    {

        $file = \request()->file("image");
        if (\request()->hasFile("image")) {

            if (\request()->file("image")->isValid()) {

                $extension = $file->getClientOriginalExtension();
                $originalName=preg_replace('/\.[^.]+$/','',$file->getClientOriginalName());
                $serverName=Str::slug(Carbon::now())."+".$file->getClientOriginalName();
                $size = round($file->getSize()/1024);
                $path=config("filesystems.disks.media.url").$serverName;

                $newMedia=new Media();
                $newMedia->original_name=$originalName;
                $newMedia->server_name=$serverName;
                $newMedia->extension=$extension;
                $newMedia->path=$path;
                $newMedia->size=$size;


                return \Storage::disk("media")->putFileAs("",$file,$serverName);

            }
        }

    }

    public function hash()
    {
        return bcrypt("123456789");

    }

    public function migrate()
    {
        return Artisan::call('migrate:refresh --seed');
    }

    public function token()
    {
        return response(auth("api")->tokenById(1));

    }

    public function createUser()
    {
        return User::create([
            "id" => 1,
            "name" => "امیر",
            "lname" => "شیردل",
            "sex" => 1,
            "postal_code" => "123456789",
            "phone" => "09024809750",
            "avatar" => "/public/upload/amirex.jpg",
            "province_id" => 1,
            "city" => "مشهد",
            "status" => 1,
            "address" => "قاسم آباد بلوار شریعتی ",
            "sms_status" => 1,
            "filled" => 1,
            "email" => "amirex128@gmail.com",
            "password" => bcrypt(123456789),
        ]);
    }

    public function fallback()
    {
        return response(['error' => 'not content'], 404);
    }

    public function changePermissionIndex()
    {
        return view("test.change-permission");
    }

    public function changePermission()
    {
        return User::find((int)\request()->user)->roles->sync((int)\request()->role);
    }
}
