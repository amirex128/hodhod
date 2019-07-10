<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'lname' => 'required',
            'phone' => Rule::unique('users', 'phone')->ignore(auth()->user()),
            'status' => 'required',
            'level' => 'required',
            'address' => 'required',
            'email' => Rule::unique('users', 'email')->ignore(auth()->user()),

        ];
    }
}
