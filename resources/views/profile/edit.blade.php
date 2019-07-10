@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('users.partials.header', [
        'title' =>  auth()->user()->name
    ])
    <form method="post" enctype="multipart/form-data" action="{{ route('profile.update') }}" autocomplete="off">

        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                    <div class="card card-profile shadow">
                        <div class="row justify-content-center">
                            <div class="col-lg-3 order-lg-2">
                                <div class="card-profile-image">
                                    @if (auth()->user()->avatar)
                                        <input style="display: none" name="avatar" type="file"/>
                                        <img style="" src="/{{auth()->user()->avatar}}" class="rounded-circle">
                                    @else
                                        <div style="width: 100%;height: 100%;">
                                            <input style="display: none" id="input-file" name="avatar" type="file"/>
                                            <img style="min-height:200px;min-width:200px;max-width: 200px;max-height: 200px;"
                                                 id="myImg" onclick="document.getElementById('input-file').click()"
                                                 src="{{asset('upload/noImage.png')}}" class="rounded-circle">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-header text-center border-0 pt-8 pt-md-1 pb-0 pb-md-4">
                            <div class="d-flex justify-content-between">

                            </div>
                        </div>
                        <div class="card-body pt-0 pt-md-4">
                            <div class="row">
                                <div class="col">
                                    <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-3">
                                <h3>
                                    {{ auth()->user()->name }}<span class="font-weight-light"></span>
                                </h3>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 order-xl-1">
                    <div class="card bg-secondary shadow">
                        <div class="card-header bg-white border-0">
                            <div class="row align-items-center">
                                <h3 class="mb-0">ویرایش پروفایل</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">اطلاعات کاربری</h6>


                            @status()

                            <div class="pl-lg-4">

                                @input(['name'=>'name','title'=>'نام','value'=>$user->name])
                                @input(['name'=>'lname','title'=>'نام خانوادگی','value'=>$user->lname])
                                @input(['name'=>'phone','title'=>'شماره تلفن','type'=>'number','value'=>$user->phone])

                                {{--                                @select(['name'=>'status','title'=>'وضعیت'])--}}
                                {{--                                @option(['title'=>'فعال','value'=>1,'items'=>$user->status])--}}
                                {{--                                @option(['title'=>' غیر فعال','value'=>0,'items'=>$user->status])--}}
                                {{--                                @endselect--}}

                                {{--                                @select(['name'=>'level','title'=>'مسئولیت'])--}}
                                {{--                                @option(['title'=>'مدیر','value'=>4,'items'=>$user->level])--}}
                                {{--                                @endselect--}}

                                @input(['name'=>'address','title'=>'آدرس','value'=>$user->address])
                                @input(['name'=>'email','title'=>'ایمیل','type'=>'email','value'=>$user->email])
                                <button class="btn btn-danger btn-block"> ذخیره</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>






    <form method="post" action="{{route('profile.password',$user)}}" autocomplete="off">
        @csrf
        @method('put')

        <div class="container-fluid mt-7">
            <div class="row">
                <div class="col-xl-8 order-xl-1">
                    <div class="card bg-secondary shadow">
                        <div class="card-header bg-white border-0">
                            <div class="row align-items-center">
                                <h3 class="mb-0">ویرایش پسورد</h3>
                            </div>
                        </div>
                        <div class="card-body">


                            <div class="pl-lg-4">

                                @input(['name'=>'password','title'=>'پسورد جدید','type'=>'password'])
                                @input(['name'=>'verify_password','title'=>'تکرار پسورد جدید','type'=>'password'])
                                <button class="btn btn-danger btn-block"> ذخیره</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('layouts.footers.auth')
        </div>
    </form>

@endsection
@section('script')
    <script>

        document.querySelector('#input-file').addEventListener('change', function () {
            if (this.files && this.files[0]) {
                var img0 = document.querySelector('#myImg');  // $('img')[0]
                img0.src = URL.createObjectURL(this.files[0]); // set src to file url
            }
        });
    </script>
@stop
