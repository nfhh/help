<div class="col-md-3">
    <div class="bg-white">
        <div class="list-group list-group-flush my-tab" id="tree">

        </div>
    </div>
</div>
<script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="/js/bstreeview.js"></script>
<script>
    var json = `<?php echo json_encode($categories, JSON_UNESCAPED_UNICODE);?>`;
    $('#tree').bstreeview({data: JSON.parse(json), openNodeLinkOnNewTab: false});
</script>
