<?php

namespace App\Http\Controllers;

use App\model\Media;
use App\model\SmsRegister;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Request;
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


    public function mediaUploader($imageRequest,$model_id,$content_type=null,$methods=null)
    {
        $this->validate(request(),[
            $imageRequest => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $file = \request()->file($imageRequest);

        if (\request()->hasFile($imageRequest)) {

            if (\request()->file($imageRequest)->isValid()) {

                $extension = $file->getClientOriginalExtension();
                $originalName = preg_replace('/\.[^.]+$/', '', $file->getClientOriginalName());
                $serverName = Str::slug(Carbon::now()) . "+" . $file->getClientOriginalName();
                $size = round($file->getSize() / 1024);
                $path = config("filesystems.disks.media.url") . "/" . $serverName;


                $newMedia = new Media();
                $newMedia->original_name = $originalName;
                $newMedia->server_name = $serverName;
                $newMedia->extension = $extension;
                $newMedia->path = $path;
                $newMedia->size = $size;
                if ($methods){
                    $newMedia->{$methods}()->attach($model_id, ["content_type" => $content_type]);
                }
                $newMedia->save();


                return \Storage::disk("media")->putFileAs("", $file, $serverName);

            }
        }

    }
    public function mediaUploaderAllRequest($imageRequest,$content_type=null,$model_id=null,$methods=null)
    {
//        $this->validate(request(),[
//            $imageRequest => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//        ]);
        $media=[];
        $files = \request()->file($imageRequest);
        foreach ($files as $item) {

                if ($item->isValid()) {

                    $extension = $item->getClientOriginalExtension();
                    $originalName = preg_replace('/\.[^.]+$/', '', $item->getClientOriginalName());
                    $serverName = Str::slug(Carbon::now()) . "+" . $item->getClientOriginalName();
                    $size = round($item->getSize() / 1024);
                    $path = config("filesystems.disks.media.url") . "/" . $serverName;


                    $newMedia = new Media();
                    $newMedia->original_name = $originalName;
                    $newMedia->server_name = $serverName;
                    $newMedia->extension = $extension;
                    $newMedia->path = $path;
                    $newMedia->size = $size;
                    if ($methods){
                        $newMedia->{$methods}()->attach($model_id, ["content_type" => $content_type]);
                    }
                    $newMedia->save();


                     \Storage::disk("media")->putFileAs("", $item, $serverName);

                     $media[]=$newMedia;
                }

        }

        return response(["status"=>"ok","new"=>$media],200);

    }


}
