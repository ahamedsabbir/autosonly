@extends('frontend.app')

<!-- Start:Title -->
@section('title', 'Home')
<!-- End:Title -->

@push('css')
@endpush

@section('content')
    <!-- login area start  -->
    <section class="login--register--area rent--posi">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-10">
                    <div class="login--form user--profile--form">
                        <h1>Register</h1>
                        <form class="form--common" action="#">
                            <div class="input--group">
                                <label for="fname">Full Name</label>
                                <input type="text" id="fname" placeholder="eg. Jon Doe">
                            </div>
                            <div class="input--group">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" placeholder="eg. youremail@email.com">
                            </div>
                            <div class="input--group">
                                <label for="password">Password</label>
                                <input type="password" id="password" placeholder="**********">
                            </div>
                            <div class="input--group">
                                <label for="c-password">Confirm Password</label>
                                <input type="password" id="c-password" placeholder="**********">
                            </div>
                            <button type="submit" class="button">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <img class="rent-img rent-img1" src="{{ asset('frontend') }}/assets/images/rent.svg" alt="">
        <img class="rent-img rent-img2" src="{{ asset('frontend') }}/assets/images/rent.svg" alt="">
    </section>
    <!-- login area end  -->
@endsection

@push('js')
@endpush
