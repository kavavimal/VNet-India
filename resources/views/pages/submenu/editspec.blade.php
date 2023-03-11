@extends('layouts.master')
@section('title')
    <title>Vnet | Configuration | {{$plan->id ?? 'New'}}</title>
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
        <h4> <a href="{{route('dashboard')}}">Vnet</a> | <a href="{{route('submenu-index')}}">SubMenu</a> | Configuration {{ $plan ? 'Edit: '.$plan->id : 'New'}} </a>
        @include('pages.submenu.specButtons')
    </div>
</div>
<h4 class="heading-color">Configuration</h4>
@if($plan)
    <form class="erp-spec-plan-submit" data-url="{{route('specification-plan-store')}}">
        <input type="hidden" id="plan_id_update" class="plan_id_update" name="id" value="{{ $plan->id ?? '' }}" />
        <input type="hidden" id="plan_id" class="plan_id" name="id" value="{{ $plan->id ?? '' }}" />
        <div class="row featured-sub-cat-wrap">
            <div class="col-md-12">
                <div class="card mt-4 mb-4">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="fname">Select Sub Menu</label>
                            <select class="form-control select2"  id="product_id" name="product_id" disabled>
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
            <div class="col-md-12">
                @include('pages.submenu.configuration.planList')
                @include('pages.submenu.specButtons')
            </div>
            <div class="col-md-6">
                @include('pages.submenu.configuration.specificationsList')
            </div>
            <div class="col-md-6">
                @include('pages.submenu.configuration.featuredcategoryList')                
            </div>
            @if($featuredCategorysSelected != '')
                @foreach ($featuredCategory as $featured_cat)
                    @if (in_array($featured_cat->id, $featuredCategorysSelected))
                        @include('pages.submenu.configuration.featuredCatBlock', [
                            'id' => $featured_cat->id,
                            'name' => $featured_cat->featured_cat_name,
                            'items' => $featured_cat->children,
                            'featuredSubCategorysSelected' => $featuredSubCategorySelected,
                        ])
                    @endif
                @endforeach
            @endif            
        </div>
        <div class="row"><div class="col-md-12 mt-3">@include('pages.submenu.specButtons')</div></div>
        <div class="row">
            <div class="col-md-12 mt-4">
                @include('pages.submenu.configuration.serverlocation')
            </div>
            <div class="col-md-12 mt-3">
                @include('pages.submenu.specButtons')
            </div>
            <div class="col-md-6 mt-4">
                @include('pages.submenu.configuration.servicetype')
            </div>                      
            <div class="col-md-6 mt-4">
                @include('pages.submenu.configuration.totalPrice')                
            </div>            
            <div class="col-md-12 mt-4">
                @include('pages.submenu.configuration.billingList')
            </div>            
            <div class="col-md-4 mt-4">
                @include('pages.submenu.configuration.tax')                
            </div>
            <div class="col-md-8 mt-4">
                @include('pages.submenu.configuration.calAmountTax')
            </div> 
            <div class="col-md-4 mt-4">
                @include('pages.submenu.configuration.amountCalc')
            </div>  
            <div class="col-md-8 mt-4">
            @include('pages.submenu.configuration.calamountafterdiscount')
            </div>  
            <div class="col-md-4 mt-4">
                @include('pages.submenu.configuration.negotiation')
            </div>
        </div>
    </form>
@else
    <form class="erp-spec-plan-submit" data-url="{{route('specification-plan-store')}}">
        <input type="hidden" id="plan_id" class="plan_id" name="pid" value="{{$submenuid}}" />
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4 mb-4">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="fname">Select Sub Menu</label>
                            <select class="form-control select2"  id="product_id" name="product_id" disabled>
                                <option value="0">Select Sub Menu</option>
                                @foreach($product_list as $value)
                                <?php $prodSelect = ''; if ($value->id == $submenuid) {$prodSelect = 'selected';} else {$prodSelect = '';}?>
                                <option value="{{$value->id}}" {{$prodSelect}}>
                                    {{ $value->submenu_name }}
                                </option>
                                @endforeach
                            </select>
                            <div class="error" style="color:red;" id="product_id_error"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endif
@include('pages.submenu.specButtons')
@endsection
@section('page-js')
<script src="{{asset('assets/js/carousel.script.js')}}"></script>
@endsection
@section('bottom-js')
    @include('pages.submenu.spec-script')
    @include('pages.submenu.configuration.specification-form-script')
    @include('pages.submenu.configuration.featuredCategory-form-script')
    @include('pages.submenu.configuration.featuredSubCategory-script')
    @include('pages.submenu.configuration.billing-form-script')
    @include('pages.submenu.configuration.plan-form-script')
    @include('pages.submenu.configuration.server-location-form-script')
    @include('pages.submenu.configuration.tax-form-script')    
    @include('pages.submenu.configuration.final-cal-script')    
@endsection
