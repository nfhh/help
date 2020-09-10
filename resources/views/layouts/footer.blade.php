<footer class="footer bg-dark p-3 text-light text-center">
    <p class="m-1">Copyright©{{ date('Y') }} TerraMaster All Rights Reserved.</p>
</footer>
<script>
    function chLan(obj) {
        Cookies.set('lan', $(obj).data('lan'))
        location.reload()
    }
</script>
