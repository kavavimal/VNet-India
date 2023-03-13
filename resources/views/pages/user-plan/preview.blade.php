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
            </div>
        </div>  
    </div>
    <?php 
        $support = $plan->service_type_type;    
    ?>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
            <h4 class="mb-3">Support</h4>
            <div class="service_type_list_wrap">
                <div class="row align-items-center">
                    <div class="col-md-6">                                    
                        <div class="form-group mt-2">
                            <label class="radio radio-primary mb-2"> <?php if($plan->service_type_type = 'managed'){ echo 'Permium Support';} else{ echo 'No Support';} ?></label>
                        </div>                    
                    </div>               
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="service_type_price">Price</label>
                            <input type="text" name="service_type_price" id="service_type_price" class="form-control" value="{{ $plan->service_type_price ?? '' }}" readonly>
                        </div>
                    </div>                            
                </div> 
            </div>
        </div>
    </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3">Total Price</h4>
                <div class="total_price_list_wrap">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="servive_type_total">Final Total</label>
                                <input type="text" name="servive_type_total" id="servive_type_total" class="form-control" readonly >
                            </div>
                        </div>                
                    </div> 
                </div>
        </div>
    </div>
    </div>
    <?php
        $bilingCycle_id = explode(",",$plan->billing_cycles);
        $bilingCycle = \App\Models\BilingCycle::where('sys_state','!=','-1')->whereIn('id',$bilingCycle_id)->orderBy('billing_name','desc')->get();
    ?>
    <div class="col-md-12 mt-4">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3">Billing Cycle Price</h4>
                <div class="billing_list_wrap">
                    <table class="table table-hover">
                        <thead>
                            <th>Name</th>
                            <th>Amount</th>
                            <th>Percentage</th>
                            <th>Upgrade / Downgrade</th>
                        </thead>
                        <tbody class="billing_price_table">
                        <tr class="first_year_info">
                            <td>1 Year</td>
                            <td class="default_amount"></td>
                            <td>-</td>
                            <td>-</td>                    
                        </tr>
                            @if($bilingCycle != '')
                                @foreach ($bilingCycle as $list)
                                    <tr id="billingPrice-{{$list->id}}">
                                        				    
                                        <td>
                                        <input 
                                            class=" billing_cycle d-none"
                                            type="checkbox"
                                            value="{{$list->id}}"
                                            id="billing-cycle-{{$list->id}}"
                                            name="billing_cycle[]" 
                                            data-name="{{$list->billing_name}}"
                                            data-amount="{{$list->billing_amount}}"
                                            data-percentage="{{$list->billing_percentage}}"
                                            data-type="{{$list->billing_upgrade_downgrade}}"
                                            <?php if($list->id = $list->id){echo 'checked="checked"';} ?>                                        
                                        />    
                                        {{$list->billing_name}} Years</td>
                                        <td>{{$list->billing_amount}}</td>
                                        <td>{{$list->billing_percentage}}</td>
                                        <td>{{$list->billing_upgrade_downgrade}}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                        
                </div>
            </div>
        </div>
    </div>
    <?php        
        $tax_id = explode(",",$plan->taxation);
        $tax = \App\Models\Tax::where('sys_state','!=','-1')->whereIn('id',$tax_id)->get();
    ?>
    <div class="col-md-4 mt-4">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 d-inline-block">Taxation</h4>
                <div class="tax_list_wrap">
                    <div class="form-group">
                        <div class="input-group">
                            <select class="form-control" id="taxation" name="taxation" disabled>
                                <option value="0">Select Tax</option>
                                @if($tax != '')
                                    @foreach($tax as $tax_item)
                                        <option data-id="{{$tax_item->id}}" data-tax="{{$tax_item->tax_percentage}}" value="{{$tax_item->id}}" {{ $tax_item->id ? 'selected="selected"' : '' }} >{{$tax_item->tax_name}} - {{$tax_item->tax_percentage}} %</option>
                                    @endforeach
                                @endif
                            </select>                    
                        </div>
                        <div class="error" style="color:red;" id="taxation_error"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8 mt-4">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3">Final Total After Tax</h4>
                <div class="taxation_billing_list_wrap">
                    <table class="table table-hover ">
                        <thead>
                            <th>No Of Years</th>
                            <th>Amount</th>
                            <th>Tax</th>
                            <th>Final Amount</th>
                        </thead>
                        <tbody class="billing_price_table">
                        <tr class="first_year_info">
                            <td>1</td>
                            <td class="default_amount"></td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <?php $taxTable = true; ?>
                            @if($bilingCycle != '')
                                @foreach ($bilingCycle as $list)
                                    <tr id="billingPrice-{{$list->id}}">							    
                                    <td>{{$list->billing_name}}</td>
                                    <td>{{$list->billing_amount}}</td>
                                    <td>-</td>
                                    <td>-</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>        
                </div>        
            </div>
        </div>
    </div>
    <div class="col-md-4 mt-4">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3">Amount Calculation</h4>
                <div class="amount_calc_list_wrap">
                    <div class="row align-items-center">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="servive_type_currency">Currency</label>
                                <input type="text" name="servive_type_currency" id="servive_type_currency" class="form-control" value="{{ $plan->servive_type_currency ?? '' }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="service_type_renewal_price">Renewal Price</label>
                                <input type="text" name="service_type_renewal_price" id="service_type_renewal_price" class="form-control" value="{{ $plan->service_type_renewal_price ?? '' }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="service_type_discount">Discount Percentage</label>
                                <input type="text" name="service_type_discount" id="service_type_discount" class="form-control" value="{{ $plan->service_type_discount ?? '' }}" readonly>
                            </div>
                        </div>                          
                    </div> 
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8 mt-4">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3">Final Total After Discount</h4>
                <div class="final_cal_billing_list_wrap">
                    <table class="table table-hover ">
                        <thead>
                            <th>No Of Years</th>
                            <th>Amount</th>
                            <th>Discount</th>
                            <th>Final Amount</th>
                        </thead>
                        <tbody class="billing_price_table">
                        <tr class="first_year_info">
                            <td>1</td>
                            <td class="default_amount"></td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <?php $taxTable = true; ?>
                            @if($bilingCycle != '' && count($bilingCycle) > 0)
                                @foreach ($bilingCycle as $list)
                                    <tr id="taxation-billingPrice-{{$list->id}}">
                                        <td>{{$list->billing_name}}</td>
                                        <td>{{$list->billing_amount}}</td>
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
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
    @include('pages.user-plan.preview-script')
@endsection
