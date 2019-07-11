<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
                aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->

        <a style="margin: 0 auto" href="{{ route('home') }}">
{{--            <img  src="{{ asset('main_icon.png') }}" width="128px" height="128px" class="shadow-sm" alt="...">--}}
            <h1>فروشگاه هدهد</h1>
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                           @if (auth()->user()->avatar)
                                <img src="/{{auth()->user()->avatar}}" class="rounded-circle shadow-sm">
                            @else
                                <img src="{{asset('upload/noImage.png')}}" class="rounded-circle shadow-sm">

                            @endif
                        </span>
                    </div>
                </a>


                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">خوش آمدید</h6>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>پروفایل من</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>تنظیمات</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>پشتیبانی</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>خروج</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            فروشگاه هدهد
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse"
                                data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                                aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended"
                           placeholder="جستجو" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="ni ni-archive-2 text-primary"></i> داشبورد
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.edit') }}">
                        <i class="ni ni-single-02 text-yellow"></i> پروفایل من
                    </a>
                </li>
                @can('create-user')

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.index') }}">
                        <i class="ni ni-satisfied text-red"></i> مدیریت کاربران
                    </a>
                </li>
                @endcan

            @can('create-product')

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('product.index') }}">
                            <i class="ni ni-basket text-blue"></i> مدیریت محصولات
                        </a>
                    </li>
                @endcan

                @can('show-order')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('order.index') }}">
                            <i class="ni ni-delivery-fast text-blue"></i>سفارشات
                        </a>
                    </li>
                @endcan
                @can('show-map')

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('map.index') }}">
                        <i class="ni ni-square-pin text-blue"></i>نقشه سفارشات
                    </a>
                </li>
                @endcan

            @can('create-category')

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('category.index') }}">
                            <i class="ni ni-align-left-2 text-pink"></i> مدیریت دسته بندی ها
                        </a>
                    </li>
                @endcan

                @can('create-article')

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('article.index') }}">
                            <i class="ni ni-single-copy-04 text-orange"></i> مدیریت مقالات
                        </a>
                    </li>
                @endcan

                @can('create-slider')

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('slider.index') }}">
                            <i class="ni ni-album-2 text-info"></i> مدیریت اسلاید ها
                        </a>
                    </li>
                @endcan

                @can('create-banner')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('banner.index') }}">
                            <i class="ni ni-image text-info"></i> مدیریت بنر ها
                        </a>
                    </li>
                @endcan

                @can('create-discount')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('discount.index') }}">
                            <i class="ni ni-spaceship text-blue"></i>مدیریت تخفیف ها
                        </a>
                    </li>
                @endcan

{{--                @can('create-slider')--}}

{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="{{ route('media.index') }}">--}}
{{--                            <i class="ni ni-album-2 text-info"></i> مدیریت رسانه ها--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                @endcan--}}

            </ul>
            <!-- Divider -->
            <hr class="my-3">
            <!-- Heading -->
            <h6 class="navbar-heading text-muted">امکانات</h6>
            <!-- Navigation -->
            <ul class="navbar-nav mb-md-3">
                @can('create-color')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('color.index') }}">
                        <i class="ni ni-palette"></i> رنگ ها
                    </a>
                </li>
                @endcan
                    @can('create-brand')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('brand.index') }}">
                        <i class="ni ni-world"></i> برند ها
                    </a>
                </li>
                    @endcan
                    @can('create-design')

                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('design.index') }}">
                        <i class="ni ni-paper-diploma"></i> طرح ها
                    </a>
                </li>
                    @endcan
                    @can('create-size')

                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('size.index') }}">
                        <i class="ni ni-ruler-pencil"></i> سایز ها
                    </a>
                </li>
                    @endcan

            </ul>
            <!-- Divider -->
            <hr class="my-3">
            <!-- Heading -->
            <h6 class="navbar-heading text-muted">تنظیمات</h6>
            <!-- Navigation -->
            <ul class="navbar-nav mb-md-3">
                @can('create-setting')

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('setting.create') }}">
                            <i class="ni ni-settings text-info"></i> تنظیمات پنل
                        </a>
                    </li>
                @endcan
                    @can('create-setting')

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('social.index') }}">
                                <i class="ni ni-send text-info"></i>شبکه های اجتماعی
                            </a>
                        </li>
                    @endcan
                @can('create-province')

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('province.index') }}">
                            <i class="ni ni-delivery-fast text-info"></i>هزینه حمل ونقل
                        </a>
                    </li>
                @endcan

                @can('create-qas')

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('qas.index') }}">
                            <i class="ni ni-active-40 text-info"></i>سوالات متداول
                        </a>
                    </li>
                @endcan

                @can('create-ticket')

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ticket.index') }}">
                            <i class="ni ni-notification-70 text-info"></i>تیکت ها
                        </a>
                    </li>
                @endcan
            </ul>
        </div>
    </div>
</nav>
