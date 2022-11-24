 @php
     $max = 7;
     $delta = 2;
     $string = '...';
     if($max <= 2*$delta + 3) $delta--;
@endphp
@if($paginator->hasPages())
    <ul class="pagination d-flex align-items-center">
        {{--не нужны троеточия--}}
        @if($paginator->lastPage() <= $max)
            @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                <li class="pagination-page">
                    <a href="{{ $paginator->url($i) }}"
                       wire:click.prevent="gotoPage('{{$i}}')"
                       class="pagination-page_link d-flex align-items-center justify-content-center"
                       data-current="{{ $paginator->currentPage() == $i ? 'true' : 'false' }}"
                    >{{ $i }}</a>
                </li>
            @endfor
       {{--нужны троеточия--}}
        @else
             {{--текущий в начале--}}
            @if($paginator->currentPage() <= $delta + 2)
               @for ($i = 1; $i <= $max - 2; $i++)
                   <li class="pagination-page">
                       <a
                               href="{{ $paginator->url($i) }}"
                          wire:click.prevent="setPage('{{$i}}')"
                          class="pagination-page_link d-flex align-items-center justify-content-center"
                          data-current="{{ $paginator->currentPage() == $i ? 'true' : 'false' }}"
                       >{{ $i }}</a>
                   </li>
               @endfor
                   <span>{{$string}}</span>
                   <li class="pagination-page">
                       <a class="pagination-page_link d-flex align-items-center justify-content-center"
                          wire:click.prevent="gotoPage('{{$paginator->lastPage()}}')"
                          href="{{ $paginator->url($paginator->lastPage()) }}"
                          data-current="{{ $paginator->currentPage() == $paginator->lastPage() ? 'true' : 'false' }}"
                       >{{$paginator->lastPage()}}</a>
                   </li>
            {{--текущий не в начале--}}
            {{--текущий в конце--}}
            @elseif ($paginator->currentPage() > $paginator->lastPage() - $delta - 2)
                <li class="pagination-page">
                    <a
                            class="pagination-page_link d-flex align-items-center justify-content-center"
                            wire:click.prevent="gotoPage('1')"
                            href="{{$paginator->url(1)}}"
                            data-current="false"
                    >1</a
                    >
                </li>
                <span>{{$string}}</span>
                @for ($i = $paginator->lastPage() - $max + 3; $i <= $paginator->lastPage() ; $i++)
                    <li class="pagination-page">
                        <a
                                href="{{ $paginator->url($i) }}"
                           wire:click.prevent="gotoPage('{{$i}}')"
                           class="pagination-page_link d-flex align-items-center justify-content-center"
                           data-current="{{ $paginator->currentPage() == $i ? 'true' : 'false' }}"
                        >{{ $i }}</a>
                    </li>
                @endfor
             {{--текущий не в конце и не в начале--}}
            @else
                <li class="pagination-page">
                    <a
                            class="pagination-page_link d-flex align-items-center justify-content-center"
                            wire:click.prevent="gotoPage('1')"
                            href="{{$paginator->url(1)}}"
                            data-current="false"
                    >1</a
                    >
                </li>
                <span>{{$string}}</span>
                @for ($i = $paginator->currentPage() - $delta; $i <= $paginator->currentPage() + $delta; $i++)
                    <li class="pagination-page">
                        <a
                                href="{{ $paginator->url($i) }}"
                           wire:click.prevent="gotoPage('{{$i}}')"
                           class="pagination-page_link d-flex align-items-center justify-content-center"
                           data-current="{{ $paginator->currentPage() == $i ? 'true' : 'false' }}"
                        >{{ $i }}</a>
                    </li>
                @endfor
                <span>{{$string}}</span>
                <li class="pagination-page">
                    <a class="pagination-page_link d-flex align-items-center justify-content-center"
                       wire:click.prevent="gotoPage('{{$paginator->lastPage()}}')"
                       href="{{ $paginator->url($paginator->lastPage()) }}"
                       data-current="{{ $paginator->currentPage() == $paginator->lastPage() ? 'true' : 'false' }}"
                    >{{$paginator->lastPage()}}</a>
                </li>
            @endif
        @endif
    </ul>
@endif