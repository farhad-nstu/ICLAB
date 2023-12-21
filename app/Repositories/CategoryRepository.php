<?php

namespace App\Repositories;

use App\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function __construct()
    {
        //
    }

    public function index(){
        $data['categories'] = Category::paginate(50);
        $data['title'] = 'CATEGORY LIST';
        return $data;
    }

    public function create(){
        $data['title'] = 'CATEGORY CREATE';
        return $data;
    }

    public function store($request){
        $category = Category::create($request);
        return $category;
    }

    public function edit(int $id){
        $data['title'] = 'CATEGORY EDIT';
        $data['category'] = Category::find($id);
        return $data;
    }

    public function update($request, int $id){
        $category = Category::where('id', $id)->update($request);
        return $category;
    }

    public function destroy(int $id){

    }
}
