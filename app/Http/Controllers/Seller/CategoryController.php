<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryCreateRequest;
use App\Http\Requests\Admin\CategoryUpdateRequest;
use App\Interfaces\CategoryRepositoryInterface;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        try {
            $data = $this->categoryRepository->index();
            return view('layouts.admin.pages.categories.index', $data);
        } catch (\Exception $e) {
            Alert::error('Somthing is wrong!', $e->getMessage(), true);
            return redirect()->back();
        }
    }

    public function create()
    {
        try {
            $data = $this->categoryRepository->create();
            return view('layouts.admin.pages.categories.create', $data);
        } catch (\Exception $e) {
            Alert::error('Somthing is wrong!', $e->getMessage(), true);
            return redirect()->back();
        }
    }

    public function store(CategoryCreateRequest $request){
        try {
            $data = $request->except('_token');
            $this->categoryRepository->store($data);
            toast('It has been created.', 'success')->timerProgressBar();
            return redirect()->back();
        } catch (\Exception $e) {
            Alert::error('Somthing is wrong!', $e->getMessage(), true);
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        try {
            $data = $this->categoryRepository->edit($id);
            return view('layouts.admin.pages.categories.edit', $data);
        } catch (\Exception $e) {
            Alert::error('Somthing is wrong!', $e->getMessage(), true);
            return redirect()->back();
        }
    }

    public function update(CategoryUpdateRequest $request, $id){
        try {
            $data = $request->except('_token', '_method', 'category_id');
            $this->categoryRepository->update($data, $id);
            toast('It has been updated.', 'success')->timerProgressBar();
            return redirect()->back();
        } catch (\Exception $e) {
            Alert::error('Somthing is wrong!', $e->getMessage(), true);
            return redirect()->back();
        }
    }
}
