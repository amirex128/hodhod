@extends('layouts.app', ['title' => __('User Management')])

@section('content')
    @include('users.partials.header', ['title' => 'کاربران'])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">ویرایش کاربران</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary">بازگشت</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('user.update', $user) }}">
                            @csrf
                            @method('put')

                            <div class="pl-lg-4 rtl text-right">
                                @input(['name'=>'name','title'=>'نام','value'=>$user->name])
                                @input(['name'=>'lname','title'=>'نام خانوادگی','value'=>$user->lname])
                                @input(['name'=>'phone','title'=>'شماره تلفن','type'=>'number','value'=>$user->phone])

                                @select(['name'=>'status','title'=>'وضعیت'])
                                @option(['title'=>'فعال','value'=>1,'items'=>$user->status])
                                @option(['title'=>' غیر فعال','value'=>0,'items'=>$user->status])
                                @endselect


                                <div class="rtl text-right form-group{{ $errors->has('level') ? ' has-danger' : '' }}">


                                    <label class="form-control-label" for="input-level">مسئولیت : </label>
                                    <select name="level" id="input-level"
                                            class="form-control form-control-alternative{{ $errors->has('level') ? ' is-invalid' : '' }}">
                                        <option {{$user->roles->contains('name','admin')?"selected":""}} value="1">مدیر</option>
                                        <option {{$user->roles->contains('name','manager')?"selected":""}} value="2">کاربر مدیریتی</option>
                                        <option {{$user->roles->contains('name','customer')?"selected":""}} value="3">مشتری</option>                                    </select>
                                    @if ($errors->has('level'))
                                        <span class="invalid-feedback" role="alert">
                                     <strong>{{ $errors->first('level') }}</strong>
                                                </span>
                                    @endif


                                </div>


                                @input(['name'=>'address','title'=>'آدرس','value'=>$user->address])
                                @input(['name'=>'email','title'=>'ایمیل','type'=>'email','value'=>$user->email])

                                <button class="btn btn-danger btn-block"> ذخیره</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">ویرایش پسورد</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('user.password',$user)}}">
                            @csrf
                            @method('put')


                            <div class="pl-lg-4 rtl text-right">

                                @input(['name'=>'password','title'=>'پسورد جدید','type'=>'text'])
                                @input(['name'=>'verify_password','title'=>'تکرار پسورد جدید','type'=>'text'])
                                <button class="btn btn-danger btn-block"> ذخیره</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>

@endsection
