@extends('layouts.master')
@section('title')
    <title>Vnet | Sub Menu</title>
@endsection
@section('page-css')
    <link rel="stylesheet" href="{{asset('assets/styles/vendor/datatables.min.css')}}">
    <style>
        .custom-content {
            margin: auto;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
    </style>
@endsection
@section('main-content')
<div class="breadcrumb">
    <div class="col-sm-12 col-md-6">
        <h4><a href="{{route('dashboard')}}">Vnet</a> | Sub Menu </h4>
    </div>
    @can('submenu-create')
        <div class="col-sm-12 col-md-6">
            <a href="{{route('submenu-edit','new')}}" class="btn btn-primary btn-sm" style="float: right !important;">Create Sub Menu</a>
        </div>
    @endcan
</div>
<div class="separator-breadcrumb border-top"></div>
<div class="row mb-4">
    <div class="col-md-12 mb-4">
        <div class="card text-left mb-2">
            <div class="card-body">
            <form class="filter-submenu-submit">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="filter_by_menu">Filter By Menu</label>                            
                        <select class="form-control select2"  id="filtery_by_menu" name="filter_by_menu">
                            <option value="0">All</option>
                            @foreach($category_list as $value)
                                <option value="{{$value->id}}" >
                                    {{ $value->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>
            </div>
        </div>
        
        <div class="card text-left">
            <div class="card-body">
                <h4 class="card-title mb-3">Sub Menu</h4>
                <div class="table-responsive">
                    <table id="sub_menu_table" class="display table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Menu Item</th>                             
                                <th>Action</th>
                            </tr>
                        </thead>
                        @include('pages.submenu.subMenuTableBody')
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Menu Item</th>                          
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page-js')
    <script src="{{asset('assets/js/vendor/datatables.min.js')}}"></script>
    <script src="{{asset('assets/js/datatables.script.js')}}"></script>
    <script src="{{asset('assets/js/datatables.script.js')}}"></script>
@endsection
@section('bottom-js')
    @include('pages.submenu.filter-script')
<script type="text/javascript">
</script>
@endsection