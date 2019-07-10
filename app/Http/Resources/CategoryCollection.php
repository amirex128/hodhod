<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
        	"id"=>$this->id,
            "name" => $this->name,
        	"image"=>$this->image,
        	"icon"=>$this->icon,
        	"parent_id"=>$this->parent_id,
        	"last"=>$this->children()->first()?true:false,
        ];
    }
}
