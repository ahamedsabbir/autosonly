<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title')</title>
    <link rel="shortcut icon" href="{{ App\Helper\Settings::get()->favicon ? asset(App\Helper\Settings::get()->favicon) : asset('default/logo.svg') }}" type="image/x-icon">
    @include('frontend.partials.style')
    @stack('css')
</head>

<body>
    @include('frontend.partials.alert')
    <!-- start header  -->
    @include('frontend.partials.header')
    <!-- end header  -->
    <main>
        @yield('content')
    </main>
    <!-- start footer  -->
    @include('frontend.partials.footer')
    <!-- end footer  -->
    @include('frontend.partials.script')
    @stack('js')
</body>

</html>