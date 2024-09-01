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
                        <h1>Log In</h1>
                        <form class="form--common" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="input--group">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" placeholder="eg. youremail@email.com" value="{{ old('email') }}" name="email">
                            </div>
                            <div class="input--group">
                                <label for="password">Password</label>
                                <input type="password" id="password" placeholder="**********" name="password">
                            </div>
                            <button type="submit" class="button">Log In</button>
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
