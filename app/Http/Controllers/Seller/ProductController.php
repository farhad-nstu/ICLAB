<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductCreateRequest;
use App\Http\Requests\Admin\ProductUpdateRequest;
use App\Interfaces\ProductRepositoryInterface;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    private $productRepository;
    private $data;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        try {
            $data = $this->productRepository->index(auth()->guard('admin')->id());
            return view('layouts.admin.pages.products.index', $data);
        } catch (\Exception $e) {
            Alert::error('Somthing is wrong!', $e->getMessage(), true);
            return redirect()->back();
        }
    }

    public function create()
    {
        try {
            $data = $this->productRepository->create();
            return view('layouts.admin.pages.products.create', $data);
        } catch (\Exception $e) {
            Alert::error('Somthing is wrong!', $e->getMessage(), true);
            return redirect()->back();
        }
    }

    public function store(ProductCreateRequest $request){
        try {
            $data = $request->except('_token');
            $this->productRepository->store($data);
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
            $data = $this->productRepository->edit($id);
            return view('layouts.admin.pages.products.edit', $data);
        } catch (\Exception $e) {
            Alert::error('Somthing is wrong!', $e->getMessage(), true);
            return redirect()->back();
        }
    }

    public function update(ProductUpdateRequest $request, $id){
        try {
            $data = $request->except('_token', '_method', 'product_id');
            $this->productRepository->update($data, $id);
            toast('It has been updated.', 'success')->timerProgressBar();
            return redirect()->back();
        } catch (\Exception $e) {
            Alert::error('Somthing is wrong!', $e->getMessage(), true);
            return redirect()->back();
        }
    }
}
