@extends('layouts.master')
@section('title')
    <title>Vnet | Product | {{$product->product_name ?? 'New'}}</title>
@endsection
@section('page-css')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<style>
    .form-group label {
        width: 100%;
    }
    .select2-container {
       width: 150px;
    }
    .dropdown-menu.show{
        left: -100% !important;
    }
    textarea{
        height: 100px !important;
    }
</style>
@endsection
<div class="loadscreen" id="preloader" style="display: none; z-index:90;">
    <div class="loader spinner-bubble spinner-bubble-primary"></div>
</div>
@section('main-content')
<div class="breadcrumb">
    <div class="col-sm-12 col-md-12">
        <h4> <a href="{{route('dashboard')}}">Vnet</a> | <a href="{{route('product-index')}}">Product</a> | Product {{ $product ? 'Edit: '.$product->product_name : 'New'}} </a>
        <a href="{{route('product-index')}}" class="btn btn-outline-primary ml-2 float-right">Cancel</a>
        <div class="btn-group dropdown float-right">
            <button type="submit" class="btn btn-outline-primary erp-product-form">
                Save
            </button>
        </div>
    </div>
</div>
<h4 class="heading-color">Product</h4>
<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-body">
                @if($product)
                    <form class="erp-product-submit" data-url="{{route('product-store')}}" data-id="uid" data-name="name" data-email="email" data-pass="password">
                        <input type="hidden" id="prod_id" class="prod_id" value="{{$product->id}}" name="uid" />
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="fname">Product Name</label>
                                <input placeholder="Enter Product Name" class="form-control" id="productName" name="productName" type="productName" value="{{ $product->product_name ?? ''}}">
                                <div class="error" style="color:red;" id="name_error"></div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="menu_category">Menu Category</label>                            
                                <select class="form-control select2"  id="menu_category" name="menu_category">
                                    <option value="0">Select Category</option>
                                    @foreach($category_list as $value)
                                    <?php $catSelect = '';
                                    if ($value->id == $product->category_id) {
                                        $catSelect = 'selected';
                                    } else {
                                        $catSelect = '';
                                    }
                                    ?>
                                    <option value="{{$value->id}}" {{$catSelect}}>
                                        {{ $value->name }}
                                    </option>
                                    @endforeach
                                </select>
                                <div class="error" style="color:red;" id="cat_error"></div>
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="productDesc">Product Description</label>
                                <textarea name="productDesc" id="productDesc" class="form-control">{{ $product->product_desc ?? ''}}</textarea>
                                <div class="error" style="color:red;" id="desc_error"></div>
                            </div>
                        </div>
                    </form>
                @else
                <form class="erp-product-submit" data-url="{{route('product-store')}}" data-id="uid" data-name="name" data-email="email" data-pass="password">
                    <input type="hidden" id="prod_id" class="prod_id" name="uid" value="0" />
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="fname">Product Name</label>
                            <input placeholder="Enter Product Name" class="form-control" id="productName" name="productName" type="productName">
                            <div class="error" style="color:red;" id="name_error"></div>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="menu_category">Menu Category</label>                            
                            <select class="form-control select2"  id="menu_category" name="menu_category">
                                <option value="0">Select Category</option>
                                @foreach($category_list as $value)
                                <option value="{{$value->id}}">
                                    {{ $value->name }}
                                </option>
                                @endforeach
                            </select>
                            <div class="error" style="color:red;" id="cat_error"></div>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="productDesc">Product Description</label>
                            <textarea name="productDesc" id="productDesc" class="form-control"></textarea>
                            <div class="error" style="color:red;" id="desc_error"></div>
                        </div>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>
<a href="{{route('product-index')}}" class="btn btn-outline-primary ml-2 float-right">Cancel</a>
<div class="btn-group dropdown float-right">
    <button type="submit" class="btn btn-outline-primary erp-product-form">
        Save
    </button>   
</div>
@endsection
@section('page-js')
<script src="{{asset('assets/js/carousel.script.js')}}"></script>
@endsection
@section('bottom-js')
    @include('pages.product.form-script')
@endsection