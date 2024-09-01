@extends('frontend.app')

<!-- Start:Title -->
@section('title', 'Home')
<!-- End:Title -->

@push('css')
    <style>
        .faq--area {
            padding: 200px 0 106px;
        }
    </style>
@endpush

@section('content')
        <!-- faq area start -->
        @include('frontend.partials.faq')
        <!-- faq area end  -->
@endsection

@push('js')
@endpush
