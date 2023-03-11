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
        <h4> <a href="{{route('dashboard')}}">Vnet</a> | <a href="{{route('user-plan-index')}}">Plan</a> | Plan {{ $plan ? 'Edit: '.$plan->plan_name : 'New'}} </a>
        @include('pages.user-plan.planButtons')
    </div>
</div>
<h4 class="heading-color">Plan</h4>
@if($plan)
    <form class="erp-user-plan-submit" data-url="{{route('user-plan-store')}}">
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
                @include('pages.user-plan.planPricing.planList')
                @include('pages.user-plan.planButtons')
            </div>
            <div class="col-md-6 px-2">
                @include('pages.user-plan.specificationsList')
            </div>
            <div class="col-md-6 px-2">
                @include('pages.user-plan.featuredcategoryList')               
            </div>
            @if($featuredCategorysSelected != '')
                @foreach ($featuredCategory as $featured_cat)
                    @if (in_array($featured_cat->id, $featuredCategorysSelected))
                        @include('pages.user-plan.featuredSubCat.featuredCatBlock', [
                            'id' => $featured_cat->id,
                            'name' => $featured_cat->featured_cat_name,
                            'items' => $featured_cat->children,
                            'featuredSubCategorysSelected' => $featuredSubCategorySelected,
                        ])
                    @endif
                @endforeach
            @endif
                        
        </div>
        <div class="row"><div class="col-md-12 mt-3">@include('pages.user-plan.planButtons')</div></div>
        <div class="row">
            <div class="col-md-12 mt-4">
                @include('pages.user-plan.serverlocation')
            </div>
            <div class="col-md-12 mt-3">
                @include('pages.user-plan.planButtons')
            </div>
            <div class="col-md-6 mt-4">
                @include('pages.user-plan.servicetype')
            </div>                      
            <div class="col-md-6 mt-4">
                @include('pages.user-plan.totalPrice')                
            </div>            
            <div class="col-md-12 mt-4">
                @include('pages.user-plan.billingList')
            </div>            
            <div class="col-md-4 mt-4">
                @include('pages.user-plan.tax')
            </div>
            <div class="col-md-8 mt-4">
                @include('pages.user-plan.calAmountTax')
            </div> 
            <div class="col-md-4 mt-4">
                @include('pages.user-plan.amountCalc')
            </div>  
            <div class="col-md-8 mt-4">
            @include('pages.user-plan.calamountafterdiscount')
            </div>  
            <div class="col-md-4 mt-4">
                @include('pages.user-plan.negotiation')
            </div>
        </div>
    </form>
@else
    <form class="erp-user-plan-submit" data-url="{{route('user-plan-store')}}">
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
@include('pages.user-plan.planButtons')
@endsection
@section('page-js')
<script src="{{asset('assets/js/carousel.script.js')}}"></script>
@endsection
@section('bottom-js')
@include('pages.user-plan.form-script')
    @include('pages.user-plan.specification-form-script')
    @include('pages.user-plan.featuredCategory-form-script')
    @include('pages.user-plan.featuredSubCat.featuredSubCategory-script')
    @include('pages.user-plan.billing-form-script')
    @include('pages.user-plan.planPricing.plan-form-script')
    @include('pages.user-plan.server-location-form-script')
    @include('pages.user-plan.tax-form-script')    
    @include('pages.user-plan.final-cal-script')    
@endsection
