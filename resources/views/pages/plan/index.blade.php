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
        <h4><a href="{{route('dashboard')}}">Vnet</a> | Plan </h4>
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
        <div class="card text-left">
            <div class="card-body">
                <h4 class="card-title mb-3">Plan    </h4>
                <div class="table-responsive">
                    <table id="zero_configuration_table" class="display table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Menu Item</th>
                                <th>Description</th>                                
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Menu Item</th>
                                <th>Description</th>                                
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
<script type="text/javascript">
</script>
@endsection