
@if ($paginator->hasPages())
<ul class="pager">

    @if ($paginator->onFirstPage())
        <li class="disabled"><span>← Previous</span></li>
    @else
        <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">Trước</a></li>
    @endif

    @if ($paginator->hasMorePages())
        <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">Tiếp</a></li>
    @else
        <li class="disabled"><span>Next →</span></li>
    @endif
</ul>
@endif
