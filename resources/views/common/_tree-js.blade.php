@section('js')
    <script src="/js/bstreeview.js"></script>
    <script>
        var json = `<?php echo json_encode($fenlei, JSON_UNESCAPED_UNICODE);?>`;
        $('#tree').bstreeview({data: json});

        let pathname2 = location.pathname;
        $('#tree a').each(function () {
            let href = $(this).attr('href');
            if (href === pathname2 || pathname2.includes(href)) {
                $(this).parent().addClass('active');
                $(this).parent().parent().addClass('show');
                $(this).parent().parent().prev().find('i').attr("class", "state-icon fa-angle-down fa");
            }
        });
    </script>
@endsection
