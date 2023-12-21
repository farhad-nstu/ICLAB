<?php

namespace App\Http\Requests\Admin;

use App\Rules\ProductUniqueCategoryName;
use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
        $request = $this->all();
        return [
            // 'name'=> 'required|unique:products,name,'.$this->product->id,
            'name'=> ['required', new ProductUniqueCategoryName($request['category_id'], $request['product_id'])],
            'category_id' => 'required',
            'price' => 'required|numeric',
            'status' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Please enter product name',
            // 'name.unique' => 'Product with this name already exist!',
            'category_id.required'=>'Please choose a category',
            'price.required'=>'Please enter product price',
            'status.required'=>'Please choose a status',
        ];
    }
}
