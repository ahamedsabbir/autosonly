@extends('frontend.app')

<!-- Start:Title -->
@section('title', 'Home')
<!-- End:Title -->

@section('style')

@endsection

@section('content')
    <!-- faq area start  -->
    @include('frontend.partials.faq')
    <!-- faq area end  -->
@endsection

@push('script')
@endpush
