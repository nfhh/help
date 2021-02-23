<nav class="navbar navbar-expand-lg fixed-top navbar-light my-bg p-0">
    <div class="container">
        <a class="navbar-brand" target="_blank" href="https://www.terra-master.com">
            <img src="https://img.terra-master.com/skin/frontend/base/default/images/Terramaster_logo.svg"
                 width="90" alt="" loading="lazy">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown nav-hover">
                    <a class="nav-link dropdown-toggle" href="https://www.terra-master.com/{{$urllans[$lan]}}/products.html" role="button" data-toggle="dropdown">
                        <span class="my-text-dark h5 font-weight-bold">{{ trans('help.product') }}</span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item py-2" href="https://www.terra-master.com/{{$urllans[$lan]}}/products/homesoho-nas.html">{{ trans('help.home_soho') }}</a>
                        <a class="dropdown-item py-2" href="https://www.terra-master.com/{{$urllans[$lan]}}/products/smallmedium-businesses-nas.html">{{ trans('help.small_biz') }}</a>
                        <a class="dropdown-item py-2" href="https://www.terra-master.com/{{$urllans[$lan]}}/products/enterprise-network-storage-server.html">{{ trans('help.company_nas') }}</a>
                        <a class="dropdown-item py-2" href="https://www.terra-master.com/{{$urllans[$lan]}}/products/homesoho-das.html">{{ trans('help.home_soho_das') }}</a>
                        <a class="dropdown-item py-2" href="https://www.terra-master.com/{{$urllans[$lan]}}/products/video-professional-das.html">{{ trans('help.video_das') }}</a>
                        <a class="dropdown-item py-2" href="https://www.terra-master.com/{{$urllans[$lan]}}/products/accessories.html">{{ trans('help.accessories') }}</a>
                    </div>
                </li>
                <li class="nav-item dropdown nav-hover">
                    <a class="nav-link dropdown-toggle" href="https://www.terra-master.com/{{$urllans[$lan]}}/support/" role="button" data-toggle="dropdown">
                        <span class="my-text-dark h5 font-weight-bold">{{ trans('help.support') }}</span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item py-2" href="/quickguide">{{ trans('help.quick_install') }}</a>
                        <a class="dropdown-item py-2" href="https://www.terra-master.com/{{$urllans[$lan]}}/video-guide/">{{ trans('help.video_guide') }}</a>
                        <a class="dropdown-item py-2 d-none" href="/toshelp">{{ trans('help.tos_help') }}</a>
                        <a class="dropdown-item py-2" href="/faqs/tnas-faqs">{{ trans('help.faq') }}</a>
                        <a class="dropdown-item py-2" href="/download">{{ trans('help.download') }}</a>
                        <a class="dropdown-item py-2" href="https://www.terra-master.com/{{$urllans[$lan]}}/compatibility/">{{ trans('help.compatibility') }}</a>
                        <a class="dropdown-item py-2" href="https://www.terra-master.com/{{$urllans[$lan]}}/warranty/">{{ trans('help.reg_product') }}</a>
                        <a class="dropdown-item py-2" href="https://forum.terra-master.com/{{$urllans[$lan]}}/">{{ trans('help.forum') }}</a>
                    </div>
                </li>
                <li class="nav-item dropdown nav-hover">
                    <a class="nav-link dropdown-toggle" href="javascript:;" role="button" data-toggle="dropdown">
                        <span class="my-text-dark h5 font-weight-bold">{{ trans('help.about_us') }}</span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item py-2" href="https://www.terra-master.com/{{$urllans[$lan]}}/about/">{{ trans('help.about_terra_master') }}</a>
                        <a class="dropdown-item py-2" href="https://www.terra-master.com/{{$urllans[$lan]}}/press/">{{ trans('help.press') }}</a>
                        <a class="dropdown-item py-2" href="https://www.terra-master.com/{{$urllans[$lan]}}/awards/">{{ trans('help.tos_awards') }}</a>
                        <a class="dropdown-item py-2" href="https://www.terra-master.com/{{$urllans[$lan]}}/case/">{{ trans('help.case') }}</a>
                        <a class="dropdown-item py-2" href="https://www.terra-master.com/{{$urllans[$lan]}}/reseller/">{{ trans('help.how_buy') }}</a>
                        <a class="dropdown-item py-2" href="https://www.terra-master.com/{{$urllans[$lan]}}/contact-us/">{{ trans('help.contact_us') }}</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="https://forum.terra-master.com/" class="nav-link" target="_blank">
                        <span class="my-text-dark h5 font-weight-bold">{{ trans('help.forum') }}</span>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link my-text-dark" href="#" data-target="#lanModal" data-toggle="modal">
                        {{$lans[$lan]}}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
