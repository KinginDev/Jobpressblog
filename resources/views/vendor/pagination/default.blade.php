@if ($paginator->hasPages())
  <div class="clearfix">


    <div class="jobpress-custom-pager list-unstyled flex space-between no-column items-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
                <a class="disabled" style="pointer-events: none;" title="Disabled Link"> <li class="button"><i style="margin-right: 5px;" class="ion-ios-arrow-right"></i>Prev</li></a>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" class="button" rel="prev"><i class="ion-ios-arrow-left"></i>Prev</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            <ul class="list-unstyled flex no-column items-center">
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="link-active"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
          </ul>
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" class="button" rel="next"><i class="ion-ios-arrow-left"></i>Next</a></li>
        @else
          <a class="disabled" style="pointer-events: none;" title="Disabled Link"> <li class="button">Next <i style="margin-left: 5px;" class="ion-ios-arrow-right"></i></li></a>

        @endif
    </div>
      </div>
@endif
<style media="screen">
  a .disabled:hover{
    background:red;

  }
  .link-active{
    color: black;
    pointer-events: none;
  }
</style>
