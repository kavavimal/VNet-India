@extends('layouts.master')
@section('title')
    <title>Vnet | Preview Plan</title>
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
        <h4><a href="{{route('dashboard')}}">Vnet</a> | User Plan Preview</h4>
    </div>
</div>
<div class="separator-breadcrumb border-top"></div>
<div class="row mb-4">
    <div class="col-md-12">
        <h2 class="text-center">
            {{$plan->plan_name}}
        </h2>
    </div>
</div>
<div class="row mb-4">
    <div class="col-sm-6">
        Billing Cycle:
    </div>
    <div class="col-sm-6">
    @foreach($plan_billingcycle as $value)
        <div>
            {{ $value->billing_name }},
            {{ $value->billing_amount }},
            {{ $value->billing_percentage }},
            {{ $value->billing_upgrade_downgrade }}
        </div>
    @endforeach
    </div>
</div>
<div class="row mb-4">
    <div class="col-sm-6">
        Specification:
    </div>
    <div class="col-sm-6">
    @foreach($plan_specification as $value)
        <div>
            {{ $value->spec_name }}
        </div>
    @endforeach
    </div>
</div>
<div class="row mb-4">
    <div class="col-sm-6">
        Featured Category:
    </div>
    <div class="col-sm-6">
    @foreach($plan_featured_category as $value)
        <div>
            {{ $value->featured_cat_name }}
        </div>
    @endforeach
    </div>
</div>
<div class="row mb-4">
    <div class="col-sm-6">
        Sub Menu:
    </div>
    <div class="col-sm-6">
        {{$plan->submenu->submenu_name}}
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