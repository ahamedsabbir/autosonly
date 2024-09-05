@if ($paginator->hasPages())
<nav>
    <ul class="filter--pagination text-center justify-content-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <li class="prev" aria-disabled="true" aria-label="@lang('pagination.previous')">
        @else
        <li class="prev" aria-disabled="true" aria-label="@lang('pagination.previous')">
            <a href="{{ $paginator->previousPageUrl() }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none">
                    <path
                        d="M15.0938 19.9201L8.57375 13.4001C7.80375 12.6301 7.80375 11.3701 8.57375 10.6001L15.0938 4.08008"
                        stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </a>
        </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li>
            <a href="{{ $url }}" class="links active">{{ $page }}</a>
        </li>
        @else
        <li><a href="{{ $url }}" class="links">{{ $page }}</a></li>
        @endif
        @endforeach
        @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li class="next" aria-disabled="true" aria-label="@lang('pagination.next')">
            <a href="{{ $paginator->nextPageUrl() }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none">
                    <path
                        d="M8.90625 19.9201L15.4263 13.4001C16.1963 12.6301 16.1963 11.3701 15.4263 10.6001L8.90625 4.08008"
                        stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </a>
        </li>
        @else
        <li class="next" aria-disabled="true" aria-label="@lang('pagination.next')">
        @endif
    </ul>
</nav>
@endif