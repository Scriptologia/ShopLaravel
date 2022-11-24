<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('title_seo')</title>
    <meta name="description" content="@yield('description_seo')">
    <meta name="keywords" content="@yield('keywords')" />
    <link rel="stylesheet preload" as="style" href="{{asset('front/css/preload.min.css')}}" />
    <link rel="stylesheet preload" as="style" href="{{asset('front/css/icomoon.css')}}" />
    <link rel="stylesheet preload" as="style" href="{{asset('front/css/libs.min.css')}}" />
    @livewireStyles
@stack('css')
</head>
<body>
<header class="header d-flex flex-wrap align-items-center" data-page="@yield('data-page')" data-overlay="@@overlay">
    @include('front.partials.menu-header')
</header>

@yield('content')

<footer class="footer">
    @include('front.partials.footer-main-section')
    @include('front.partials.footer-secondary')
</footer>
@include('front.partials.cart-slider')
@livewireScripts
<script src="{{asset('front/js/common.min.js')}}"></script>
@stack('js')
</body>
</html>