@extends('layouts.app', ['title' => 'مدیریت سایز ها'])

@section('content')
    @include('users.partials.header', ['title' => 'افزودن سایز'])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">مدیریت سایز ها</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('size.index') }}" class="btn btn-sm btn-primary">بازگشت</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('size.store') }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">اطلاعات سایز</h6>
                            <div id="size" class="pl-lg-4">
                                <div class="row rtl">
                                    <div class="col-sm-12">
                                        <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                            <p class="form-control-label text-right">عنوان سایز :</p>
                                            <input type="text" name="title" id="input-name"
                                                   class="form-control form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                                   placeholder="عنوان سایز را وارد نمایید..."
                                                   value="{{ old('title') }}" required autofocus>

                                            @if ($errors->has('title'))
                                                <span class="invalid-feedback" role="alert">
                                                                                             </span>
                                            @endif
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
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.8/dist/vue.js"></script>

    <script>
        //////////////////////////////////////////image/////////////////////////////////////////////////////////
        $(document).ready(function () {

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

        new Vue({
            el: "#size",
            data: {
                type:'1'
            },
            methods: {}
        })
    </script>
@stop
