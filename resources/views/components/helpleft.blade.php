@php
    function replaceKey($data,$lan)
    {
        $arr1 = [];
        foreach ($data as $key => $val) {
            if (is_array($val)) {
                if(empty($val)){
                    continue;
                }
                $val = replaceKey($val,$lan);
            }
            if ($key === $lan) {
                $arr1['text'] = $val;
                $arr1['href'] = $data['id'];
            } else {
                $arr1[$key] = $val;
            }
        }
        return $arr1;
    }
        $categories = replaceKey($categories,$lan);
@endphp
<div class="list-group list-group-flush my-tab" id="tree"></div>
<script>
    var json = `<?php echo json_encode($categories, JSON_UNESCAPED_UNICODE);?>`;
    $('#tree').bstreeview({data: JSON.parse(json), openNodeLinkOnNewTab: false});
</script>
