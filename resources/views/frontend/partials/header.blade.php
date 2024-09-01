<header>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-3">
                <!-- logo  -->
                <a href="index.html" class="logo">
                    <img src="{{ asset('frontend') }}/assets/images/logo.svg" alt="">
                </a>
            </div>
            <div class="col-9">
                <div class="menu--wrapper">
                    <!-- menu  -->
                    <ul class="menu">
                        <li>
                            <a href="{{route('home')}}" class="active">Home</a>
                        </li>
                        <li>
                            <a href="listing.html">Car Listing</a>
                        </li>
                        <li>
                            <a href="{{route('about')}}">About Us</a>
                        </li>
                        <li>
                            <a href="{{route('faq')}}">FAQs</a>
                        </li>
                    </ul>
                    <!-- button area  -->
                    <div class="btn--area d-flex align-items-center gap-3">
                        <a href="{{route('login')}}" class="button">Log In</a>
                        <a href="{{route('register')}}" class="buttonv2">Register</a>
                    </div>
                </div>
                <!-- hamburger menu  -->
                <div class="hamburger-menu">
                    <span class="line-top"></span>
                    <span class="line-center"></span>
                    <span class="line-bottom"></span>
                </div>
            </div>
        </div>
    </div>
</header>
