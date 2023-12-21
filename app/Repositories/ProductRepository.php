<?php

namespace App\Repositories;

use App\Enums;
use App\Interfaces\ProductRepositoryInterface;
use App\Models\Category;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    protected $product_status = Enums::PRODUCT_STATUS;
    public function __construct()
    {
        //
    }

    public function index($seller_id){
        $data['products'] = Product::with('category')->where('created_by', $seller_id)->paginate(50);
        $data['title'] = 'PRODUCTS LIST';
        return $data;
    }

    public function create(){
        $data['categories'] = Category::all();
        $data['statuses'] = Enums::PRODUCT_STATUS;
        $data['title'] = 'PRODUCTS CREATE';
        return $data;
    }

    public function store($request){
        $product = Product::create($request);
        return $product;
    }

    public function edit(int $id){
        $data['categories'] = Category::all();
        $data['statuses'] = Enums::PRODUCT_STATUS;
        $data['title'] = 'PRODUCTS EDIT';
        $data['product'] = Product::find($id);
        return $data;
    }

    public function update($request, int $id){
        $product = Product::where('id', $id)->update($request);
        return $product;
    }

    public function destroy(int $id){

    }
}
