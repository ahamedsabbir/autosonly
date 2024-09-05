<header>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-3">
                <!-- logo  -->
                <a href="index.html" class="logo">
                    <img src="{{ App\Helper\Settings::get()->logo ? asset(App\Helper\Settings::get()->logo) : asset('default/logo.svg') }}" alt="">
                </a>
            </div>
            <div class="col-9">
                <div class="menu--wrapper">
                    <!-- menu  -->
                    <ul class="menu">
                        <li>
                            <a href="{{ route('home') }}" class="@if (request()->routeIs('home')) active @endif">Home</a>
                        </li>
                        <li>
                            <a href="{{ url('cars') }}">Car Listing</a>
                        </li>
                        <li>
                            <a href="{{ route('about') }}">About Us</a>
                        </li>
                        <li>
                            <a href="{{ route('faq') }}" class="@if (request()->routeIs('faq')) active @endif">FAQs</a>
                        </li>
                    </ul>
                    <!-- button area  -->
                    @auth
                    <div class="btn--area d-flex align-items-center gap-3">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="button" type="submit">Log Out</button>
                        </form>
                        <a href="{{ route('profile.edit') }}" class="buttonv2">Profile</a>
                    </div>
                    @else
                    <div class="btn--area d-flex align-items-center gap-3">
                        <a href="{{ route('login') }}" class="button">Log In</a>
                        <a href="{{ route('register') }}" class="buttonv2">Register</a>
                    </div>
                    @endauth
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