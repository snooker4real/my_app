@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-center">
        <ul class="flex space-x-2">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="px-4 py-2 text-gray-400 bg-gray-200 rounded-md cursor-not-allowed">&larr;</li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" class="px-4 py-2 bg-white border border-gray-300 rounded-md hover:bg-gray-100">
                        &larr;
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="px-4 py-2 text-gray-400 bg-gray-200 rounded-md cursor-not-allowed">{{ $element }}</li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="px-4 py-2 text-white bg-blue-500 rounded-md">{{ $page }}</li>
                        @else
                            <li>
                                <a href="{{ $url }}" class="px-4 py-2 bg-white border border-gray-300 rounded-md hover:bg-gray-100">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" class="px-4 py-2 bg-white border border-gray-300 rounded-md hover:bg-gray-100">
                        &rarr;
                    </a>
                </li>
            @else
                <li class="px-4 py-2 text-gray-400 bg-gray-200 rounded-md cursor-not-allowed">&rarr;</li>
            @endif
        </ul>
    </nav>
@endif
