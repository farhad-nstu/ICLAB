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
                                @can('products.index')
                                    <a href="{{ route('products.index') }}"
                                        class="btn btn-info waves-effect waves-light">Products List</a>
                                @endcan
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
        @if ($errors->any() && !old('_method'))
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    @include('layouts.components.input', [
                                        'wrap' => 'col-md-12',
                                        'label' => 'Name',
                                        'type' => 'text',
                                        'field' => 'name',
                                        'id' => 'name',
                                        'placeholder' => 'Product name',
                                    ])
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    @include('layouts.components.select', [
                                        'wrap' => 'col-md-12',
                                        'label' => 'Category',
                                        'field' => 'category_id',
                                        'id' => 'status1',
                                        'placeholder' => 'Choose Category',
                                        'values' => $categories,
                                        'value_type' => 'associative',
                                        'value_key' => 'name',
                                        'index' => 'id',
                                    ])
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    @include('layouts.components.input', [
                                        'wrap' => 'col-md-12',
                                        'label' => 'Price',
                                        'type' => 'text',
                                        'field' => 'price',
                                        'id' => 'price',
                                        'placeholder' => 'Product price',
                                    ])
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    @include('layouts.components.input', [
                                        'wrap' => 'col-md-12',
                                        'label' => 'Discount (In %)',
                                        'type' => 'number',
                                        'field' => 'discount',
                                        'id' => 'discount',
                                        'placeholder' => 'Product discount',
                                    ])
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    @include('layouts.components.select', [
                                        'wrap' => 'col-md-12',
                                        'label' => 'Status',
                                        'field' => 'status',
                                        'id' => 'status1',
                                        'placeholder' => 'Choose One',
                                        'values' => $statuses,
                                        'value_type' => 'indexed',
                                        'value_key' => 'name',
                                    ])
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <hr>
                                <div class="mb-0 mb-md-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
@stop
