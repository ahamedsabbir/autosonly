@extends('frontend.app')

<!-- Start:Title -->
@section('title', App\Helper\Settings::get()->title)
<!-- End:Title -->

@push('css')

@endpush

@section('content')
    <!-- start hero area  -->
    @include('frontend.partials.slider')
    <!-- end hero area  -->
    
    {!!$page->description!!}
    
    
    <!-- steps area start  -->
    @include('frontend.partials.steps')
    <!-- steps area end  -->
    <!-- testimonial area start  -->
    @include('frontend.partials.testimonial')
    <!-- testimonial area end  -->
    <!-- faq area start  -->
    @include('frontend.partials.faq')
    <!-- faq area end  -->
@endsection

@push('js')
@endpush
