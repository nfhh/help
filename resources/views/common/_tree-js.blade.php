@section('js')
    <script src="/js/bstreeview.js"></script>
    <script>
        var json = `<?php echo json_encode($fenlei, JSON_UNESCAPED_UNICODE);?>`;
        console.log(JSON.parse(json))
        $('#tree').bstreeview({
            data: JSON.parse(json),
            openNodeLinkOnNewTab: false
        });
    </script>
@endsection
