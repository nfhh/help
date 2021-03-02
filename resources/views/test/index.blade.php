<form method="POST" action="/test" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="file">上传文章翻译表</label>
        <input type="file" class="form-control-file" id="file" name="file"
               accept="application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
    </div>
    <button type="submit" class="btn btn-primary">确定</button>
</form>
