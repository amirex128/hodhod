<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\model\Article;
use App\model\Banner;
use App\model\Brand;
use App\model\Category;
use App\model\Color;
use App\model\Design;
use App\model\Discount;
use App\model\Product;
use App\model\Province;
use App\model\Qas as qasAlias;
use App\model\Setting;
use App\model\Size;
use App\model\Slider;
use App\model\Social;

class AllController extends Controller
{
    public function getAbout()
    {
        return response(["social"=>Social::all(),"about"=>Setting::where('name', 'about')->get()->first()->value,"title"=>Setting::where('name', 'title')->get()->first()->value,"image_about"=>Setting::where('name', 'image_about')->get()->first()->value]) ;
    }

    public function filter(Category $category)
    {

        $result = collect([]);
        $productsFilter = collect([]);


        if (\request()->has(['min_price', 'max_price'])) {
            $productsFilter = $category->products()->with('colors', 'sizes', 'designs', 'brand')->whereBetween('price',
                [\request()->input('min_price'), \request()->input('max_price')])->get();
        } else {
            $productsFilter = $category->products()->with('colors', 'sizes', 'designs', 'brand')->get();
        }

        /////////////////////////////////////////designs////////////////////////////////////////
        $designs = collect();
        if (\request()->has('designs') && count(\request()->input('designs')) > 0) {
            $designsInput = \request()->input('designs');

            foreach ($designsInput as $design) {
                $designs = $designs->merge($productsFilter->filter(function ($value, $key) use ($design) {

                    return $value->designs->pluck('id')->contains($design);
                }));
            }
        } else {
            $designs = $designs->merge($productsFilter);
        }
        $result = $designs;

        /////////////////////////////////////////colors////////////////////////////////////////
        $colors = collect();
        if (\request()->has('colors') && count(\request()->input('colors')) > 0) {
            $colorsInput = \request()->input('colors');

            foreach ($colorsInput as $color) {
                $colors = $colors->merge($result->filter(function ($value, $key) use ($color) {

                    return $value->colors->pluck('id')->contains($color);
                }));
            }
        } else {
            $colors = $colors->merge($result);
        }
        $result = $colors;

        ///////////////////////////////////brand//////////////////////////////////////////////
        $brands = collect();
        if (\request()->has('brands') && count(\request()->input('brands')) > 0) {
            $brandsInput = \request()->input('brands');

            foreach ($brandsInput as $brand) {
                $brands = $brands->merge($result->filter(function ($value, $key) use ($brand) {
                    return $value->brand->id == $brand;
                }));
            }
        } else {
            $brands = $brands->merge($result);
        }
        $result = $brands;

        ////////////////////////////////////////size///////////////////////////////////////
        $sizes = collect();
        if (\request()->has('sizes') && count(\request()->input('sizes')) > 0) {
            $sizesInput = \request()->input('sizes');

            foreach ($sizesInput as $size) {
                $sizes = $sizes->merge($result->filter(function ($value, $key) use ($size) {

                    return $value->sizes->pluck('id')->contains($size);
                }));
            }
        } else {
            $sizes = $sizes->merge($result);
        }
        $result = $sizes;


        /////////////////////////////////////////////////////////////////////////////////
        if (\request()->has('order')) {
            if (\request()->order == 1) {
                $order = $result->sortBy('price')->values()->all();
            }

            if (\request()->order == 2) {
                $order = $result->sortByDesc('price')->values()->all();
            }

            if (\request()->order == 3) {
                $order = $result->sortByDesc('created_at')->values()->all();
            }

            if (\request()->order == 4) {
                $order = $result->sortByDesc('view_count')->values()->all();
            }

        } else {
            $order = $result->sortBy('view_count')->values()->all();
        }


        /////////////////////////////////////////////////////////////////////////////////

        $final = collect($order);

        $filter = $final->unique()->values()->all();

        $filter = collect($filter);

        $res = $filter->filter(function ($value, $key) {
            return $value->status == 1;
        });
        $array = [];
        foreach ($res as $key => $item) {
            $array[] = $item;
        }
        return $array;
    }

    public function filter_all()
    {


        return response([
            "color" => Color::all(), "brand" => Brand::all(), "design" => Design::all(), "size" => Size::all(),
            "max_price" => Product::all()->max('price'), "min_price" => Product::all()->min('price')
        ]);
    }

    public function getArticle()
    {
        return Article::all();
    }

    public function getQas()
    {
        return qasAlias::all();

    }

    public function getBanner()
    {
        return Banner::all();
    }

    public function getProvince()
    {
        return Province::all();
    }


    public function uploadAvatar()
    {
        if (\request()->hasFile('image')) {
            if (\request()->image->isValid()) {
                $pathImage = $this->uploading(\request()->file('image'));
            }

        } else {
            return response(["error" => 'image not valid'], 406);
        }
        auth()->user()->avatar = $pathImage;
        auth()->user()->save();
        return response()->json(["image" => $pathImage]);

    }

    /////////////////////////////////////////////
    public function sliderAll()
    {
        return Slider::all();
    }

    public function GetSetting()
    {
        return Setting::where([
            ['name', '!=', 'social'],
            ['name', '!=', 'telegram_channel'],
            ['name', '!=', 'telegram_admin'],
            ['name', '!=', 'email'],
            ['name', '!=', 'tax'],
            ['name', '!=', 'tax_status'],
            ['name', '!=', 'tax_type'],
        ])->get();
//        return Setting::all()->except("1");
    }


    public function checkDiscount()
    {
if (Discount::where('code',request()->code)->exists()){
    return Discount::where('code',request()->code)->first();

}else{
    return response("code invalid",404);
}

    }
}
