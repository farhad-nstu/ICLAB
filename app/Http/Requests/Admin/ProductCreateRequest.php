<?php

namespace App\Http\Requests\Admin;

use App\Rules\ProductUniqueCategoryName;
use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
        $request = $this->all();  // all request value fetch
        return [
            'name'=> ['required', new ProductUniqueCategoryName($request['category_id'])],
            'category_id' => 'required',
            'price' => 'required|numeric',
            'status' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Please enter product name',
            'category_id.required'=>'Please choose a category',
            'price.required'=>'Please enter product price',
            'status.required'=>'Please choose a status',
        ];
    }
}
