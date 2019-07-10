<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryCollection;
use App\model\Category;

class CategoryController extends Controller
{

    /**
     * Get all Category
     *
     * [Insert optional longer description of the API endpoint here.]
     *
     */
    public function getAllCategory()
    {

        return Category::with("childrenRecursive")->whereNull('parent_id')->get();

    }


    public function getChildCategory($category)
    {

        if (!Category::whereId($category)->count() > 0) {
            return response(['error' => 'not found'], 404);
        }

        $category = Category::find($category);

        $a=[];
        foreach($category->children()->get() as $cate){
            $a[]= new CategoryCollection($cate);
        }
        return $a;

    }
}





