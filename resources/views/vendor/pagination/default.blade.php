@if ($paginator->hasPages())
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)

                {{-- Array Of Links --}}
                <ul class="pagination">
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <a class="page-numbers bg-border-color current"><span>{{$page}}</span></a>
                        @else
                        <a href="{{ $url }}" class="page-numbers bg-border-color" style="color: red"><span>{{$page}}</span></a>
                        @endif
                    @endforeach
                @endif
            @endforeach
                </ul>
            
@endif
