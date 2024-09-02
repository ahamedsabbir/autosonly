@extends('frontend.app')

<!-- Start:Title -->
@section('title', 'Home')
<!-- End:Title -->

@push('css')
@endpush

@section('content')
    <!-- about hero area start  -->
    <section class="about--hero--area rent--posi">
        <div class="container">
            <div class="row">
                <div class="col-xxl-5 col-lg-6 mt_30">
                    <!-- about--hero--text  -->
                    <div class="about--hero--text">
                        <h1>About Us</h1>
                        <p>Our management has over 30+ years of experience maintaining and operating Autos Only Burien, an
                            independent dealership. </p>
                        <p class="mt_20">We believe this experience will translate into our ability to provide a wide
                            selection of quality cars that are budget friendly. </p>
                        <p class="mt_20">We hand select our rentals from our dealership inventory, and use the dealership
                            reconditioning process to maintain our fleet. This creates a higher level of customer
                            satisfaction and repeat business.</p>
                    </div>
                </div>
                <div class="col-xxl-7 col-lg-6 mt_30">
                    <div class="img--area">
                        <img class="w-100" src="{{ asset('frontend') }}/assets/images/about-hero.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <img class="rent-img rent-img1" src="{{ asset('frontend') }}assets/images/rent.svg" alt="">
        <img class="rent-img rent-img2" src="{{ asset('frontend') }}assets/images/rent.svg" alt="">
    </section>
    <!-- about hero area end  -->
    <!-- steps area start  -->
    @include('frontend.partials.steps')
    <!-- steps area end  -->
    <!-- contact area start -->
    @include('frontend.partials.contact')
    <!-- contact area end -->
@endsection

@push('js')
@endpush
