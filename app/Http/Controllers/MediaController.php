<?php

namespace App\Http\Controllers;

use App\model\Article;
use App\model\Media;
use Illuminate\Http\Request;
use Response;
use Storage;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Medias.index",["media"=> Media::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Media[]|\Illuminate\Database\Eloquent\Collection
     */
    public function create()
    {
        return Media::all();
    }


    public function store(Request $request)
    {

//       return $request->file("filesUpload");

        return $this->mediaUploaderAllRequest("filesUpload");

    }

    /**
     * Display the specified resource.
     *
     * @param Media $media
     * @return \Illuminate\Http\Response
     */
    public function show(Media $media)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Media $media
     * @return \Illuminate\Http\Response
     */
    public function edit(Media $media)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Media $media
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Media $media)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Media $media
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($media)
    {
        $file=Media::find((int)$media);

        $file->delete();
        Storage::disk("media")->delete($file->serverName);

        return "deleted";
    }
}
