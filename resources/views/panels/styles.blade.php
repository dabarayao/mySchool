{{-- style blade file --}}
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700" rel="stylesheet">

    {{-- font awesome 5 cdn --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />

    {{-- vue.js development mode --}}
    {{--<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script> --}}


    <!-- BEGIN: Vendor CSS-->
    @if($configData['direction'] === 'ltr')
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/vendors.min.css')}}">
    @else
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/vendors-rtl.min.css')}}">
    @endif
    @yield('vendor-styles')
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/themes/semi-dark-layout.css')}}">
    @if($configData['direction'] === 'rtl')
    <link rel="stylesheet" type="text/css" href="{{asset('css/custom-rtl.css')}}">
    @endif
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    @if($configData['mainLayoutType'] == 'horizontal-menu')
    <link rel="stylesheet" type="text/css" href="{{asset('css/core/menu/menu-types/horizontal-menu.css')}}">
    @else
    <link rel="stylesheet" type="text/css" href="{{asset('css/core/menu/menu-types/vertical-menu.css')}}">
    @endif
    @yield('page-styles')
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    @if($configData['direction'] === 'ltr')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    @else
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style-rtl.css')}}">
    @endif
    <!-- END: Custom CSS-->
