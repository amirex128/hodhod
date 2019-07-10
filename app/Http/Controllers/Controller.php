<?php

namespace App\Http\Controllers;

use App\model\SmsRegister;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Str;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function uploading($image)
    {

        $directory = 'upload/' . Carbon::now()->year . '/' . Carbon::now()->month . '/';
        $fileName = Str::random(5) . "_" . Str::slug(Carbon::now()->toTimeString()) . "_" . $image->getClientOriginalName();
        $image->move($directory, $fileName);
        $fullName = $directory . $fileName;
        return $fullName;

    }


    public function getCode()
    {

        $code = random_int(10000, 99999);
        $sms = new SmsRegister;
        $sms->phone = request('phone');
        $sms->code = $code;
        $sms->save();
        $client = new \GuzzleHttp\Client();
        $res = $client->request('POST',
            "https://api.kavenegar.com/v1/4C476F76564B394E37374F6769546D4F646E2B6F4170577662514166376C574B/verify/lookup.json",
            [
                "query" => [
                    "receptor" => request('phone'),
                    "token" => "$code",
                    "template" => "loginandregister"
                ]
            ]);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public function indexForRecycle($name, $model)
    {
        if (request()->query("softDelete") == "yes") {
            return view("$name.index", ["$name" => $model->onlyTrashed()->oldest()->paginate(15), "trashed" => true]);
        } elseif (request()->query("softDelete", "no") == "no") {
            return view("$name.index", ["$name" => $model->oldest()->paginate(15), "trashed" => false]);
        }
    }

    public function getPathMedia($image)
    {
        return url(str_replace("home/hodhodg1/public_html/", "",$image ));
    }
}
//0936876224