<div class="row py-5">
    <div class="col-md-12">
        <h2>{{ trans('help.help_doc') }}</h2>
        <p class="text-muted">{{ trans('help.search_tip') }}</p>
    </div>
    <div class="col-md-12">
        <form action="/search">
            <div class="form-group">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="tb1" name="tb" class="custom-control-input" value="faqs|1" checked>
                    <label class="custom-control-label" for="tb1">TNAS {{ trans('help.faq') }}</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="tb2" name="tb" class="custom-control-input" value="faqs|2" @if(request()->query('tb')==='faqs|2') checked @endif>
                    <label class="custom-control-label" for="tb2">DAS {{ trans('help.faq') }}</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="tb3" name="tb" class="custom-control-input" value="articles" @if(request()->query('tb')==='articles') checked @endif>
                    <label class="custom-control-label" for="tb3">TOS {{ trans('help.help') }}</label>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <div class="input-group">
                        <input type="text" class="form-control" name="kw">
                        <div class="input-group-append">
                            <button type="submit" class="input-group-text bg-transparent"><i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
