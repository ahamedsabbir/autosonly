<form class="filter--form" action="{{ route('search') }}" method="get">
    @csrf
    <div class="filter--box">
        <h3>Filter</h3>
        <div class="form-group available--car">
            <input type="checkbox" id="economy1" name="available" value="yes">
            <label for="economy1">
                <div class="filter--option">
                    <p>Show Available Cars Only</p>
                    <span>{{ App\Models\Car::where('available', 'yes')->count() }}</span>
                </div>
            </label>
        </div>
        <!-- Filter Accordion -->
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseType"
                        aria-expanded="true" onclick="event.preventDefault();">
                        Car type
                    </button>
                </h2>
                <div id="collapseType" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        @foreach (App\Models\Car::distinct('type')->pluck('type')->all() as $type)
                        <div class="form-group">
                            <input type="checkbox" id="type{{ $type }}" name="type" value="{{ $type }}">
                            <label for="type{{ $type }}">
                                <div class="filter--option">
                                    <p>{{ $type }}</p>
                                    <span>{{ App\Models\Car::where('type', $type)->count() }}</span>
                                </div>
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseLocations"
                        aria-expanded="false" onclick="event.preventDefault();">
                        Locations
                    </button>
                </h2>
                <div id="collapseLocations" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        @foreach (App\Models\Car::distinct('location')->pluck('location')->all() as $location)
                        <div class="form-group">
                            <input type="checkbox" id="economy2{{ $location }}" name="location" value="{{ $location }}">
                            <label for="economy2{{ $location }}">
                                <div class="filter--option">
                                    <p>{{ $location }}</p>
                                    <span>{{ App\Models\Car::where('location', $location)->count() }}</span>
                                </div>
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapsePrice"
                        aria-expanded="false" onclick="event.preventDefault();">
                        Price range
                    </button>
                </h2>
                <div id="collapsePrice" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                       @php
                            $min = App\Models\Car::min('rental_price_per_day');
                            $max = App\Models\Car::max('rental_price_per_day');
                        @endphp
                        @foreach (range($min, $max, 100) as $price)
                        <div class="form-group">
                            <input type="radio" id="price{{ $price }}" name="price" value="{{ $price }}">
                            <label for="price{{ $price }}">
                                <div class="filter--option">
                                    <p>${{ $price }} + ${{$price + 100}}</p>
                                    <span>{{ App\Models\Car::whereBetween('rental_price_per_day', [$price, $price + 100])->count() }}</span>
                                </div>
                            </label>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTransmission" aria-expanded="false" onclick="event.preventDefault();">
                        Transmission
                    </button>
                </h2>
                <div id="collapseTransmission" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        @foreach (App\Models\Car::distinct('transmission')->pluck('transmission')->all() as $transmission)
                        <div class="form-group">
                            <input type="checkbox" id="economy3{{ $transmission }}" name="transmission" value="{{ $transmission }}">
                            <label for="economy3{{ $transmission }}">
                                <div class="filter--option">
                                    <p>{{ $transmission }}</p>
                                    <span>{{ App\Models\Car::where('transmission', $transmission)->count() }}</span>
                                </div>
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseBags" aria-expanded="false">
                        Bags
                    </button>
                </h2>
                <div id="collapseBags" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        @foreach (App\Models\Car::distinct('bags')->pluck('bags')->all() as $bags)
                        <div class="form-group">
                            <input type="checkbox" id="economy4{{ $bags }}" name="bags" value="{{ $bags }}">
                            <label for="economy4{{ $bags }}">
                                <div class="filter--option">
                                    <p>{{ $bags }}</p>
                                    <span>{{ App\Models\Car::where('bags', $bags)->count() }}</span>
                                </div>
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseReview" aria-expanded="false" onclick="event.preventDefault();">
                        User Review
                    </button>
                </h2>
                <div id="collapseReview" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        @foreach (App\Models\Review::distinct('rating')->orderBy('rating', 'asc')->pluck('rating')->all() as $rating)
                        <div class="form-group">
                            <input type="checkbox" id="review{{ $rating }}" name="review" value="{{ $rating }}">
                            <label for="review{{ $rating }}">
                                <div class="filter--option">
                                    <p>{{ $rating }}</p>
                                    <span>{{ App\Models\Review::where('rating', $rating)->count() }}</span>
                                </div>
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="filter--btn--area">
            <button class="button btn-filter w-100 mt_45">Apply Filter</button>
        </div>
    </div>
</form>