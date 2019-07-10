@extends('layouts.app', ['title' => 'مدیریت شبکه های اجتماعی '])

@section('content')
    @include('users.partials.header', ['title' => 'ویرایش شبکه های اجتماعی'])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">مدیریت شبکه های اجتماعی </h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('social.index') }}" class="btn btn-sm btn-primary">بازگشت</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('social.update',$social) }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <h6 class="heading-small text-muted mb-4">اطلاعات شبکه های اجتماعی</h6>
                            <div id="social" class="pl-lg-4">
                                <div class="row rtl">
                                    <div class="col-sm-12">
                                        <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                            <p class="form-control-label text-right">عنوان شبکه های اجتماعی :</p>
                                            <input type="text" name="title" id="input-name"
                                                   class="form-control form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                                   placeholder="عنوان شبکه های اجتماعی را وارد نمایید..."
                                                   value="{{ old('title',$social->title) }}" required autofocus>

                                            @if ($errors->has('title'))
                                                <span class="invalid-feedback" role="alert">
                                                                                             </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group{{ $errors->has('url') ? ' has-danger' : '' }}">
                                            <p class="form-control-label text-right">آدرس لینک شبکه های اجتماعی :</p>
                                            <input type="text" name="url" id="input-url"
                                                   class="form-control form-control-alternative{{ $errors->has('url') ? ' is-invalid' : '' }}"
                                                   placeholder="آدرس لینک  شبکه های اجتماعی را وارد نمایید..."
                                                   value="{{ old('title',$social->url) }}" required>

                                            @if ($errors->has('url'))
                                                <span class="invalid-feedback" role="alert">
                                                                                             </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-sm-12 mb-4 mt-4">

                                        <div class="form-group{{ $errors->has('icon') ? ' has-danger' : '' }}">
                                            <p class="form-control-label text-right">تصویر شبکه های اجتماعی :</p>
                                            <input type="file"
                                                   name="image"
                                                   data-min-width="100"
                                                   data-max-width="700"

                                                   data-min-height="100"
                                                   data-max-height="600"
                                                   data-default-file="{{request()->root()}}/{{$social->image}}"
                                                   class="dropify-icon"
                                            >
                                            <input type="hidden" value="{{$social->image}}" name="image2">
                                            @if ($errors->has('icon'))
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


    <script>
        $(document).ready(function () {

            $('.dropify-icon').dropify({
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
    </script>

@stop
