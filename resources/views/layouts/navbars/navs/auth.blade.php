<!-- Top navbar -->

<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href=""></a>
        <!-- Form -->

        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
            <li class="nav-item dropdown">
                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                                    @if (auth()->user()->avatar)
                                <img  src="/{{auth()->user()->avatar}}" class="rounded-circle">
                            @else
                                <img  src="{{asset('upload/noImage.png')}}" class="rounded-circle">

                            @endif                        </span>
                        <div class="media-body ml-1 d-none d-lg-block">
                            <span class="mb-0 text-sm  font-weight-bold">{{ auth()->user()->name }}</span>
                        </div>
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
                    <a href="{{route('setting.create')}}" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>تنظیمات</span>
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
    </div>
</nav>
