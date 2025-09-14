<link rel="stylesheet" href="{{ asset('css/custom.css') }}">

@if ($paginator->hasPages())
    <ul class="Pagination">
        {{-- 前へ --}}
        @if ($paginator->onFirstPage())
            <li class="Pagination-Item disabled">
                <span class="Pagination-Item-Link">&laquo;</span>
            </li>
        @else
            <li class="Pagination-Item">
                <a class="Pagination-Item-Link" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                    <svg xmlns="http://www.w3.org/2000/svg" class="Pagination-Item-Link-Icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
                    </svg>
                </a>
            </li>
        @endif

        {{-- ページ番号 --}}
        @foreach ($elements as $element)
            {{-- "…" の省略記号 --}}
            @if (is_string($element))
                <li class="Pagination-Item disabled"><span>{{ $element }}</span></li>
            @endif

            {{-- 配列: ページリンク --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="Pagination-Item">
                            <a class="Pagination-Item-Link isActive" href="#"><span>{{ $page }}</span></a>
                        </li>
                    @else
                        <li class="Pagination-Item">
                            <a class="Pagination-Item-Link" href="{{ $url }}"><span>{{ $page }}</span></a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- 次へ --}}
        @if ($paginator->hasMorePages())
            <li class="Pagination-Item">
                <a class="Pagination-Item-Link" href="{{ $paginator->nextPageUrl() }}" rel="next">
                    <svg xmlns="http://www.w3.org/2000/svg" class="Pagination-Item-Link-Icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                    </svg>
                </a>
            </li>
        @else
            <li class="Pagination-Item disabled">
                <span class="Pagination-Item-Link">&raquo;</span>
            </li>
        @endif
    </ul>
@endif
