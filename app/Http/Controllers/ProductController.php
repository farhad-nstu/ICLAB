<?php

namespace App\Http\Controllers;

use App\Interfaces\Web\ProductRepositoryInterface;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    private $productRepossitory;

    public function __construct(ProductRepositoryInterface $productRepository){
        $this->productRepossitory = $productRepository;
    }

    public function filterProducts(Request $request){
        try {
            $data = $this->productRepossitory->filterProducts($request);
            return view('layouts.pages.products', $data);
        } catch (\Exception $e) {
            Alert::error('Somthing is wrong!', $e->getMessage(), true);
            return redirect()->back();
        }
    }
}
