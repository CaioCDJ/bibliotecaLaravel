<nav id="paginationNav">
  @if($paginator->hasPages())
  <ul class="pagination">

    {{--Anterior--}}
    @if($paginator->onFirstPage())
    <li class="page-item disabled">
      <span class="page-link">Previous</span>
    </li>

    @else
    <li class="page-item ">
      <a href="{{$paginator->previousPageUrl()}}" class="page-link">Previous</a>
    </li>

    @endif


    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
    {{-- "Three Dots" Separator --}}
    @if (is_string($element))
    <li class="page-item disabled" aria-current="page">
      <span class="page-link">{{$page}}</span>
    </li>

    @endif

    {{-- Array Of Links --}}
    @if (is_array($element))
    @foreach ($element as $page => $url)

    @if ($page == $paginator->currentPage())
    <li class="page-item active" aria-current="page">
      <span class="page-link">{{$page}}</span>
    </li>

    @else
    <li class="page-item" aria-current="page">
      <a href="{{$url}}" class="page-link">{{$page}}</a>
    </li>
    @endif

    @endforeach
    @endif

    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
    <li class="page-item">
      <a class="page-link" href="{{$paginator->nextPageUrl()}}">Next</a>
    </li>
    @else
    <li class="page-item disabled">
      <a class="page-link " href="{{$paginator->nextPageUrl()}}">Next</a>
    </li>
    @endif
  </ul>
  @endif

  </ul>
</nav>
