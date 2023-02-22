@extends('layouts.master')
@section('title')
<title>Vnet | Menu | {{$category->id ?? 'New'}}</title>
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

    .dropdown-menu.show {
        left: -100% !important;
    }
</style>
@endsection
<div class="loadscreen" id="preloader" style="display: none; z-index:90;">
    <div class="loader spinner-bubble spinner-bubble-primary"></div>
</div>
@section('main-content')
<div class="breadcrumb">
    <div class="col-sm-12 col-md-12">
        <h4> <a href="{{route('dashboard')}}">Vnet</a> | <a href="{{route('category-index')}}">Menus</a> | Menu {{ $category ? 'Edit: '.$category->id : 'New'}} </a>
            <a href="{{route('category-index')}}" class="btn btn-outline-primary ml-2 float-right">Cancel</a>
            <div class="btn-group dropdown float-right">
                <button type="submit" class="btn btn-outline-primary erp-category-form">
                    Save
                </button>
            </div>
    </div>
</div>
<h4 class="heading-color">Menu</h4>
<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-body">
                @if($category)
                <form class="erp-category-submit" data-url="{{route('category-store')}}" data-id="cat-id" data-name="name" data-parent_id="parent_id" data-description="description">
                    <input type="hidden" id="cat-id" class="cat-id" value="{{$category->id}}" name="id" />
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="name">Name</label>
                            <input placeholder="Enter Category Name" class="form-control" id="name" name="name" type="text" value="{{ $category->name }}">
                            <div class="error" style="color:red;" id="name_error"></div>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="parent_id">Parent Id</label>
                            <select class="form-control" id="parent_id" name="parent_id">
                                <option value="0">No Parent</option>
                                @foreach($category_list as $cat)
                                <?php $catSelect = '';
                                if ($cat->id == $category->parent_id) {
                                    $catSelect = 'selected';
                                } else {
                                    $catSelect = '';
                                }
                                ?>
                                <option value="{{ $cat->id }}" {{$catSelect}}> {{ $cat->name }} </option>
                                @endforeach
                            </select>
                            <div class="error" style="color:red;" id="parent_id_error"></div>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="description">Description</label>
                            <textarea placeholder="Enter Description" class="form-control" id="description" name="description">{{$category->description}}</textarea>
                            <div class="error" style="color:red;" id="description_error"></div>
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Status</label>
                            <input class="status" name="status" type="radio" value="1" <?php if ($category->status == 1) {
                                                                                            echo 'checked="checked"';
                                                                                        } ?>> Enable
                            <input class="status" name="status" type="radio" value="0" <?php if ($category->status == 0) {
                                                                                            echo 'checked="checked"';
                                                                                        } ?>> Disable
                        </div>
                    </div>
                </form>
                @else
                <form class="erp-category-submit" data-url="{{route('category-store')}}" data-id="id" data-name="name" data-parent_id="parent_id" data-description="description">
                    <input type="hidden" id="cat-id" class="id" name="id" value="0" />
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="name">Name</label>
                            {!! Form::text('name', null, array('placeholder' => 'Enter Name','class' => 'form-control' , 'id' => 'name')) !!}
                            <div class="error" style="color:red;" id="name_error"></div>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="parent_id">Parent Id</label>
                            <select class="form-control"  id="parent_id" name="parent_id" value="">
                                <option value="0">No Parent</option>
                                @foreach($category_list as $value)
                                <option value="{{$value->id}}">
                                    {{ $value->name }}
                                </option>
                                @endforeach
                            </select>
                            <div class="error" style="color:red;" id="parent_id_error"></div>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="description">Description</label>
                            <textarea placeholder="Enter Description" class="form-control" id="description" name="description"></textarea>
                            <div class="error" style="color:red;" id="description_error"></div>
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Status</label>
                            <label><input class="status" name="status" checked="checked" type="radio" value="1"> Enable</label>
                            <label><input class="status" name="status" type="radio" value="0"> Disable</label>
                        </div>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>
<a href="{{route('category-index')}}" class="btn btn-outline-primary ml-2 float-right">Cancel</a>
<div class="btn-group dropdown float-right">
    <button type="submit" class="btn btn-outline-primary erp-category-form">
        Save
    </button>
</div>
@endsection
@section('page-js')
<script src="{{asset('assets/js/carousel.script.js')}}"></script>
@endsection
@section('bottom-js')
@include('pages.category.form-script')
@include('pages.common.modal-script')
@endsection