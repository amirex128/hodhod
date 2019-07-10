@extends('layouts.app', ['title' => 'مدیریت تخفیف ها'])

@section('content')
    @include('users.partials.header', ['title' => 'افزودن تخفیف'])

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
                        <form method="post" action="{{ route('discount.store') }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">اطلاعات تخفیف ها</h6>
                            <div id="discount" class="pl-lg-4">
                                <div class="row rtl">
                                    <div class="col-sm-12 mb-4">
                                        <p class="form-control-label text-right">عنوان تخفیف :</p>
                                        <input type="text" name="title" id="input-title"
                                               class="form-control form-control-alternative"
                                               placeholder="عنوان تخفیف را وارد نمایید..."
                                               value="{{ old('title') }}" required autofocus>
                                    </div>
                                    <div class="col-sm-12 mb-4">
                                        <p class="form-control-label text-right">کد تخفیف:</p>
                                        <input type="text" name="code" id="input-code"
                                               class="form-control form-control-alternative"
                                               placeholder="کد تخفیف را وارد نمایید..."
                                               value="{{ old('code') }}" required autofocus>
                                    </div>
                                    <div class="col-sm-12 mb-4">
                                        <p class="form-control-label text-right">نوع اعمال تخفیف :</p>
                                        <select class="form-control" name="type_discount">
                                            <option value="1">درصد</option>
                                            <option value="2">تومان</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 mb-4">
                                        <p class="form-control-label text-right">میزان تخفیف :</p>
                                        <input type="number" name="price" id="input-price"
                                               class="form-control form-control-alternative"
                                               placeholder="میزان تخفیف را وارد نمایید..."
                                               value="{{ old('price') }}" required autofocus>
                                        {{--                                        <small class="rtl text-right">در صورتی که میخواهید درصد اعمال کنید علامت درصد را وارد نکنید</small>--}}
                                    </div>
                                    <div class="col-sm-12 mb-4">
                                        <p class="form-control-label text-right">حداقل قیمت سفارش :</p>
                                        <input type="number" name="min_price" id="input-min_price"
                                               class="form-control form-control-alternative"
                                               placeholder="حداقل قیمت سفارش را وارد نمایید..."
                                               value="{{ old('min_price') }}" required autofocus>
                                    </div>
                                    <div class="col-sm-12 mb-4">
                                        <p class="form-control-label text-right">حداکثر قیمت سفارش :</p>
                                        <input type="number" name="max_price" id="input-max_price"
                                               class="form-control form-control-alternative"
                                               placeholder="حداکثر قیمت سفارش  را وارد نمایید..."
                                               value="{{ old('max_price') }}" required autofocus>
                                    </div>
                                    <div class="col-sm-12 mb-4">
                                        <p class="form-control-label text-right">تاریخ انقضا کد تخفیف :</p>

                                        <div class="row form-group">
                                            <div class="col-4">
                                                <select class="form-control"  name="day" id="day">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                    <option value="21">21</option>
                                                    <option value="22">22</option>
                                                    <option value="23">23</option>
                                                    <option value="24">24</option>
                                                    <option value="25">25</option>
                                                    <option value="26">26</option>
                                                    <option value="27">27</option>
                                                    <option value="28">28</option>
                                                    <option value="29">29</option>
                                                    <option value="30">30</option>
                                                    <option value="31">31</option>
                                                </select>
                                            </div>
                                            <div class="col-4">
                                                <select class="form-control"  name="month" id="month">
                                                    <option value="1">فروردین</option>
                                                    <option value="2">اردیبهشت</option>
                                                    <option value="3">خرداد</option>
                                                    <option value="4">تیر</option>
                                                    <option value="5">مرداد</option>
                                                    <option value="6">شهریور</option>
                                                    <option value="7">مهر</option>
                                                    <option value="8">آبان</option>
                                                    <option value="9">آذر</option>
                                                    <option value="10">دی</option>
                                                    <option value="11">بهمن</option>
                                                    <option value="12">اسفند</option>
                                                </select>
                                            </div>
                                            <div class="col-4 ">
                                                <select class="form-control"  name="year" id="year">
                                                    <option value="1397">1397</option>
                                                    <option value="1398">1398</option>
                                                    <option value="1399">1399</option>
                                                    <option value="1400">1400</option>
                                                    <option value="1401">1401</option>
                                                    <option value="1402">1402</option>
                                                    <option value="1403">1403</option>
                                                    <option value="1404">1404</option>
                                                    <option value="1405">1405</option>
                                                    <option value="1405">1405</option>
                                                    <option value="1406">1406</option>
                                                    <option value="1407">1407</option>
                                                    <option value="1408">1408</option>
                                                    <option value="1409">1409</option>
                                                    <option value="1410">1410</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 mb-4">
                                        <p class="form-control-label text-right">حداکثر کاربران :</p>
                                        <input type="number" name="max_user" id="input-max_user"
                                               class="form-control form-control-alternative"
                                               placeholder="حداکثر کاربران را وارد نمایید..."
                                               value="{{ old('max_user') }}" required autofocus>
                                    </div>
                                    <div class="col-sm-12 mb-4">
                                        <p class="form-control-label text-right">کاربران مجاز :</p>
                                        <div class="form-group text-right">
                                            <select name="users[]" class="demo w-100 "
                                                    style="" multiple="multiple">

                                                @foreach(\App\User::all() as $user)
                                                    <option
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
