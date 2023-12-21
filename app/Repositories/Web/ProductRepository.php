<?php

namespace App\Repositories\Web;

use App\Interfaces\Web\ProductRepositoryInterface;
use App\Models\Category;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    public function __construct()
    {
        //
    }

    public function filterProducts($request){
        $data['products'] = Product::all();
        $data['categories'] = Category::all();
        $data['request'] = $request;
        $data['title'] = 'FILTER PRODUCT';

        $filteredProducts = [];
        $requestedIds = $request->product_ids;
        if($requestedIds && count($requestedIds) > 0){
            for($i=0; $i<count($requestedIds); $i++){
                $requestedProduct = Product::find($requestedIds[$i]);
                $requestedCategory = Category::find($request->category_id);
                $product = [];

                // if($requestedProduct->category_id == $request->category_id || str_contains($requestedProduct->category->name, $requestedCategory->name)){ // only support in php 8 or greater
                if($requestedProduct->category_id == $request->category_id || strpos($requestedCategory->name, $requestedProduct->category->name) !== false){
                    $product['name'] = $requestedProduct->name;
                    $product['price'] = $requestedProduct->price;
                    $product['category'] = $requestedProduct->category->name;
                }
                if($product){
                    array_push($filteredProducts, $product);
                }
            }
        }
        $data['filteredProducts'] = $filteredProducts;
        return $data;
    }
}
