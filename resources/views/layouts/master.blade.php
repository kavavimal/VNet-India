<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" type="image/x-icon" href="{{asset('storage/Logo_Settings/V_logo_new.png')}}">
        @yield('title')
        <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
        @yield('before-css')
        {{-- theme css --}}
        @if (Session::get('layout') == 'vertical')
            <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome-free-5.10.1-web/css/all.css') }}">
            <link rel="stylesheet" href="{{ asset('assets/styles/vendor/metisMenu.min.css') }}">
        @endif
        <link id="gull-theme" rel="stylesheet" href="{{ asset('assets/fonts/iconsmind/iconsmind.css') }}">
        <link id="gull-theme" rel="stylesheet" href="{{ asset('assets/styles/css/themes/lite-purple.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/styles/vendor/perfect-scrollbar.css') }}">
        <link rel="stylesheet" href="{{asset('assets/styles/vendor/toastr.css')}}">
        <link rel="stylesheet" href="{{asset('assets/styles/css/custom.css')}}">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        {{-- page specific css --}}
        <script>
            xui = {}; //Global xui variable
            xui.select2 = {};
        </script>
        @yield('page-css')
    </head>
    <body class="text-left">
        @php
            $layout = session('layout');
        @endphp
        <!-- Pre Loader Strat  -->
        {{-- <div class='loadscreen' id="preloader">
            <div class="loader spinner-bubble spinner-bubble-primary">
            </div>
        </div> --}}
        <!-- Pre Loader end  -->

        <!-- ============ Compact Layout start ============= -->
        @if ($layout == 'compact')
            @include('layouts.compact-vertical-sidebar.master')
        <!-- ============ Compact Layout End ============= -->

        <!-- ============ Horizontal Layout start ============= -->
        @elseif($layout=="horizontal")
            @include('layouts.horizontal-bar.master')
        <!-- ============ Horizontal Layout End ============= -->

        <!-- ============ Vetical SIdebar Layout start ============= -->
        @elseif($layout=="vertical")
            @include('layouts.vertical-sidebar.master')
        <!-- ============ Vetical SIdebar Layout End ============= -->

        <!-- ============ Large SIdebar Layout start ============= -->
        @elseif($layout=="normal")
            @include('layouts.large-vertical-sidebar.master')
        <!-- ============ Large Sidebar Layout End ============= -->

        @else
        <!-- ============Deafult  Large SIdebar Layout start ============= -->
            @include('layouts.large-vertical-sidebar.master')
        <!-- ============ Large Sidebar Layout End ============= -->
        @endif

        <!-- ============ Search UI Start ============= -->
        {{-- @include('layouts.search') --}}
        <!-- ============ Search UI End ============= -->

        <!-- ============ Customizer UI Start ============= -->
        @include('layouts.common.customizer')
        <!-- ============ Customizer UI Start ============= -->

        {{-- common js --}}
        <script src="{{ asset('assets/js/common-bundle-script.js') }}"></script>
        <script src="{{ asset('assets/js/script.js') }}"></script>
        {{-- page specific javascript --}}
        @yield('page-js')

        {{-- theme javascript --}}
        {{-- <script src="{{ mix('assets/js/es5/script.js') }}"></script>
        --}}    
        @if ($layout == 'compact')
            <script src="{{ asset('assets/js/sidebar.compact.script.js') }}"></script>
        @elseif($layout=='normal')
            <script src="{{ asset('assets/js/sidebar.large.script.js') }}"></script>
        @elseif($layout=='horizontal')
            <script src="{{ asset('assets/js/sidebar-horizontal.script.js') }}"></script>
        @elseif($layout=='vertical')
            <script src="{{ asset('assets/js/tooltip.script.js') }}"></script>
            <script src="{{ asset('assets/js/es5/script_2.js') }}"></script>
            <script src="{{ asset('assets/js/vendor/feather.min.js') }}"></script>
            <script src="{{ asset('assets/js/vendor/metisMenu.min.js') }}"></script>
            <script src="{{ asset('assets/js/layout-sidebar-vertical.js') }}"></script>
        @else
            <script src="{{ asset('assets/js/sidebar.large.script.js') }}"></script>
        @endif
            <script src="{{ asset('assets/js/customizer.script.js') }}"></script>
            <script src="{{asset('assets/js/vendor/toastr.min.js')}}"></script>
            <script src="{{asset('assets/js/toastr.script.js')}}"></script>

        {{-- laravel js --}}
        {{-- <script src="{{ mix('assets/js/laravel/app.js') }}"></script>
        --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {

                number = NaN;
                if (isNaN(number)) number = 0;

                $(".select2").select2();

                toastr.options = {
                    positionClass: "toast-bottom-left",
                    containerId: "toast-bottom-left",
                    timeOut: 3000,
                    fadeOut: 3000
                };
                @if (Session::has('error'))
                    toastr.error('{{ Session::get('error') }}','{{ Session::get('title')}}');
                @elseif(Session::has('success'))
                    toastr.info('{{ Session::get('success') }}','{{ Session::get('title')}}');
                @endif
            });
        </script>
        @yield('bottom-js')
    </body>
</html>
