@extends('layouts.master')
@section('title')
    <title>Vnet | Plan | {{$plan->plan_name ?? 'New'}}</title>
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
    #serverLocation_modal .select2-container{
        width: 100% !important;
    }
</style>
@endsection
<div class="loadscreen" id="preloader" style="display: none; z-index:90;">
    <div class="loader spinner-bubble spinner-bubble-primary"></div>
</div>
@section('main-content')
<div class="breadcrumb">
    <div class="col-sm-12 col-md-12">
        <h4> <a href="{{route('dashboard')}}">Vnet</a> | <a href="{{route('plan-index')}}">Plan</a> | Plan {{ $plan ? 'Edit: '.$plan->plan_name : 'New'}} </a>
        <a href="{{route('plan-index')}}" class="btn btn-outline-primary ml-2 float-right">Cancel</a>
        <div class="btn-group dropdown float-right">
            <button type="submit" class="btn btn-outline-primary erp-plan-form">
                Save
            </button>
        </div>
    </div>
</div>
<h4 class="heading-color">Plan</h4>
@if($plan)
    <form class="erp-plan-submit" data-url="{{route('plan-store')}}">
        <input type="hidden" id="plan_id" class="plan_id" name="id" value="{{ $plan->id ?? '' }}" />
        <div class="row featured-sub-cat-wrap">
            <div class="col-md-6">
                <div class="card mt-4 mb-4">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="fname">Select Sub Menu</label>
                            <select class="form-control select2"  id="product_id" name="product_id">
                                <option value="0">Select Sub Menu</option>
                                @foreach($product_list as $value)
                                <?php $prodSelect = ''; if ($value->id == $plan->plan_product_id) {$prodSelect = 'selected';} else {$prodSelect = '';}?>
                                <option value="{{$value->id}}" {{$prodSelect}}>{{ $value->submenu_name }}</option>
                                @endforeach
                            </select>
                            <div class="error" style="color:red;" id="name_error"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mt-4 mb-4">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="fname">Plan Name</label>
                            <input class="form-control" id="planName" name="planName" type="text" value="{{ $plan->plan_name ?? '' }}">
                            <div class="error" style="color:red;" id="name_error"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                @include('pages.plan.planPricing.planList')
            </div>
            <div class="col-md-6">
                @include('pages.plan.specificationsList')
            </div>
            <div class="col-md-6">
                @include('pages.plan.featuredcategoryList')
            </div>
            @if($featuredCategorysSelected != '')
                @foreach ($featuredCategory as $featured_cat)
                    @if (in_array($featured_cat->id, $featuredCategorysSelected))
                        @include('pages.plan.featuredSubCat.featuredCatBlock', [
                            'id' => $featured_cat->id,
                            'name' => $featured_cat->featured_cat_name,
                            'items' => $featured_cat->children,
                            'featuredSubCategorysSelected' => $featuredSubCategorySelected,
                        ])
                    @endif
                @endforeach
            @endif            
        </div>
        <div class="row">
            <div class="col-md-12 mt-4">
                @include('pages.plan.serverlocation')
            </div>
            <div class="col-md-4 mt-4">
                @include('pages.plan.billingList')
            </div>
            <div class="col-md-4 mt-4">
                @include('pages.plan.servicetype')
            </div>    
            <div class="col-md-4 mt-4">
                @include('pages.plan.amountCalc')
            </div>                     
            <div class="col-md-4 mt-4">
                @include('pages.plan.totalPrice')                
            </div>
            <div class="col-md-4 mt-4">
                @include('pages.plan.tax')                
            </div> 
            <div class="col-md-4 mt-4">
                @include('pages.plan.negotiation')
            </div>                                           
        </div>
    </form>
@else
    <form class="erp-plan-submit" data-url="{{route('plan-store')}}">
        <input type="hidden" id="plan_id" class="plan_id" name="pid" value="0" />
        <div class="row">
            <div class="col-md-6">
                <div class="card mt-4 mb-4">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="fname">Select Sub Menu</label>
                            <select class="form-control select2"  id="product_id" name="product_id">
                                <option value="0">Select Sub Menu</option>
                                @foreach($product_list as $value)
                                <option value="{{$value->id}}">
                                    {{ $value->submenu_name }}
                                </option>
                                @endforeach
                            </select>
                            <div class="error" style="color:red;" id="product_id_error"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mt-4 mb-4">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="fname">Plan Name</label>
                            <input class="form-control" id="planName" name="planName" type="text">
                            <div class="error" style="color:red;" id="plan_name_error"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endif
<a href="{{route('plan-index')}}" class="btn btn-outline-primary ml-2 float-right">Cancel</a>
<div class="btn-group dropdown float-right">
    <button type="submit" class="btn btn-outline-primary erp-plan-form">
        Save
    </button>
</div>
@endsection
@section('page-js')
<script src="{{asset('assets/js/carousel.script.js')}}"></script>
@endsection
@section('bottom-js')
    @include('pages.plan.form-script')
    @include('pages.plan.specification-form-script')
    @include('pages.plan.featuredCategory-form-script')
    @include('pages.plan.featuredSubCat.featuredSubCategory-script')
    @include('pages.plan.billing-form-script')
    @include('pages.plan.planPricing.plan-form-script')
    @include('pages.plan.server-location-form-script')
    @include('pages.plan.tax-form-script')    
@endsection
