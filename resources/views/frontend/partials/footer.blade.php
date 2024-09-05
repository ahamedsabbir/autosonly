<footer>
    <div class="container">
        <div class="footer--row">
            <!-- footer--box  -->
            <div class="footer--box logo--box">
                <a href="index.html">
                    <img src="{{ App\Helper\Settings::get()->logo ? asset(App\Helper\Settings::get()->logo) : asset('default/logo.svg') }}" alt="">
                </a>
                <p>Our goal is to provide a wide selection of quality cars that are budget friendly.</p>
            </div>
            <!-- footer--box -->
            <div class="footer--box">
                <h4>Pages</h4>
                <ul>
                    @if (App\Models\Page::count() > 0)
                    @foreach (App\Models\Page::all() as $page)
                    <li>
                        <a href="{{ route('page', $page->slug) }}" class="@if (request()->routeIs('page')) active @endif">{{ $page->slug }}</a>
                    </li>
                    @endforeach
                    @endif
                </ul>
            </div>
            <!-- footer box  -->
            <div class="footer--box">
                <h4>Company</h4>
                <ul>
                    <li>
                        <a href="#">Careers</a>
                    </li>
                    <li>
                        <a href="#">News</a>
                    </li>
                    <li>
                        <a href="#">Author</a>
                    </li>
                    <li>
                        <a href="#">Product Page</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- footer box  -->
            <div class="footer--box contact">
                <h4>Any Questions?</h4>
                <ul>
                    <li>
                        <a href="mailto:@php echo App\Helper\Settings::get()->email @endphp">@php echo App\Helper\Settings::get()->email @endphp</a>
                    </li>
                    <li>
                        <p>
                            Feel free! Ask us anything related to our service
                        </p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="footer--bottom">
            <p>2024 Powered by Autos Only Rentals</p>
            <ul>
                <li>
                    <a href="#">Privacy Policy</a>
                </li>
                <li>
                    <a href="#">Website Terms</a>
                </li>
                <li>
                    <a href="#">Cookie Policy </a>
                </li>
            </ul>
        </div>
    </div>
</footer>