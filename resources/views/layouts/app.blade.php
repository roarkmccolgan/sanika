<!doctype html>
<html lang="{{ app()->getLocale() }}" class="h-full">
<head>
@section('head')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link href="https://fonts.googleapis.com/css?family=Open+Sans|Open+Sans+Condensed:700" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    
@show
</head>
<body class="font-sans antialiased text-grey-darkest leading-tight h-full">
<div id="app" class="flex flex-col h-full">
    @include('partial.pagetop')
    @include('partial.mainav')
    @yield('body')
</div>
@stack('scripts')
@include('partial.jsvars')
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>