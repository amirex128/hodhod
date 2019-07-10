<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "title"=>"required",
            "description"=>"required",
            "stock"=>"required",
            "price"=>"required",
            "image"=>"required",
            "offer"=>"required",
            "colors"=>"required",
            "sizes"=>"required",
            "designs"=>"required",
            "brand"=>"required",
            "categories"=>"required",
        ];
    }

	public function messages()
	{
		return [
			"title.required"=>"لطفا فیلد عنوان را وارد نمایید",
			"description.required"=>"لطفا فیلد توضیحات را وارد نمایید",
			"stock.required"=>"لطفا فیلد موجودی انبار را وارد نمایید",
			"price.required"=>"لطفا قیمت محصول را وارد نمایید",
			"image.required"=>"لطفا تصویر شاخص را وارد نمایید",
		];

    }
}
