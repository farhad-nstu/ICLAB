<?php

namespace App\Rules;

use App\Models\Product;
use Illuminate\Contracts\Validation\Rule;

class ProductUniqueCategoryName implements Rule
{
    protected $category_id;
    protected $product_id;

    public function __construct($category_id, $product_id=null)
    {
        $this->category_id = $category_id;
        $this->product_id = $product_id;
    }

    public function passes($attribute, $value)
    {
        if($this->product_id){
            $products = Product::where([
                ['category_id', $this->category_id],
                ['name', $value]
            ])
            ->where('id', '<>', $this->product_id)
            ->get();
        } else{
            $products = Product::where([
                ['category_id', $this->category_id],
                ['name', $value]
            ])->get();
        }

        if ($products->count()) {
            return false;
        }

        return true;
    }

    public function message()
    {
        return 'Product with this name of this category has already exist!';
    }
}
