<div class="row">
    <div class="col-md-12">
        <nav class="nav nav-pills border-bottom-1 my-tab" id="n-box">
            <a href="/faq?subject_id=1"
               class="nav-item nav-link text-dark @if($parent_id === 1) active @endif">TNAS {{ trans('help.faq') }}</a>
            <a href="/faq?subject_id=2"
               class="nav-item nav-link text-dark @if($parent_id === 2) active @endif">DAS {{ trans('help.faq') }}</a>
            <a href="/toshelp?category_id=2" class="nav-item nav-link text-dark @if($parent_id === 'tos_help') active @endif">TOS {{ trans('help.help') }}</a>
        </nav>
    </div>
</div>
