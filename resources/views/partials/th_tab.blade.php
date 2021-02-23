<div class="row">
    <div class="col-md-12">
        <nav class="nav nav-pills border-bottom-1 my-tab" id="n-box">
            <a href="/faqs/tnas-faqs"
               class="nav-item nav-link text-dark">{{ trans('help.tnas_faq') }}</a>
            <a href="/faqs/tdas-faqs"
               class="nav-item nav-link text-dark">{{ trans('help.tdas_faq') }}</a>
            <a href="/toshelp" class="nav-item nav-link text-dark d-none">{{ trans('help.tos_help') }}</a>
        </nav>
    </div>
</div>
<script>
    let pathname = location.pathname;
    $('#n-box a').each(function () {
        let href = $(this).attr('href');
        if (href.includes(pathname) || pathname.includes(href.substr(0, href.length - 1))) {
            $(this).addClass('active');
        }
    });
</script>
