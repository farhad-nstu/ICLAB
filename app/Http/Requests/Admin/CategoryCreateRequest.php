<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=> 'required|unique',
            'status' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Please enter product name',
            'name.unique' => 'Category with this name already exist!',
            'status.required'=>'Please choose a status',
        ];
    }
}
