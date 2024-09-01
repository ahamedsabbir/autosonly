<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @php($setting = \App\Models\Setting::first())
    <title> @yield('title')</title>
    @include('frontend.partials.style')
</head>

<body>
    <!-- start header  -->
    @include('frontend.partials.header')
    <!-- end header  -->
    <main>
        <!-- start hero area  -->
        @include('frontend.partials.slider')
        <!-- end hero area  -->
        @yield('content')
        <!-- faq area start  -->
        @include('frontend.partials.faq')
         <!-- faq area end  -->
    </main>
    <!-- start footer  -->
    @include('frontend.partials.footer')
    <!-- end footer  -->
    @include('frontend.partials.script')
</body>

</html>