@extends('frontend.app')

<!-- Start:Title -->
@section('title', 'Home')
<!-- End:Title -->

@push('css')
@endpush

@section('content')
<!-- rent heo area start -->
<section class="rent--hero--area rent--posi">
    <div class="rent--img">
        <h1>Find The Perfect <span>Car For Renting</span></h1>
        <img src="{{ asset('frontend') }}/assets/images/listing.png" alt="">
    </div>
    <div class="container">
        <!-- car search  -->
        <div class="car--search--wrapper">
            <form action="#">
                <!-- input group  -->
                <div class="input--group">
                    <label for="to">Where To</label>
                    <input type="text" id="to" placeholder="Gulsan,Avenu">
                </div>
                <!-- input group  -->
                <div class="input--group">
                    <label for="from">Pick Up From</label>
                    <input type="text" id="from" placeholder="Gulsan,Avenu">
                </div>
                <!-- input group  -->
                <div class="input--group">
                    <h4>Pick Up Date & Time</h4>
                    <div class="date--time">
                        <div class="date">
                            <input type="text" id="date1" class="pick--date" placeholder="1/3/2024" readonly>
                        </div>
                        <div class="time">
                            <input type="text" id="time1" class="timepick" placeholder="10:00 AM" readonly>
                        </div>
                    </div>
                </div>
                <!-- input group  -->
                <div class="input--group last">
                    <h4>Drop Off Date & Time</h4>
                    <div class="date--time">
                        <div class="date">
                            <input type="text" id="date2" class="pick--date" placeholder="1/3/2024" readonly>
                        </div>
                        <div class="time">
                            <input type="text" id="time2" class="timepick" placeholder="10:00 AM" readonly>
                        </div>
                    </div>
                </div>
                <div class="submit--btn">
                    <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                            <path d="M10.9406 2.43151C8.55612 2.43551 6.27046 3.38451 4.58438 5.07058C2.89831 6.75666 1.94931 9.04232 1.94531 11.4268C1.94731 13.8133 2.89518 16.1016 4.58125 17.7906C6.26733 19.4795 8.55412 20.4312 10.9406 20.4372C13.0571 20.4372 15.0074 19.6926 16.5494 18.4605L20.2949 22.206C20.4847 22.3824 20.7354 22.4785 20.9945 22.4739C21.2535 22.4694 21.5007 22.3646 21.6842 22.1817C21.8677 21.9987 21.9731 21.7518 21.9783 21.4927C21.9835 21.2337 21.8882 20.9827 21.7122 20.7925L17.9667 17.0432C19.2459 15.4522 19.9433 13.472 19.9434 11.4306C19.9434 6.47183 15.8993 2.43151 10.9406 2.43151ZM10.9406 4.43466C14.8184 4.43466 17.9403 7.55277 17.9403 11.4268C17.9403 15.3008 14.8184 18.4378 10.9406 18.4378C7.06279 18.4378 3.94468 15.3121 3.94468 11.4343C3.94468 7.55655 7.06279 4.43466 10.9406 4.43466Z" fill="white" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <img class="rent-img rent-img1" src="{{ asset('frontend') }}/assets/images/rent.svg" alt="">
    <img class="rent-img rent-img2" src="{{ asset('frontend') }}/assets/images/rent.svg" alt="">
</section>
<!-- rent heo area end -->
<!-- car filter area end -->
<div class="car--filter--area section--shape">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mt_50 pr_10">
                <!-- Left Filter Box -->
                @include('frontend.partials.aside')
            </div>
            <div class="col-lg-8 mt_30">
                <!-- filter Carbox -->
                <div class="filter--carbox--area">
                    @include('frontend.partials.products')
                </div>
                <!-- pagenation -->
                {{ $cars->links('vendor.pagination.default') }}
            </div>
        </div>
    </div>
    <!-- car filter area end  -->
    <!-- steps area start  -->
    @include('frontend.partials.steps')
    <!-- steps area end  -->
    <!-- testimonial area start  -->
    @include('frontend.partials.testimonial')
    <!-- testimonial area end  -->
    @endsection

    @push('js')
    <script>
        $(document).ready(function() {
            //
        });
    </script>
    @endpush