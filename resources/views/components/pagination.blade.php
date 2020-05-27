<nav class="mt-4 mr-4 pb-2">
    <ul class="pagination justify-content-center">
        <li class="page-item{{ $page_num == 1 ? ' disabled' : '' }}">
            <a class="page-link" href="{{ $link }}{{ $page_num > 1 ? 'p=' . ($page_num - 1) : '' }}">
                <i class="fas fa-chevron-left"></i>
            </a>
        </li>
        <li class="page-item{{ $total_page <= 1 ? ' disabled' : '' }}">
            <a class="page-link" href="{{ $link }}{{ $total_page > 1 ? 'p=' . ($page_num + 1) : '' }}">
                <i class="fas fa-chevron-right"></i>
            </a>
        </li>
    </ul>
</nav>
