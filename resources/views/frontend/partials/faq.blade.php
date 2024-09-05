<section class="faq--area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="faq--contents">
                    <h3>Frequently <span>Asked Questions</span></h3>
                    <div class="accordion" id="accordionExample">
                        <!-- item  -->
                        @if (App\Models\Faq::count() > 0)
                        @foreach (App\Models\Faq::all() as $page)
                        <div class="accordion-item active">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne{{ $loop->iteration }}" aria-expanded="{{$loop->first ? 'true' : 'false'}}" aria-controls="collapseOne{{ $loop->iteration }}">
                                    Q. {{ $page->title }}
                                </button>
                            </h2>
                            <div id="collapseOne{{ $loop->iteration }}" class="accordion-collapse collapse {{$loop->first ? 'show' : ''}}"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>A.</p>
                                    <p>{{ $page->description }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        <!-- item  -->
                    </div>
                    <div class="btn--area text-center">
                        <a href="#" class="button">Load More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>