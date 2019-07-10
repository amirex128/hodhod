@extends('layouts.app', ['title' => 'مدیریت تخفیف ها'])

@section('content')
    @include('users.partials.header', ['title' => 'ویرایش تخفیف'])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">مدیریت تخفیف ها</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('discount.index') }}" class="btn btn-sm btn-primary">بازگشت</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('discount.update',$discount) }}">
                            @csrf
                            @method('put')
                            <h6 class="heading-small text-muted mb-4">اطلاعات تخفیف ها</h6>
                            <div id="discount" class="pl-lg-4">
                                <div class="row rtl">
                                    <div class="col-sm-12 mb-4">
                                        <p class="form-control-label text-right">عنوان تخفیف :</p>
                                        <input type="text" name="title" id="input-title"
                                               class="form-control form-control-alternative"
                                               placeholder="عنوان تخفیف را وارد نمایید..."
                                               value="{{ old('title',$discount->title) }}" required autofocus>
                                    </div>
                                    <div class="col-sm-12 mb-4">
                                        <p class="form-control-label text-right">کد تخفیف:</p>
                                        <input type="text" name="code" id="input-code"
                                               class="form-control form-control-alternative"
                                               placeholder="کد تخفیف را وارد نمایید..."
                                               value="{{ old('code',$discount->code) }}" required autofocus>
                                    </div>
                                    <div class="col-sm-12 mb-4">
                                        <p class="form-control-label text-right">نوع اعمال تخفیف :</p>
                                        <select class="form-control" name="type_discount">
                                            <option {{$discount->type==1?"selected":""}} value="1">درصد</option>
                                            <option {{$discount->type==2?"selected":""}} value="2">تومان</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 mb-4">
                                        <p class="form-control-label text-right">میزان تخفیف :</p>
                                        <input type="number" name="price" id="input-price"
                                               class="form-control form-control-alternative"
                                               placeholder="میزان تخفیف را وارد نمایید..."
                                               value="{{ old('price',$discount->price) }}" required autofocus>
                                        {{--                                        <small class="rtl text-right">در صورتی که میخواهید درصد اعمال کنید علامت درصد را وارد نکنید</small>--}}
                                    </div>
                                    <div class="col-sm-12 mb-4">
                                        <p class="form-control-label text-right">حداقل قیمت سفارش :</p>
                                        <input type="number" name="min_price" id="input-min_price"
                                               class="form-control form-control-alternative"
                                               placeholder="حداقل قیمت سفارش را وارد نمایید..."
                                               value="{{ old('min_price',$discount->min_price) }}" required autofocus>
                                    </div>
                                    <div class="col-sm-12 mb-4">
                                        <p class="form-control-label text-right">حداکثر قیمت سفارش :</p>
                                        <input type="number" name="max_price" id="input-max_price"
                                               class="form-control form-control-alternative"
                                               placeholder="حداکثر قیمت سفارش  را وارد نمایید..."
                                               value="{{ old('max_price',$discount->max_price) }}" required autofocus>
                                    </div>
                                    <div class="col-sm-12 mb-4">
                                        <p class="form-control-label text-right">تاریخ انقضا کد تخفیف :</p>

                                        <div class="row form-group">
                                            <div class="col-4">
                                                <select class="form-control" name="day" id="day">
                                                    @for($i=1;$i<32;$i++)
                                                        <option {{$discount->day==$i?"selected":""}} value="{{$i}}">{{$i}}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="col-4">
                                                <select class="form-control" name="month" id="month">
                                                    <option {{$discount->month==1?"selected":""}} value="1">فروردین
                                                    </option>
                                                    <option {{$discount->month==2?"selected":""}} value="2">اردیبهشت
                                                    </option>
                                                    <option {{$discount->month==3?"selected":""}} value="3">خرداد
                                                    </option>
                                                    <option {{$discount->month==4?"selected":""}} value="4">تیر</option>
                                                    <option {{$discount->month==5?"selected":""}} value="5">مرداد
                                                    </option>
                                                    <option {{$discount->month==6?"selected":""}} value="6">شهریور
                                                    </option>
                                                    <option {{$discount->month==7?"selected":""}} value="7">مهر</option>
                                                    <option {{$discount->month==8?"selected":""}} value="8">آبان
                                                    </option>
                                                    <option {{$discount->month==9?"selected":""}} value="9">آذر</option>
                                                    <option {{$discount->month==10?"selected":""}} value="10">دی
                                                    </option>
                                                    <option {{$discount->month==11?"selected":""}} value="11">بهمن
                                                    </option>
                                                    <option {{$discount->month==12?"selected":""}} value="12">اسفند
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-4 ">
                                                <select class="form-control" name="year" id="year">
                                                    <option {{$discount->year==1397?"selected":""}} value="1397">1397
                                                    </option>
                                                    <option {{$discount->year==1398?"selected":""}} value="1398">1398
                                                    </option>
                                                    <option {{$discount->year==1399?"selected":""}} value="1399">1399
                                                    </option>
                                                    <option {{$discount->year==1400?"selected":""}} value="1400">1400
                                                    </option>
                                                    <option {{$discount->year==1401?"selected":""}} value="1401">1401
                                                    </option>
                                                    <option {{$discount->year==1402?"selected":""}} value="1402">1402
                                                    </option>
                                                    <option {{$discount->year==1403?"selected":""}} value="1403">1403
                                                    </option>
                                                    <option {{$discount->year==1404?"selected":""}} value="1404">1404
                                                    </option>
                                                    <option {{$discount->year==1405?"selected":""}} value="1405">1405
                                                    </option>
                                                    <option {{$discount->year==1406?"selected":""}} value="1405">1406
                                                    </option>
                                                    <option {{$discount->year==1407?"selected":""}} value="1406">1407
                                                    </option>
                                                    <option {{$discount->year==1408?"selected":""}} value="1407">1408
                                                    </option>
                                                    <option {{$discount->year==1409?"selected":""}} value="1408">1409
                                                    </option>
                                                    <option {{$discount->year==1410?"selected":""}} value="1409">1410
                                                    </option>
                                                    <option {{$discount->year==1411?"selected":""}} value="1410">1411
                                                    </option>
                                                    <option {{$discount->year==1412?"selected":""}} value="1410">1412
                                                    </option>
                                                    <option {{$discount->year==1413?"selected":""}} value="1410">1413
                                                    </option>
                                                    <option {{$discount->year==1414?"selected":""}} value="1410">1414
                                                    </option>
                                                    <option {{$discount->year==1415?"selected":""}} value="1410">1415
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 mb-4">
                                        <p class="form-control-label text-right">حداکثر کاربران :</p>
                                        <input type="number" name="max_user" id="input-max_user"
                                               class="form-control form-control-alternative"
                                               placeholder="حداکثر کاربران را وارد نمایید..."
                                               value="{{ old('max_user',$discount->max_user) }}" required autofocus>
                                    </div>


                                    <div class="col-sm-12 mb-4">
                                        <p class="form-control-label text-right">کاربران مجاز :</p>
                                        <div class="form-group text-right">
                                            <select name="users[]" class="demo w-100 "
                                                    style="" multiple="multiple">

                                                @foreach(\App\User::get() as $user)
                                                    <option
                                                            @if (count((array)$discount->users)>0)
                                                                @if(in_array($user->id,(array)$discount->users))
                                                                selected
                                                                @endif
                                                            @endif

                                                            value="{{$user->id}}">{{$user->name." ".$user->lname}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <button class="btn btn-block btn-outline-info">ذخیره</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection


