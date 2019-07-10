@extends('layouts.app', ['title' => 'مدیریت تنظیمات'])

@section('content')
    @include('users.partials.header', ['title' => 'تنظیمات'])

    <div class="container-fluid mt--7 mb-5">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0"></h3>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">

                        <h6 class="heading-small text-muted mb-4">اطلاعات تنظیمات</h6>
                        @errors()
                        @status()

                        <div id="setting" class="pl-lg-4">
                            <form id="my-form" action="{{route('setting.update',['setting'=>'social'])}}"
                                  enctype="multipart/form-data" method="post">
                                @csrf
                                @method('put')
                                {{--{{dd($setting)}}--}}
                                <div class="row">
                                    <div class="col-sm-12 mb-3 rtl">
                                        <p class="text-right text-bold">عنوان سایت :</p>
                                        <input value="{{isset($setting[1]->value)?$setting[1]->value:""}}" type="text"
                                               placeholder="عنوان سایت خود را وارد نمایید..." name="title"
                                               class="form-control">
                                    </div>
                                    <div class="col-sm-6 mb-3 rtl">
                                        <p class="text-right text-bold">شناسه عددی تلگرام مدیر:</p>
                                        <input value="{{isset($setting[12]->value)?$setting[12]->value:""}}"
                                               type="number"
                                               placeholder="شناسه تلگرام خود را وارد نمایید..." name="telegram_admin"
                                               class="form-control">
                                    </div>
                                    <div class="col-sm-6 mb-3 rtl">
                                        <p class="text-right text-bold">آیدی کانال تلگرام:</p>
                                        <input value="{{isset($setting[11]->value)?$setting[11]->value:""}}" type="text"
                                               placeholder="آیدی کانال تلگرام خود را وارد نمایید..."
                                               name="telegram_channel"
                                               class="form-control">
                                    </div>
                                    <div class="col-sm-6 mb-3 rtl">
                                        <p class="text-right text-bold">ایمیل مدیریت:</p>
                                        <input value="{{isset($setting[13]->value)?$setting[13]->value:""}}"
                                               type="email"
                                               placeholder="ایمیل اصلی خود را وارد نمایید..."
                                               name="email"
                                               class="form-control">
                                    </div>
                                    <div class="col-sm-6 mb-3 rtl">
                                        <p class="text-right text-bold">شماره مدیریت:</p>
                                        <input value="{{isset($setting[17]->value)?$setting[17]->value:""}}"
                                               type="number"
                                               placeholder="شماره اصلی خود را وارد نمایید..."
                                               name="phone"
                                               class="form-control">
                                    </div>
                                    <div class="col-sm-4 mb-3 rtl">
                                        <p class="text-right text-bold"> میزان مالیات:</p>
                                        <input value="{{isset($setting[14]->value)?$setting[14]->value:""}}"
                                               type="number"
                                               placeholder="میزان مالیات خود را وارد نمایید..."
                                               name="tax"
                                               class="form-control">
                                        <small class="rtl text-right">در صورتی که میخواهید درصد اعمال کنید علامت درصد را وارد نکنید</small>
                                    </div>
                                    <div class="col-sm-4 mb-3 rtl">
                                        <p class="text-right text-bold">نوع مالیات:</p>
                                        <select class="form-control" name="tax_type" id="">
                                            <option {{isset($setting[16]->value)?$setting[16]->value==1?"selected":"":""}} value="1">
                                                درصد
                                            </option>
                                            <option {{isset($setting[16]->value)?$setting[16]->value==2?"selected":"":""}}  value="2">
                                                تومان
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4 rtl mb-4 text-right">
                                        <p class="text-right text-bold">وضعیت مالیات:</p>
                                        <label class="custom-toggle">
                                            <input type="checkbox" name="tax_status"
                                                   @if(isset($setting[15]->value)?$setting[15]->value =="on":false) checked @endif>
                                            <span class="custom-toggle-slider rounded-circle"></span>
                                        </label>
                                    </div>
                                    <div class="col-sm-12 rtl mb-4 text-right">
                                        <p class="text-right text-bold">درباره فروشگاه :</p>

                                        <textarea id="summernote"
                                                  name="about">{{isset($setting[2]->value)?$setting[2]->value:""}}</textarea>
                                    </div>
                                    <div class="col-12  mb-4">
                                        <p class="form-control-label text-right">لوگوی فروشگاه :</p>
                                        <input type="file"
                                               name="logo"
                                               class="dropify-image"
                                               data-min-width="100"
                                               data-max-width="700"

                                               data-min-height="100"
                                               data-max-height="600"
                                               data-default-file="/{{isset($setting[8]->value)?$setting[8]->value:""}}"
                                        >
                                    </div>
                                    <div class="col-6  mb-4">
                                        <p class="form-control-label text-right">تصویر درباره ما :</p>
                                        <input type="file"
                                               name="image_about"
                                               class="dropify-image"
                                               data-min-width="100"
                                               data-max-width="700"

                                               data-min-height="100"
                                               data-max-height="600"
                                               data-default-file="/{{isset($setting[9]->value)?$setting[9]->value:""}}"

                                        >
                                    </div>
                                    <div class="col-6  mb-4">
                                        <p class="form-control-label text-right">تصویر منوی فروشگاه :</p>
                                        <input type="file"
                                               name="image_menu"
                                               class="dropify-image"
                                               data-min-width="100"
                                               data-max-width="700"

                                               data-min-height="100"
                                               data-max-height="600"
                                               data-default-file="/{{isset($setting[10]->value)?$setting[10]->value:""}}">

                                    </div>
                                    <div class="col-sm-12 rtl mb-4 text-right">
                                        <p class="text-right text-bold">شرایط گارانتی :</p>

                                        <textarea id="summernote1"
                                                  name="warranty">{{isset($setting[3]->value)?$setting[3]->value:""}}</textarea>
                                    </div>
                                    <div class="col-sm-3 rtl mb-4 text-right">
                                        <p class="text-right text-bold">پیشنهاد های ویژه :</p>
                                        <label class="custom-toggle">
                                            <input type="checkbox" name="special"
                                                   @if(isset($setting[4]->value)?$setting[4]->value =="on":false) checked @endif >
                                            <span class="custom-toggle-slider rounded-circle"></span>
                                        </label>
                                    </div>
                                    <div class="col-sm-3 rtl mb-4 text-right">
                                        <p class="text-right text-bold">محصولات تخفیف دار :</p>
                                        <label class="custom-toggle">
                                            <input type="checkbox"
                                                   @if(isset($setting[5]->value)?$setting[5]->value =="on":false) checked
                                                   @endif name="offer">
                                            <span class="custom-toggle-slider rounded-circle"></span>
                                        </label>
                                    </div>
                                    <div class="col-sm-3 rtl mb-4 text-right">
                                        <p class="text-right text-bold">محبوب ترین محصولات :</p>
                                        <label class="custom-toggle">
                                            <input type="checkbox" name="popular"
                                                   @if(isset($setting[6]->value)?$setting[6]->value =="on":false) checked @endif>
                                            <span class="custom-toggle-slider rounded-circle"></span>
                                        </label>
                                    </div>
                                    <div class="col-sm-3 rtl mb-4 text-right">
                                        <p class="text-right text-bold">جدید ترین محصولات :</p>
                                        <label class="custom-toggle">
                                            <input type="checkbox" name="new"
                                                   @if(isset($setting[7]->value)?$setting[7]->value =="on":false) checked @endif>
                                            <span class="custom-toggle-slider rounded-circle"></span>
                                        </label>
                                    </div>
{{--                                    <div class="col-sm-12">--}}

