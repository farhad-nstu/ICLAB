@extends('layouts.admin.app')
@section('title', $title)
@push('style')
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        .info {
            background-color: aqua;
        }
    </style>
@endpush
@section('body')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="card-title">@yield('title')</h4>
                        </div>

                        <div class="col-md-6">
                            <div class="d-flex flex-wrap gap-2 float-end">
                                <a href="{{ url()->previous() }}" class="btn btn-light waves-effect"><i
                                        class="fas-light fas fa-angle-double-left"></i> Back</a>
                                @can('products.create')
                                    <a href="{{ route('products.create') }}"
                                        class="btn btn-primary waves-effect waves-light">Create
                                        New</a>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-striped  nowrap w-100">
                        <thead>
                            <tr class="table-hd-bg">
                                <th>#</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Discount (%)</th>
                                <th>Discount Price</th>
                                <th>Status</th>
                                <th>action</th>
                            </tr>
                        </thead>


                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->discount }}</td>
                                    <td>{{ discountPrice($product->price, $product->discount) }}</td>
                                    <td>{{ $product->status }}</td>
                                    <td>
                                        @can('products.edit')
                                            <a href="{{ route('products.edit', $product->id) }}"
                                                class="btn btn-primary waves-effect waves-light"><i class="fas fa-edit"></i></a>
                                        @endcan
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
