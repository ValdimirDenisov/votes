@if ($paginator->hasPages())
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            @if ($paginator->onFirstPage())    
                <li class="page-item disabled">
                    <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">В начало</span>
                    <span class="sr-only">Previous</span>
                    </a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->url(1) }}" aria-label="Previous">
                    <span aria-hidden="true">В начало</span>
                    <span class="sr-only">Previous</span>
                    </a>
                </li>
            @endif
            @if ($paginator->onFirstPage())    
                <li class="page-item disabled">
                    <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                    </a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                    </a>
                </li>
            @endif
            @foreach ($elements as $element)
                @if (is_string($element))        
                    <li class="disabled page-item"><span class="page-link">{{ $element }}</span></li>
                @endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())        
                            <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                        @else    
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach
            @if ($paginator->hasMorePages())      
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-label="Previous">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Previous</span>
                    </a>
                </li>  
            @else
                <li class="page-item disabled">
                    <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Previous</span>
                    </a>
                </li>
            @endif

            @if ($paginator->hasMorePages())      
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}" aria-label="Previous">
                    <span aria-hidden="true">в конец</span>
                    <span class="sr-only">Previous</span>
                    </a>
                </li>  
            @else
                <li class="page-item disabled">
                    <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">в конец</span>
                    <span class="sr-only">Previous</span>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
@endif