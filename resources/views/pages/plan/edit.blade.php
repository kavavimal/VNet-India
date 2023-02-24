@extends('layouts.master')
@section('title')
    <title>Vnet | Plan | {{$plan->id ?? 'New'}}</title>
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
</style>
@endsection
<div class="loadscreen" id="preloader" style="display: none; z-index:90;">
    <div class="loader spinner-bubble spinner-bubble-primary"></div>
</div>
@section('main-content')
<div class="breadcrumb">
    <div class="col-sm-12 col-md-12">
        <h4> <a href="{{route('dashboard')}}">Vnet</a> | <a href="{{route('product-index')}}">Plan</a> | Plan  </a>
        <a href="{{route('plan-index')}}" class="btn btn-outline-primary ml-2 float-right">Cancel</a>
        <div class="btn-group dropdown float-right">
            <button type="submit" class="btn btn-outline-primary erp-product-form">
                Save
            </button>
        </div>
    </div>
</div>
<h4 class="heading-color">Product</h4>
<div class="row">
    <div class="col-md-12">
    {{--  @if($plan)
        <form class="erp-product-submit" data-url="{{route('product-store')}}" data-id="uid" data-name="name" data-email="email" data-pass="password">
            <input type="hidden" id="prod_id" class="prod_id" value="{{$product->id}}" name="uid" />
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="fname">Product Name</label>
                    <input placeholder="Enter Product Name" class="form-control" id="productName" name="productName" type="productName" value="{{ $product->product_name ?? ''}}">
                    <div class="error" style="color:red;" id="name_error"></div>
                </div>
                <div class="col-md-6 form-group">
                    <label for="menu_category">Menu Category</label>                            
                    <select class="form-control"  id="menu_category" name="menu_category">
                        <option value="0">Select Category</option>
                        @foreach($category_list as $value)
                        <?php $catSelect = '';
                        if ($value->id == $product->category_id) {
                            $catSelect = 'selected';
                        } else {
                            $catSelect = '';
                        }
                        ?>
                        <option value="{{$value->id}}" {{$catSelect}}>
                            {{ $value->name }}
                        </option>
                        @endforeach
                    </select>
                    <div class="error" style="color:red;" id="cat_error"></div>
                </div>
                <div class="col-md-12 form-group">
                    <label for="productDesc">Product Description</label>
                    <textarea name="productDesc" id="productDesc" class="form-control">{{ $product->product_desc ?? ''}}</textarea>
                    <div class="error" style="color:red;" id="fname_error"></div>
                </div>
            </div>
        </form>
    @else --}}
        <form class="erp-product-submit" data-url="{{route('product-store')}}" data-id="uid" data-name="name" data-email="email" data-pass="password">
        <input type="hidden" id="plan_id" class="plan_id" name="uid" value="0" />
            <div class="card mb-4">
                <div class="card-body">
                    <h4 class="mb-3">Single Domain</h4>
                    <div class="row">
                        <div class="col-md-2 form-group">
                            <label for="fname">Storage</label>
                            <input class="form-control" id="productName" name="productName" type="text">
                            <div class="error" style="color:red;" id="name_error"></div>
                        </div>                        
                        <div class="col-md-2 form-group">
                            <label for="productDesc">Storage Price</label>
                            <input class="form-control" id="productName" name="productName" type="text">
                            <div class="error" style="color:red;" id="fname_error"></div>
                        </div>
                        <div class="col-md-2 form-group">
                            <label for="productDesc">Billing Cycle</label>
                            <input class="form-control" id="productName" name="productName" type="text">
                            <div class="error" style="color:red;" id="fname_error"></div>
                        </div>
                        <div class="col-md-2 form-group">
                            <label for="productDesc">Server</label>
                            <input class="form-control" id="productName" name="productName" type="text">
                            <div class="error" style="color:red;" id="fname_error"></div>
                        </div>
                        <div class="col-md-2 form-group">
                            <label for="productDesc">Windows Serve</label>
                            <input class="form-control" id="productName" name="productName" type="text">
                            <div class="error" style="color:red;" id="fname_error"></div>
                        </div>
                        <div class="col-md-2 form-group">
                            <label for="productDesc">Price</label>
                            <input class="form-control" id="productName" name="productName" type="text">
                            <div class="error" style="color:red;" id="fname_error"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card col-md-5 mr-5">
                    <div class="card-body">
                        <h4 class="mb-3">Specification</h4>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="host_website">
                            <label class="form-check-label" for="host_website">Host Website</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="database">
                            <label class="form-check-label" for="database">Databases</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="bandwidth">
                            <label class="form-check-label" for="bandwidth">Bandwidth</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="cpanel">
                            <label class="form-check-label" for="cpanel">cPanel</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="one_click_install">
                            <label class="form-check-label" for="one_click_install">One Click Install + 1 cPanel</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="ssl">
                            <label class="form-check-label" for="ssl">SSL</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="antivirus_proctection">
                            <label class="form-check-label" for="antivirus_proctection">Antivirus Protection</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="24_7_365_support">
                            <label class="form-check-label" for="24_7_365_support">24*7*365 Support</label>
                        </div>
                    </div>
                </div>    
                <div class="card col-md-5">
                    <div class="card-body">
                        <h4 class="mb-3">Billing Cycle Price</h4>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="host_website">
                            <label class="form-check-label" for="host_website">Host Website</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="database">
                            <label class="form-check-label" for="database">Databases</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="bandwidth">
                            <label class="form-check-label" for="bandwidth">Bandwidth</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="cpanel">
                            <label class="form-check-label" for="cpanel">cPanel</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="one_click_install">
                            <label class="form-check-label" for="one_click_install">One Click Install + 1 cPanel</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="ssl">
                            <label class="form-check-label" for="ssl">SSL</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="antivirus_proctection">
                            <label class="form-check-label" for="antivirus_proctection">Antivirus Protection</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="24_7_365_support">
                            <label class="form-check-label" for="24_7_365_support">24*7*365 Support</label>
                        </div>
                    </div>
                </div>  
                <div class="card col-md-12 mt-4">
                    <div class="card-body">
                        <h4 class="mb-3">Features Category</h4>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="key_feature">
                            <label class="form-check-label" for="key_feature">Key Features</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="additional_feature">
                            <label class="form-check-label" for="additional_feature">Additional Features</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="resource_limit">
                            <label class="form-check-label" for="resource_limit">Resource Limit</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="security_features">
                            <label class="form-check-label" for="security_features">Security Features</label>
                        </div>
                    </div>
                </div> 
                <div class="card col-md-5 mt-4 mr-5">
                    <div class="card-body">
                        <h4 class="mb-3">Key Features</h4>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="host_website">
                            <label class="form-check-label" for="host_website">Easy cPanel Control Panel</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="database">
                            <label class="form-check-label" for="database">99.99% Uptime Commitment</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="bandwidth">
                            <label class="form-check-label" for="bandwidth">Free Website Migration</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="cpanel">
                            <label class="form-check-label" for="cpanel">Free Website Builde</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="one_click_install">
                            <label class="form-check-label" for="one_click_install">Easy Application Installer</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="ssl">
                            <label class="form-check-label" for="ssl">Password Proctected Directories</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="antivirus_proctection">
                            <label class="form-check-label" for="antivirus_proctection">Anti-DDOS Protection</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="24_7_365_support">
                            <label class="form-check-label" for="24_7_365_support">Antivirus Protection on Server</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="24_7_365_support">
                            <label class="form-check-label" for="24_7_365_support">gZip. Faster Page Load Options</label>
                        </div>
                    </div>
                </div>    
                <div class="card col-md-5 mt-4">
                    <div class="card-body">
                        <h4 class="mb-3">Resource Features</h4>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="host_website">
                            <label class="form-check-label" for="host_website">500 MB RAM</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="database">
                            <label class="form-check-label" for="database">IMBPS I/O</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="bandwidth">
                            <label class="form-check-label" for="bandwidth">20 Entry Proccess</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="cpanel">
                            <label class="form-check-label" for="cpanel">1 Core Shared CPU</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="one_click_install">
                            <label class="form-check-label" for="one_click_install">5000 iNode / Total Files</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="ssl">
                            <label class="form-check-label" for="ssl">256 MB Max Size per Database</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="antivirus_proctection">
                            <label class="form-check-label" for="antivirus_proctection">100 MB Storage per Email Account</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="24_7_365_support">
                            <label class="form-check-label" for="24_7_365_support">0 cron Jobs</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="24_7_365_support">
                            <label class="form-check-label" for="24_7_365_support">0 Email Accouonts</label>
                        </div>
                    </div>
                </div>   
            </div>               
        </form>                {{-- @endif --}}
    </div>
</div>
<a href="{{route('plan-index')}}" class="btn btn-outline-primary ml-2 float-right">Cancel</a>
<div class="btn-group dropdown float-right">
    <button type="submit" class="btn btn-outline-primary erp-product-form">
        Save
    </button>   
</div>
@endsection
@section('page-js')
<script src="{{asset('assets/js/carousel.script.js')}}"></script>
@endsection
@section('bottom-js')
    @include('pages.product.form-script')
@endsection