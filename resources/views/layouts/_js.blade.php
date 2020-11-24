<script>
    function chLan(obj) {
        Cookies.set('lan', $(obj).data('lan'))
        location.reload()
    }
</script>
@if(config('app.env') === 'production')
    <script>
        window.$crisp=[];window.CRISP_WEBSITE_ID="244ab43a-eb0e-48dd-bd52-f2d95a33a3c9";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();
        // $crisp.push(["do", "helpdesk:search"])
    </script>
@endif
