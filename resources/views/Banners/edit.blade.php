@extends('layouts.app', ['title' => 'مدیریت بنر ها'])

@section('content')
    <div id="var" style="opacity: 0">{{$banner->type[0]}}</div>

    @include('users.partials.header', ['title' => 'افزودن بنر'])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secon  dary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">مدیریت بنر ها</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('banner.index') }}" class="btn btn-sm btn-primary">بازگشت</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('banner.update',$banner) }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">اطلاعات بنر</h6>
                            @errors()

                            <div id="banner" class="pl-lg-4">
                                <div class="row rtl">


                                    <div class="col-sm-12">
                                        <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                            <p class="form-control-label text-right">عنوان بنر :</p>
                                            <input type="text" name="title" id="input-name"
                                                   class="form-control form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                                   placeholder="عنوان بنر را وارد نمایید..."
                                                   value="{{ old('title',$banner->title) }}" required autofocus>

                                            @if ($errors->has('title'))
                                                <span class="invalid-feedback" role="alert">
                                                                                             </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <p class="form-control-label text-right">وضعیت نمایش بنر
                                            :</p>
                                        <label class="custom-toggle">
                                            <input type="checkbox" name="status" value="true" {{$banner->status==1?"checked":""}}>
                                            <span class="custom-toggle-slider rounded-circle"></span>
                                        </label>
                                    </div>
                                    <div class="col-sm-3">
                                        <p class="form-control-label text-right">نوع بنر :</p>
                                        <div class="custom-control custom-radio mb-3">
                                            <input v-model="type" value="1" name="type"
                                                   class="custom-control-input" id="type1"
                                                   type="radio">
                                            <label class="custom-control-label"
                                                   for="type1">محصول</label>
                                        </div>
                                        <div class="custom-control custom-radio mb-3">
                                            <input v-model="type" value="2" name="type"
                                                   class="custom-control-input" id="type2"
                                                   checked="" type="radio">
                                            <label class="custom-control-label" for="type2">دسته
                                                بندی</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">

                                        <div v-if="type==1" class="form-group{{ $errors->has('select') ? ' has-danger' : '' }}">
                                            <p class="form-control-label text-right">انتخاب
                                                محصول :</p>
                                            <select name="select"
                                                    class="custom-select form-control form-control-alternative{{ $errors->has('parent') ? ' is-invalid' : '' }}">
                                                @foreach($products as $product)

                                                    <option {{$product->id==$banner->select[0]?"selected":""}} value="{{$product->id}}">{{$product->title}} </option>
                                                @endforeach
                                            </select>

                                            @if ($errors->has('parent'))
                                                <span class="invalid-feedback" role="alert">
                                                     </span>
                                            @endif
                                        </div>




                                        <div v-if="type==2" class="form-group{{ $errors->has('parent') ? ' has-danger' : '' }}">
                                            <p class="form-control-label text-right">انتخاب
                                                دسته بندی :</p>
                                            @category(['name'=>'select','items'=>$banner->select])
                                            @if ($errors->has('parent'))
                                                <span class="invalid-feedback" role="alert">
                                                     </span>
                                            @endif
                                        </div>



                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <p class="form-control-label text-right">انتخاب
                                            جایگاه بنر :</p>
                                        <select name="position"
                                                class="custom-select form-control form-control-alternative">

                                            <option {{$banner->position==1?"selected":""}} value="1">جایگاه اول </option>
                                            <option {{$banner->position==2?"selected":""}} value="2">جایگاه دوم </option>
                                            <option {{$banner->position==3?"selected":""}} value="3">جایگاه سوم </option>
                                            <option {{$banner->position==4?"selected":""}} value="4">جایگاه چهارم </option>

                                        </select>

                                    </div>
                                    <div class="col-sm-6 ">
                                        <p class="form-control-label text-right">انتخاب
                                            اولویت بنر :</p>
                                        <input type="number" name="priority" value="{{old('priority',$banner->priority)}}"  class="form-control form-control-alternative">

                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group{{ $errors->has('image') ? ' has-danger' : '' }}">
                                            <p class="form-control-label text-right">تصویر بنر :</p>
                                            <input type="file"
                                                   data-default-file="/{{$banner->image1}}"
                                                   name="image"
                                                   data-min-width="100"
                                                   data-max-width="700"

                                                   data-min-height="100"
                                                   data-max-height="600"
                                                   class="dropify-image"
                                            >

                                            @if ($errors->has('image'))
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
            el: "#banner",
            data: {
                type:'1',
                side:'1'
            },
            methods: {},
            created() {
                this.type = document.getElementById('var').innerText;
            }
        })
    </script>
@stop