{{--                                        <button type="button" class="btn btn-primary btn-block mb-4"--}}
{{--                                                data-toggle="modal"--}}
{{--                                                data-target="#exampleModal">--}}
{{--                                            تنظیمات شبکه اجتماعی--}}
{{--                                        </button>--}}
{{--                                        --}}{{------------------------------------------------------------------------}}
{{--                                        <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog"--}}
{{--                                             aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--                                            <div class="modal-dialog modal-dialog-centered" role="document">--}}
{{--                                                <div class="modal-content">--}}
{{--                                                    <div class="modal-header">--}}
{{--                                                        <h5 class="modal-title" id="exampleModalLabel">تنظیمات شبکه--}}
{{--                                                            اجتماعی</h5>--}}
{{--                                                        <button type="button" class="close mr-A"--}}
{{--                                                                data-dismiss="modal"--}}
{{--                                                                aria-label="Close">--}}
{{--                                                            <span aria-hidden="true">&times;</span>--}}
{{--                                                        </button>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="modal-body rtl">--}}

{{--                                                        <div class="col-sm-12 mb-3">--}}
{{--                                                            <p class="form-control-label text-right">نام:</p>--}}
{{--                                                            <input type="text" name="name[0]" id="input-name"--}}
{{--                                                                   class="form-control form-control-alternative"--}}
{{--                                                                   placeholder="نام شبکه اجتماعی خود را وارد نمایید..."--}}
{{--                                                                   value="{{isset($setting[0]->value[0][0])?$setting[0]->value[0][0]:""}}"--}}
{{--                                                                   required autofocus>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-12 mb-4">--}}
{{--                                                            <p class="form-control-label text-right">آدرس:</p>--}}
{{--                                                            <input type="text" name="address[0]" id="input-address"--}}
{{--                                                                   class="form-control form-control-alternative"--}}
{{--                                                                   placeholder="آدرس شبکه اجتماعی خود را وارد نمایید..."--}}
{{--                                                                   value="{{isset($setting[0]->value[0][1])?$setting[0]->value[0][1]:""}}"--}}
{{--                                                                   required autofocus>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-12 mb-3">--}}

{{--                                                            <div onclick="document.querySelector('#my_image0').click()"--}}
{{--                                                                 class="btn btn-danger"--}}
{{--                                                                 style="width: 100%;margin-right: 0px">--}}
{{--                                                                انتخاب تصویر--}}
{{--                                                                <input style="display: none;z-index:10;height: 100%;width: 100%;"--}}
{{--                                                                       type="file"--}}
{{--                                                                       name="image[0]" id="my_image0"--}}
{{--                                                                       class=" form-control-alternative"--}}
{{--                                                                       required--}}
{{--                                                                       autofocus--}}

{{--                                                                >--}}

{{--                                                            </div>--}}
{{--                                                            <br>--}}

{{--                                                                <img alt="aaa"--}}
{{--                                                                     src="/{{ isset($setting[0]->value[0][2])?$setting[0]->value[0][2]:""}}"--}}
{{--                                                                 class="img-thumbnail" id="myImg0" height=200--}}

{{--                                                            <hr>--}}
{{--                                                        </div>--}}
{{--                                                        --}}{{-------------------------------------------------------------------------}}
{{--                                                        <div class="col-sm-12 mb-3">--}}
{{--                                                            <p class="form-control-label text-right">نام:</p>--}}
{{--                                                            <input type="text" name="name[1]" id="input-name"--}}
{{--                                                                   class="form-control form-control-alternative"--}}
{{--                                                                   placeholder="نام شبکه اجتماعی خود را وارد نمایید..."--}}
{{--                                                                   value="{{isset($setting[0]->value[1][0])?$setting[0]->value[1][0]:""}}"--}}
{{--                                                                   required autofocus>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-12 mb-4">--}}
{{--                                                            <p class="form-control-label text-right">آدرس:</p>--}}
{{--                                                            <input type="text" name="address[1]" id="input-address"--}}
{{--                                                                   class="form-control form-control-alternative"--}}
{{--                                                                   placeholder="آدرس شبکه اجتماعی خود را وارد نمایید..."--}}
{{--                                                                   value="{{isset($setting[0]->value[1][1])?$setting[0]->value[1][1]:""}}"--}}
{{--                                                                   required autofocus>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-12 mb-3">--}}

{{--                                                            <div onclick="document.querySelector('#my_image1').click()"--}}
{{--                                                                 class="btn btn-danger"--}}
{{--                                                                 style="width: 100%;margin-right: 0px">--}}
{{--                                                                انتخاب تصویر--}}
{{--                                                                <input style="display: none;z-index:10;height: 100%;width: 100%;"--}}
{{--                                                                       type="file"--}}
{{--                                                                       name="image[1]" id="my_image1"--}}
{{--                                                                       class=" form-control-alternative"--}}
{{--                                                                       required--}}
{{--                                                                       autofocus>--}}

{{--                                                            </div>--}}
{{--                                                            <br>--}}
{{--                                                                <img alt="aaa"--}}
{{--                                                                     src="/{{isset($setting[0]->value[1][2])?$setting[0]->value[1][2]:""}}"--}}
{{--                                                                     class="img-thumbnail " id="myImg1" height=200--}}
{{--                                                                     width=100%>--}}


{{--                                                            <hr>--}}
{{--                                                        </div>--}}
{{--                                                        --}}{{-------------------------------------------------------------------------}}
{{--                                                        <div class="col-sm-12 mb-3">--}}
{{--                                                            <p class="form-control-label text-right">نام:</p>--}}
{{--                                                            <input type="text" name="name[2]" id="input-name"--}}
{{--                                                                   class="form-control form-control-alternative"--}}
{{--                                                                   placeholder="نام شبکه اجتماعی خود را وارد نمایید..."--}}
{{--                                                                   value="{{isset($setting[0]->value[2][0])?$setting[0]->value[0][0]:""}}"--}}
{{--                                                                   required autofocus>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-12 mb-4">--}}
{{--                                                            <p class="form-control-label text-right">آدرس:</p>--}}
{{--                                                            <input type="text" name="address[2]" id="input-address"--}}
{{--                                                                   class="form-control form-control-alternative"--}}
{{--                                                                   placeholder="آدرس شبکه اجتماعی خود را وارد نمایید..."--}}
{{--                                                                   value="{{isset($setting[0]->value[2][1])?$setting[0]->value[2][1]:""}}"--}}
{{--                                                                   required autofocus>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-12 mb-3">--}}

{{--                                                            <div onclick="document.querySelector('#my_image2').click()"--}}
{{--                                                                 class="btn btn-danger"--}}
{{--                                                                 style="width: 100%;margin-right: 0px">--}}
{{--                                                                انتخاب تصویر--}}
{{--                                                                <input style="display: none;z-index:10;height: 100%;width: 100%;"--}}
{{--                                                                       type="file"--}}
{{--                                                                       name="image[2]" id="my_image2"--}}
{{--                                                                       class=" form-control-alternative"--}}
{{--                                                                       required--}}
{{--                                                                       autofocus>--}}
{{--                                                            </div>--}}
{{--                                                            <br>--}}
{{--                                                                <img alt="aaa"--}}
{{--                                                                     src="/{{isset($setting[0]->value[2][2])?$setting[0]->value[2][2]:""}}"--}}
{{--                                                                     class="img-thumbnail " id="myImg2" height=200--}}
{{--                                                                     width=100%>--}}

{{--                                                        </div>--}}
{{--                                                        --}}{{-------------------------------------------------------------------------}}
{{--                                                        <div class="col-sm-12 mb-3">--}}
{{--                                                            <p class="form-control-label text-right">نام:</p>--}}
{{--                                                            <input type="text" name="name[3]" id="input-name"--}}
{{--                                                                   class="form-control form-control-alternative"--}}
{{--                                                                   placeholder="نام شبکه اجتماعی خود را وارد نمایید..."--}}
{{--                                                                   value="{{isset($setting[0]->value[3][0])?$setting[0]->value[3][0]:""}}"--}}
{{--                                                                   required autofocus>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-12 mb-4">--}}
{{--                                                            <p class="form-control-label text-right">آدرس:</p>--}}
{{--                                                            <input type="text" name="address[3]" id="input-address"--}}
{{--                                                                   class="form-control form-control-alternative"--}}
{{--                                                                   placeholder="آدرس شبکه اجتماعی خود را وارد نمایید..."--}}
{{--                                                                   value="{{isset($setting[0]->value[3][1])?$setting[0]->value[3][1]:""}}"--}}
{{--                                                                   required autofocus>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-12 mb-3">--}}

{{--                                                            <div onclick="document.querySelector('#my_image3').click()"--}}
{{--                                                                 class="btn btn-danger"--}}
{{--                                                                 style="width: 100%;margin-right: 0px">--}}
{{--                                                                انتخاب تصویر--}}
{{--                                                                <input style="display: none;z-index:10;height: 100%;width: 100%;"--}}
{{--                                                                       type="file"--}}
{{--                                                                       name="image[3]" id="my_image3"--}}
{{--                                                                       class=" form-control-alternative"--}}
{{--                                                                       required--}}
{{--                                                                       autofocus>--}}

{{--                                                            </div>--}}
{{--                                                            <br>--}}
{{--                                                                <img alt="aaa"--}}
{{--                                                                     src="/{{isset($setting[0]->value[3][2])?$setting[0]->value[3][2]:""}}"--}}
{{--                                                                     class="img-thumbnail " id="myImg3" height=200--}}
{{--                                                                     width=100%>--}}

{{--                                                            <hr>--}}
{{--                                                        </div>--}}
{{--                                                        --}}{{-------------------------------------------------------------------------}}
{{--                                                        <div class="col-sm-12 mb-3">--}}
{{--                                                            <p class="form-control-label text-right">نام:</p>--}}
{{--                                                            <input type="text" name="name[4]" id="input-name"--}}
{{--                                                                   class="form-control form-control-alternative"--}}
{{--                                                                   placeholder="نام شبکه اجتماعی خود را وارد نمایید..."--}}
{{--                                                                   value="{{isset($setting[0]->value[4][0])?$setting[0]->value[4][0]:""}}"--}}
{{--                                                                   required autofocus>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-12 mb-4">--}}
{{--                                                            <p class="form-control-label text-right">آدرس:</p>--}}
{{--                                                            <input type="text" name="address[4]" id="input-address"--}}
{{--                                                                   class="form-control form-control-alternative"--}}
{{--                                                                   placeholder="آدرس شبکه اجتماعی خود را وارد نمایید..."--}}
{{--                                                                   value="{{isset($setting[0]->value[4][1])?$setting[0]->value[4][1]:""}}"--}}
{{--                                                                   required autofocus>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-12 mb-3">--}}

{{--                                                            <div onclick="document.querySelector('#my_image4').click()"--}}
{{--                                                                 class="btn btn-danger"--}}
{{--                                                                 style="width: 100%;margin-right: 0px">--}}
{{--                                                                انتخاب تصویر--}}
{{--                                                                <input style="display: none;z-index:10;height: 100%;width: 100%;"--}}
{{--                                                                       type="file"--}}
{{--                                                                       name="image[4]" id="my_image4"--}}
{{--                                                                       class=" form-control-alternative"--}}
{{--                                                                       required--}}
{{--                                                                       autofocus>--}}

{{--                                                            </div>--}}
{{--                                                            <br>--}}

{{--                                                                <img src="/{{isset($setting[0]->value[4][2])?$setting[0]->value[4][2]:""}}"--}}
{{--                                                                     class="img-thumbnail " id="myImg4" height=200--}}
{{--                                                                     width=100%>--}}


{{--                                                            <hr>--}}
{{--                                                        </div>--}}

{{--                                                        --}}{{-------------------------------------------------------------------------}}

{{--                                                    </div>--}}

{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}


                                    <div class="col-sm-12">

                                        <button onclick="document.getElementById('my-form').submit()"
                                                class="btn btn-outline-info btn-block">
                                            ذخیره تنظیمات
                                        </button>

                                    </div>
                                </div>
                            </form>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.css" rel="stylesheet">
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.js"></script>

    <script>
        (function ($) {
            $.extend($.summernote.lang, {
                'fa-IR': {
                    font: {
                        bold: 'درشت',
                        italic: 'خمیده',
                        underline: 'میان خط',
                        clear: 'پاک کردن فرمت فونت',
                        height: 'فاصله ی خطی',
                        name: 'اسم فونت',
                        strikethrough: 'Strike',
                        subscript: 'Subscript',
                        superscript: 'Superscript',
                        size: 'اندازه ی فونت'
                    },
                    image: {
                        image: 'تصویر',
                        insert: 'وارد کردن تصویر',
                        resizeFull: 'تغییر به اندازه ی کامل',
                        resizeHalf: 'تغییر به اندازه نصف',
                        resizeQuarter: 'تغییر به اندازه یک چهارم',
                        floatLeft: 'چسباندن به چپ',
                        floatRight: 'چسباندن به راست',
                        floatNone: 'بدون چسبندگی',
                        shapeRounded: 'Shape: Rounded',
                        shapeCircle: 'Shape: Circle',
                        shapeThumbnail: 'Shape: Thumbnail',
                        shapeNone: 'Shape: None',
                        dragImageHere: 'یک تصویر را اینجا بکشید',
                        dropImage: 'Drop image or Text',
                        selectFromFiles: 'فایل ها را انتخاب کنید',
                        maximumFileSize: 'Maximum file size',
                        maximumFileSizeError: 'Maximum file size exceeded.',
                        url: 'آدرس تصویر',
                        remove: 'حذف تصویر',
                        original: 'Original'
                    },
                    video: {
                        video: 'ویدیو',
                        videoLink: 'لینک ویدیو',
                        insert: 'افزودن ویدیو',
                        url: 'آدرس ویدیو ؟',
                        providers: '(YouTube, Vimeo, Vine, Instagram, DailyMotion یا Youku)'
                    },
                    link: {
                        link: 'لینک',
                        insert: 'اضافه کردن لینک',
                        unlink: 'حذف لینک',
                        edit: 'ویرایش',
                        textToDisplay: 'متن جهت نمایش',
                        url: 'این لینک به چه آدرسی باید برود ؟',
                        openInNewWindow: 'در یک پنجره ی جدید باز شود'
                    },
                    table: {
                        table: 'جدول',
                        addRowAbove: 'Add row above',
                        addRowBelow: 'Add row below',
                        addColLeft: 'Add column left',
                        addColRight: 'Add column right',
                        delRow: 'Delete row',
                        delCol: 'Delete column',
                        delTable: 'Delete table'
                    },
                    hr: {
                        insert: 'افزودن خط افقی'
                    },
                    style: {
                        style: 'استیل',
                        p: 'نرمال',
                        blockquote: 'نقل قول',
                        pre: 'کد',
                        h1: 'سرتیتر 1',
                        h2: 'سرتیتر 2',
                        h3: 'سرتیتر 3',
                        h4: 'سرتیتر 4',
                        h5: 'سرتیتر 5',
                        h6: 'سرتیتر 6'
                    },
                    lists: {
                        unordered: 'لیست غیر ترتیبی',
                        ordered: 'لیست ترتیبی'
                    },
                    options: {
                        help: 'راهنما',
                        fullscreen: 'نمایش تمام صفحه',
                        codeview: 'مشاهده ی کد'
                    },
                    paragraph: {
                        paragraph: 'پاراگراف',
                        outdent: 'کاهش تو رفتگی',
                        indent: 'افزایش تو رفتگی',
                        left: 'چپ چین',
                        center: 'میان چین',
                        right: 'راست چین',
                        justify: 'بلوک چین'
                    },
                    color: {
                        recent: 'رنگ اخیرا استفاده شده',
                        more: 'رنگ بیشتر',
                        background: 'رنگ پس زمینه',
                        foreground: 'رنگ متن',
                        transparent: 'بی رنگ',
                        setTransparent: 'تنظیم حالت بی رنگ',
                        reset: 'بازنشاندن',
                        resetToDefault: 'حالت پیش فرض'
                    },
                    shortcut: {
                        shortcuts: 'دکمه های میان بر',
                        close: 'بستن',
                        textFormatting: 'فرمت متن',
                        action: 'عملیات',
                        paragraphFormatting: 'فرمت پاراگراف',
                        documentStyle: 'استیل سند',
                        extraKeys: 'Extra keys'
                    },
                    help: {
                        'insertParagraph': 'Insert Paragraph',
                        'undo': 'Undoes the last command',
                        'redo': 'Redoes the last command',
                        'tab': 'Tab',
                        'untab': 'Untab',
                        'bold': 'Set a bold style',
                        'italic': 'Set a italic style',
                        'underline': 'Set a underline style',
                        'strikethrough': 'Set a strikethrough style',
                        'removeFormat': 'Clean a style',
                        'justifyLeft': 'Set left align',
                        'justifyCenter': 'Set center align',
                        'justifyRight': 'Set right align',
                        'justifyFull': 'Set full align',
                        'insertUnorderedList': 'Toggle unordered list',
                        'insertOrderedList': 'Toggle ordered list',
                        'outdent': 'Outdent on current paragraph',
                        'indent': 'Indent on current paragraph',
                        'formatPara': 'Change current block\'s format as a paragraph(P tag)',
                        'formatH1': 'Change current block\'s format as H1',
                        'formatH2': 'Change current block\'s format as H2',
                        'formatH3': 'Change current block\'s format as H3',
                        'formatH4': 'Change current block\'s format as H4',
                        'formatH5': 'Change current block\'s format as H5',
                        'formatH6': 'Change current block\'s format as H6',
                        'insertHorizontalRule': 'Insert horizontal rule',
                        'linkDialog.show': 'Show Link Dialog'
                    },
                    history: {
                        undo: 'واچیدن',
                        redo: 'بازچیدن'
                    },
                    specialChar: {
                        specialChar: 'SPECIAL CHARACTERS',
                        select: 'Select Special characters'
                    }
                }
            });
        })(jQuery);

        $(document).ready(function () {


            $('#summernote').summernote({
                placeholder: 'متن خود را وارد نمایید ...',
                tabsize: 2,
                height: 300,
                lang: 'fa-IR' // default: 'en-US'
            });
            $('#summernote1').summernote({
                placeholder: 'متن خود را وارد نمایید ...',
                tabsize: 2,
                height: 300,
                lang: 'fa-IR' // default: 'en-US'
            });
            $('.dropify-image').dropify({
                messages: {
                    'default': 'تصاویر خود را اینجا بکشید',
                    'replace': 'برای تغییر عکس فعلی تصویر جدید را اینجا بکشید',
                    'remove': 'حذف کردن',
                    'error': 'مشکل در ارسال تصویر.',
                },
                error: {
                    'fileSize': 'حجم تصویر بسیار بزرگ است',
                    'minWidth': 'عرض تصویر خیلی کوچک است حداقل سایز باید 100 پیکسل باشد',
                    'maxWidth': 'عرض تصویر خیلی بزرگ است حداکثر سایز باید 700 پیکسل باشد',
                    'minHeight': 'ارتفاع تصویر خیلی کوچک است حداقل سایز باید 128 پیکسل باشد',
                    'maxHeight': 'ارتفاع تصویر خیلی بزرگ است حداکثر سایز باید 700 پیکسل باشد',
'imageFormat': 'فرمت تصاویر غیر استاندارد میاشد باید از فرمت های png jpg'
                },
                tpl: {
                    wrap: '<div class="dropify-wrapper p-2" style="font-family: IRANSans"></div>',
                    loader: '<div class="dropify-loader" style="font-family: IRANSans"></div>',
                    message: '<div class="dropify-message"><span class="file-icon" /> <p style="font-family: IRANSans">تصاویر خود را اینجا بکشید</p></div>',
                    preview: '<div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p style="font-family: IRANSans" class="dropify-infos-message">جایگذین کردن</p></div></div></div>',
                    filename: '<p class="dropify-filename"  style="font-family: IRANSans"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p>',
                    clearButton: '<button type="button" class="dropify-clear" style="font-family: IRANSans">حذف</button>',
                    errorLine: '<p class="dropify-error" style="font-family: IRANSans">خطا</p>',
                    errorsContainer: '<div class="dropify-errors-container" style="font-family: IRANSans"><ul></ul></div>'
                }
            });

        })


        document.querySelector('#my_image0').addEventListener('change', function () {
            if (this.files && this.files[0]) {
                var img0 = document.querySelector('#myImg0');  // $('img')[0]
                img0.src = URL.createObjectURL(this.files[0]); // set src to file url
            }
        });
        document.querySelector('#my_image1').addEventListener('change', function () {
            if (this.files && this.files[0]) {
                var img0 = document.querySelector('#myImg1');  // $('img')[0]
                img0.src = URL.createObjectURL(this.files[0]); // set src to file url
            }
        });
        document.querySelector('#my_image2').addEventListener('change', function () {
            if (this.files && this.files[0]) {
                var img0 = document.querySelector('#myImg2');  // $('img')[0]
                img0.src = URL.createObjectURL(this.files[0]); // set src to file url
            }
        });

        document.querySelector('#my_image3').addEventListener('change', function () {
            if (this.files && this.files[0]) {
                var img0 = document.querySelector('#myImg3');  // $('img')[0]
                img0.src = URL.createObjectURL(this.files[0]); // set src to file url
            }
        });
        document.querySelector('#my_image4').addEventListener('change', function () {
            if (this.files && this.files[0]) {
                var img0 = document.querySelector('#myImg4');  // $('img')[0]
                img0.src = URL.createObjectURL(this.files[0]); // set src to file url
            }
        });

    </script>
@stop
