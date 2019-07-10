@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    @include('layouts.headers.guest')

    <div class="container mt--8 pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5">

                        <div class="card rtl text-right">
                            <div class="card-img text-center text-muted my-3">
                                <img style="width: 128px;height: 128px;" class="img-circle" src="{{asset('main_icon.png')}}" alt="">

                            </div>
                            <div class=" card card-header text-center">
                                <small class="btn btn-sm btn-info lead">فعال سازی حساب کاربری</small>

                            </div>
                            @if (session('resent'))
                                <div class="alert alert-success card card-body" role="alert">
                                    لینک فعال سازی مجددا برای شما ارسال گردید
                                </div>
                            @endif
                            <div class="card card-footer">

                                قبل از هر کاری ابتدا به صندق ایمیل خود وارد شوید و بر روی لینک فعال سازی کلیک کنید

                                <div class="mt-3 text-center">
                                    @if (Route::has('verification.resend'))
                                        اگر لینک فعال سازی را دریافت نکرده اید <a
                                                class="btn btn-sm btn-outline-primary"
                                                href="{{ route('verification.resend') }}">اینجا
                                            کلیک کنید تا مجددا لینک فعال سازی ارسال گردد</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
