<div class="modal fade" id="lanModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="container-fluid">
                    <div class="row py-3">
                        <div class="col-md-12 d-flex">
                            <img src="https://img.terra-master.com/media/qyyy.svg" width="30" height="30">
                            <h3 class="pl-2">{{ trans('help.region_language') }}</h3>
                        </div>
                        @foreach($lans as $k=>$v)
                            <div class="col-md-4">
                                <a class="text-dark d-block py-2" href="javascript:;" onclick="chLan(this)"
                                   data-lan="{{ $k }}">{{ $v }}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
