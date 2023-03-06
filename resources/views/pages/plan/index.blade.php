@extends('layouts.master')
@section('title')
    <title>Vnet | Plan</title>
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
        <h4><a href="{{route('dashboard')}}">Vnet</a> | Plan Bucket </h4>
    </div>
    @can('plan-create')
        <div class="col-sm-12 col-md-6">
            <a href="{{route('plan-edit','new')}}" class="btn btn-primary btn-sm" style="float: right !important;">Create Plan</a>
        </div>
    @endcan
</div>
<div class="separator-breadcrumb border-top"></div>
<div class="row mb-4">
    <div class="col-md-12 mb-4">
        <div class="card text-left mb-2">
            <div class="card-body">
            <form class="filter-plan-submit">
                <div class="row">
                    <div class="col-md-4 form-group">
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
                    <div class="col-md-4 form-group">
                        <label for="filter_by_submenu">Filter By Sub Menu</label>                            
                        <div id="submenuwrap">
                        <select class="form-control select2"  id="filtery_by_submenu" name="filter_by_submenu">
                            @include('pages.submenu.subMenuSelectbox')
                        </select>
                        </div>
                    </div>
                    <div class="col-md-4 form-group mt-3">
                        <button class="btn btn-primary" type="button" id="apply_plan_filter">Filter</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
        <div class="card text-left">
            <div class="card-body">
                <h4 class="card-title mb-3">Plan    </h4>
                <div class="table-responsive">
                    <table id="plan_table" class="display table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Plan Name</th>
                                <th>Sub Menu Name</th>                                                               
                                <th>Action</th>
                            </tr>
                        </thead>
                        @include('pages.plan.planTableBody')
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Plan Name</th>
                                <th>Sub Menu Name</th>                                                               
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
@endsection
@section('bottom-js')
        @include('pages.submenu.filter-script')
<script type="text/javascript">
</script>
@endsection