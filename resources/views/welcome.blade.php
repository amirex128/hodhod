@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    <div class="header bg-gradient-primary py-5 py-lg-5">
        <div class="container">
            <div class="header-body text-center mb-3">
                <div class="row justify-content-center">

                    <div style="height: 650px;"
                         class="col-lg-5 col-md-6 d-flex flex-column justify-content-center align-items-center">


                        <div>
                            <a href="{{url()->to('android/app.apk')}}"> <img
                                        style="width: 200px;height: 200px;" class="thumbnail img-thumbnail"
                                        src="{{asset('qr-app.png')}}" alt=""></a>


                        </div>
                        <h1 class="text-white p-3">به فروشگاه هدهد خوش آمدید</h1>

                        <div>
                            <span style="font-size: 15px" class="mt-3 text-white">جهت دانلود اپلیکیشن کد بالا را اسکن نمایید</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
                 xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>

    <div class="container mt--10 pb-5"></div>
@endsection
