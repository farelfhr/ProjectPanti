@if ($paginator->hasPages())
    <div class="flex flex-wrap justify-center mt-8 gap-2 sm:space-x-2">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="px-4 py-2 rounded-full font-bold border border-[#ccc] text-gray-400 cursor-default">&laquo;</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}#artikel" class="px-4 py-2 rounded-full font-bold border border-[#41644A] hover:bg-[#E9762B] hover:text-white transition duration-300 ease-in-out transform hover:scale-105">&laquo;</a>
        @endif

        {{-- Dynamic Page Number --}}
        @php
            $current = $paginator->currentPage();
            $last = $paginator->lastPage();

            $start = max(1, $current - 2); // awal selalu current
            $end = min($last, $current + 2); // tampilkan 3 angka mulai dari current

            // Edge case: jika current sudah mendekati akhir
            if ($last - $current < 2) {
                $start = max(1, $last - 2);
                $end = $last;
            }
        @endphp

        {{-- Numbered Pages --}}
        @for ($i = $start; $i <= $end; $i++)
            @if ($i == $current)
                <span class="px-4 py-2 rounded-full font-bold border border-[#41644A] bg-[#E9762B] text-white">{{ $i }}</span>
            @else
                <a href="{{ $paginator->url($i) }}#artikel" class="px-4 py-2 rounded-full font-bold border border-[#41644A] hover:bg-[#E9762B] hover:text-white transition duration-300 ease-in-out transform hover:scale-105">{{ $i }}</a>
            @endif
        @endfor

        {{-- Dots and Last Page --}}
        @if ($end < $last - 1)
            <span class="px-4 py-2">...</span>
        @endif

        @if ($end < $last)
            <a href="{{ $paginator->url($last) }}#artikel" class="px-4 py-2 rounded-full font-bold border border-[#41644A] hover:bg-[#E9762B] hover:text-white transition duration-300 ease-in-out transform hover:scale-105">{{ $last }}</a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}#artikel" class="px-4 py-2 rounded-full font-bold border border-[#41644A] hover:bg-[#E9762B] hover:text-white transition duration-300 ease-in-out transform hover:scale-105">&raquo;</a>
        @else
            <span class="px-4 py-2 rounded-full font-bold border border-[#ccc] text-gray-400 cursor-default">&raquo;</span>
        @endif
    </div>
@endif
