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
            <strong> {{$plan->plan_name}} </strong>
        </h2>
    </div>
</div>
<div class="row mb-4">
    <div class="col-sm-12"> 
        <div class="card mb-4">
            <div class="card-body">
                <strong> Under the Submenu: </strong> {{$plan->submenu->submenu_name}} 
            </div>
        </div>        
    </div>
    <?php  
        $plan_id = explode(",",$plan->plan_pricingids);        
        $plan_pricing_preview = \App\Models\PlanPricing::where('sys_state','!=','-1')->whereIn('id', $plan_id)->get();
    ?>
    <div class="col-sm-12">
        <div class="card mb-4">
            <div class="card-body table_wrap">
                <h4 class="mb-3" id="prod_name_to_display">Plan Pricing</h4>
                <table class="table table-hover collapsible">
                    <thead>
                        <th>Storage in GB</th>
                        <th>Storage Price in GB</th>
                        <th>Billing Cycle</th>
                        <th>Server Location</th>
                        <th>Percentage</th>
                        <th>Upgrade/Downgrade</th>
                        <th>Price</th>
                    </thead>                 
                    <tbody class="plan_price_list_tbl_view">
                        @if($plan_pricing_preview != '') 
                            @foreach ($plan_pricing_preview as $item)
                                <tr id="planPricing-{{$item->id}}">
                                    <td>{{$item->storage}}</td>
                                    <td>{{$item->storage_price}}</td>
                                    <td>{{$item->billing_cycle}}</td>
                                    <td>{{$item->server}}</td>
                                    <td>{{$item->window_server}}</td>
                                    <td>{{$item->upgrade_downgrade}}</td>
                                    <td class="total_price">{{$item->price}}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                <div class="plan_list_wrap"></div>
                <button class="expand_collapse_table btn btn-primary">Expand List</button>
            </div>
        </div>
    </div>
    <?php  
        $spec_id = explode(",",$plan->specification);        
        $specifications = \App\Models\Specification::where('sys_state','!=','-1')->whereIn('id', $spec_id)->get();
    ?>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 d-inline-block">Specification</h4>        
                <div class="specification_list_wrap">        
                @if($specifications != '')
                    @foreach ($specifications as $spec)
                        <div class="form-check" id="spec-{{$spec->id}}">
                            <label class="form-check-label mr-4 mb-2" for="specification-{{$spec->id}}">{{$spec->spec_name}}</label>                    
                        </div>
                    @endforeach
                @endif
                </div>
            </div>
        </div>    
    </div>
    <?php
        $featured_category_id = explode(",",$plan->featured_category);        
        $featuredCategory = \App\Models\FeaturedCategory::where('sys_state','!=','-1')->whereIn('id', $featured_category_id)->get();
    ?>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
            <h4 class="mb-3 d-inline-block">Featured Category</h4>        
            <div class="featuredCategory_list_wrap">
                @if($featuredCategory != '')
                    @foreach ($featuredCategory as $featured_cat)
                    <div>
                        <label class="form-check-label mr-4 mb-2">{{$featured_cat->featured_cat_name}}</label>    
                    </div>                      
                    @endforeach
                @endif
            </div>
            </div>
        </div>    
    </div>
    <?php
        $server_locations_id = explode(",",$plan->server_location);            
        $server_locations = \App\Models\ServerLocation::where('sys_state','!=','-1')->whereIn('id',$server_locations_id)->get();            
    ?>
    <div class="col-sm-12 mb-4 mt-4">
        <div class="card">
            <div class="card-body table_wrap">
                <h4 class="mb-3 d-inline-block">Server Location</h4>
                <div class="server_location_list_wrap">
                <table class="table table-hover collapsible">
                    <thead>
                        <th></th>
                        <th>Base Country</th>
                        <th>Base Amount</th>
                        <th>Allocate Country Amount</th>
                        <th>Currency</th>
                        <th>Server Location Country</th>
                        <th>Percentage</th>
                        <th>Upgrade/ Downgrade</th>
                    </thead>
                    <tbody class="server_location_list_tbl_view">
                        @if($server_locations != '') 
                            @foreach ($server_locations as $locationItem)
                                <tr id="serverlocation-{{$locationItem->id}}">
                                    <td><input
                                        class="server-location-checkbox"
                                        type="checkbox"
                                        value="0"
                                        id="serverlocations-{{$locationItem->id}}"
                                        name="serverlocations[]"
                                    /> </td>
                                    <td>{{$locationItem->base_country}}</td>                            
                                    <td>{{$locationItem->amount}}</td>
                                    <td>@if($locationItem->upgrade_downgrade != '' && $locationItem->percentage != '')
                                            @if($locationItem->upgrade_downgrade == 'upgrade' )
                                                {{($locationItem->amount + ($locationItem->amount * $locationItem->percentage / 100))}}
                                                @elseif ($locationItem->upgrade_downgrade == 'downgrade')
                                                {{($locationItem->amount - ($locationItem->amount * $locationItem->percentage / 100))}}
                                            @endif
                                        @endif
                                    </td>
                                    <td>{{$locationItem->currency}}</td>
                                    <td>{{$locationItem->server_location_country}}</td>
                                    <td>{{$locationItem->percentage}}</td>
                                    <td>{{$locationItem->upgrade_downgrade}}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                </div>
                <button class="expand_collapse_table btn btn-primary">Expand List</button>
            </div>
        </div>  
    </div>
</div>
@endsection
@section('page-js')
    <script src="{{asset('assets/js/vendor/datatables.min.js')}}"></script>
    <script src="{{asset('assets/js/datatables.script.js')}}"></script>
@endsection