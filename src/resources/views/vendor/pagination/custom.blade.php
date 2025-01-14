@if ($paginator->hasPages())
<nav class=pagination-nav>
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <li class="pagination__item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
            <span class="pagination__arrow" aria-hidden="true">&lsaquo;</span>
        </li>
        @else
        <li class="pagination__item">
            <a class="pagination__link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                <span class="pagination__arrow">&lsaquo;</span>
            </a>
        </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <li class="pagination__item disabled" aria-disabled="true"><span>{{ $element }}</span></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page <= 5)
        @if ($page == $paginator->currentPage())
        <li class="pagination__item active" aria-current="page"><span class="pagination__number">{{ $page }}</span></li> 
        @else <li class="pagination__item"><a class="pagination__link" href="{{ $url }}"><span class="pagination__number">{{ $page }}</span></a></li> 
        @endif
        @endif
        @endforeach
        @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li class="pagination__item">
            <a class="pagination__link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                <span class="pagination__arrow">&rsaquo;</span>
            </a>
        </li>
        @else
        <li class="pagination__item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
            <span class="pagination__arrow" aria-hidden="true">&rsaquo;</span>
        </li>
        @endif
    </ul>
</nav>
@endif
