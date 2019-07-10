@extends('layouts.app', ['title' => 'مدیریت محصولات'])

@section('content')
    @include('users.partials.header', ['title' => 'ایجاد محصول '])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">

                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">مشخصات محصول</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('product.index') }}"
                                   class="btn btn-sm btn-primary">بازگشت</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        @errors

                        <form method="post" action="{{ route('product.store') }}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="nav-wrapper">
                                <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text"
                                    role="tablist">
                                    {{-----------------------------------------------------------------}}

                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab"
                                           data-toggle="tab" href="#tabs-icons-text-1" role="tab"
                                           aria-controls="tabs-icons-text-1" aria-selected="true"><i
                                                    class="ni ni-cloud-upload-96 mr-2"></i>اطلاعات محصول</a>
                                    </li>
                                    {{-----------------------------------------------------------------}}

                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab"
                                           data-toggle="tab" href="#tabs-icons-text-2" role="tab"
                                           aria-controls="tabs-icons-text-2" aria-selected="false"><i
                                                    class="ni ni-bell-55 mr-2"></i>مقادیر محصول</a>
                                    </li>
                                    {{-----------------------------------------------------------------}}

                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab"
                                           data-toggle="tab" href="#tabs-icons-text-3" role="tab"
                                           aria-controls="tabs-icons-text-3" aria-selected="false"><i
                                                    class="ni ni-calendar-grid-58 mr-2"></i>مشخصات محصول</a>
                                    </li>
                                    {{-----------------------------------------------------------------}}

                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-4-tab"
                                           data-toggle="tab" href="#tabs-icons-text-4" role="tab"
                                           aria-controls="tabs-icons-text-3" aria-selected="false"><i
                                                    class="ni ni-calendar-grid-58 mr-2"></i>تصاویر محصول</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="tab-content" id="myTabContent">
                                        {{-----------------------------------------------------------------}}

                                        <div class="tab-pane fade show active" id="tabs-icons-text-1"
                                             role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">

                                            <div class="row rtl">
                                                <div class="col-sm-12">

                                                    <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                                        <p class="form-control-label text-right">عنوان
                                                            محصول :</p>
                                                        <input type="text" name="title" id="input-title"
                                                               class="form-control form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                                               placeholder="عنوان محصول را وارد نمایید..."
                                                               value="{{ old('title') }}"
                                                        >
                                                        <small id="title" class="form-text text-muted">
                                                            عنوان محصول باید بین 100
                                                            تا 255 کارکتر باشد .
                                                        </small>
                                                        @if ($errors->has('title'))
                                                            <span class="invalid-feedback" role="alert">
																						                                                                                             </span>
                                                        @endif
                                                    </div>

                                                </div>
                                                <div class="col-sm-12">


                                                    <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                                        <p class="form-control-label text-right">توضیحات
                                                            محصول :</p>
                                                        <input type="text" name="description"
                                                               id="input-description"
                                                               class="form-control form-control-alternative{{ $errors->has('description') ? ' is-invalid' : '' }}"
                                                               placeholder="توضیحات محصول را وارد نمایید..."
                                                               value="{{ old('description') }}"
                                                        >
                                                        <small id="title" class="form-text text-muted">
                                                            توضیحات محصول باید بین 100
                                                            تا 255 کارکتر باشد .
                                                        </small>
                                                        @if ($errors->has('description'))
                                                            <span class="invalid-feedback" role="alert">
																						                                                                                             </span>
                                                        @endif
                                                    </div>


                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group{{ $errors->has('body') ? ' has-danger' : '' }}">
                                                        <p class="form-control-label text-right">متن معرفی
                                                            محصول :</p>
                                                        <div class="col-sm-12 text-right">
															<textarea id="summernote"
                                                                      name="editordata">{{old('editordata')}}</textarea>

                                                        </div>
                                                        <small id="title" class="form-text text-muted">متن
                                                            محصول باید بین 500
                                                            تا 5000 کارکتر باشد .
                                                        </small>
                                                        @if ($errors->has('body'))
                                                            <span class="invalid-feedback" role="alert">
																						                                                                                             </span>
                                                        @endif
                                                    </div>


                                                </div>
                                                <div class="col-sm-12">
                                                    <a onclick="document.getElementById('tabs-icons-text-2-tab').click()"
                                                       class=" btn btn-outline-info btn-block">بعدی</a>
                                                </div>
                                            </div>

                                        </div>
                                        {{-----------------------------------------------------------------}}

                                        <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel"
                                             aria-labelledby="tabs-icons-text-2-tab">
                                            <div class="row rtl">
                                                <div class="col-sm-6">

                                                    <div class="form-group{{ $errors->has('price') ? ' has-danger' : '' }}">
                                                        <p class="form-control-label text-right">قیمت
                                                            محصول :</p>
                                                        <input type="number" name="price" id="input-price"
                                                               class="form-control form-control-alternative{{ $errors->has('price') ? ' is-invalid' : '' }}"
                                                               placeholder="قیمت محصول را وارد نمایید..."
                                                               value="{{ old('price') }}"
                                                        >
                                                        @if ($errors->has('price'))
                                                            <span class="invalid-feedback" role="alert">
																						                                                                                             </span>
                                                        @endif
                                                    </div>

                                                </div>
                                                <div class="col-sm-6">


                                                    <div class="form-group{{ $errors->has('offer') ? ' has-danger' : '' }}">
                                                        <p class="form-control-label text-right"> قیمت با احتساب تخفیف
                                                            :</p>
                                                        <input type="number" name="offer" id="input-offer"
                                                               class="form-control form-control-alternative{{ $errors->has('offer') ? ' is-invalid' : '' }}"
                                                               placeholder="تخفیف محصول را وارد نمایید..."
                                                               value="{{ old('offer') }}"
                                                        >
                                                        @if ($errors->has('offer'))
                                                            <span class="invalid-feedback" role="alert">
																						                                                                                             </span>
                                                        @endif
                                                    </div>


                                                </div>
                                                <div class="col-sm-6">

                                                    <div class="form-group{{ $errors->has('stock') ? ' has-danger' : '' }}">
                                                        <p class="form-control-label text-right">موجودی
                                                            محصول :</p>
                                                        <input type="number" name="stock" id="input-stoke"
                                                               class="form-control form-control-alternative{{ $errors->has('stoke') ? ' is-invalid' : '' }}"
                                                               placeholder="موجودی محصول را وارد نمایید..."
                                                               value="{{ old("stock") }}"
                                                        >
                                                        @if ($errors->has('stoke'))
                                                            <span class="invalid-feedback" role="alert">
																						                                                                                             </span>
                                                        @endif
                                                    </div>


                                                </div>
                                                <div class="col-sm-3">

                                                    <p class="form-control-label text-right">محصول ویژه
                                                        باشد ؟</p>
                                                    <label class="custom-toggle">
                                                        <input name="special" value="true" type="checkbox">
                                                        <span class="custom-toggle-slider rounded-circle"></span>
                                                    </label>


                                                </div>
                                                <div class="col-sm-3">

                                                    <p class="form-control-label text-right">وضعیت محصول
                                                        :</p>
                                                    <label class="custom-toggle">
                                                        <input name="status" checked value="true" type="checkbox">

                                                        <span class="custom-toggle-slider rounded-circle"></span>
                                                    </label>


                                                </div>
                                                <div class="col-sm-6">
                                                    <div
                                                            class="form-group{{ $errors->has('situation') ? ' has-danger' : '' }}">
                                                        <p class="form-control-label text-right">لیبل محصول :</p>
                                                        <select name="situation"
                                                                class="custom-select form-control form-control-alternative{{ $errors->has('situation') ? ' is-invalid' : '' }}">
                                                            <option {{old('situation')==0?"selected":""}}  value="0">
                                                                موجود
                                                            </option>
                                                            <option {{old('situation')==1?"selected":""}} value="1">
                                                                توقف تولید
                                                            </option>
                                                            <option {{old('situation')==2?"selected":""}} value="2">
                                                                بزودی
                                                            </option>
                                                            <option {{old('situation')==3?"selected":""}} value="3">
                                                                ناموجود
                                                            </option>
                                                        </select>

                                                        @if ($errors->has('situation'))
                                                            <span class="invalid-feedback"
                                                                  role="alert">
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="col-sm-12">
                                                        <div class="rtl text-right form-group{{ $errors->has('categories') ? ' has-danger' : '' }}">
                                                            <p class="form-control-label text-right">دسته بندی  :</p>

                                                            <select multiple class="demo form-control" name="categories[]" id="">
                                                                @foreach($categories as $category)
                                                                    <option

                                                                            @if (!empty(old('categories')))
                                                                            @foreach (old('categories') as $categories_old)
                                                                            {{$categories_old==$category->id?"selected":""}}
                                                                            @endforeach
                                                                            @endif

                                                                            value="{{$category->id}}">{{$category->name}}</option>
                                                                    @if(count($category->childrenRecursive)>0)
                                                                        @include("Products.partials.row",["categories"=>$category->childrenRecursive,"old"=>old("categories"),"level"=>1])
                                                                    @endif
                                                                @endforeach

                                                            </select>

                                                            @if ($errors->has('categories'))
                                                                <span class="invalid-feedback" role="alert"> </span>
                                                            @endif

                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="col-sm-12">
                                                <a onclick="document.getElementById('tabs-icons-text-3-tab').click()"
                                                   class="btn btn-outline-info btn-block">بعدی</a>
                                            </div>
                                        </div>
                                        {{-----------------------------------------------------------------}}

                                        <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel"
                                             aria-labelledby="tabs-icons-text-3-tab">
                                            <div class="row rtl text-right">
                                                <div class="col-sm-12">
                                                    <label class="text-bold" for="">رنگ های محصول خود را
                                                        انتخاب نمایید :</label>
                                                    <div class="form-group">
                                                        <select name="colors[]" class="demo w-100 " multiple="multiple">
                                                            @foreach($colors as $color)
                                                                <option
                                                                        @if (!empty(old('colors')))
                                                                        @foreach (old('colors') as $color_old)
                                                                        {{$color_old==$color->id?"selected":""}}
                                                                        @endforeach
                                                                        @endif
                                                                        value="{{$color->id}}">{{$color->title}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <label class="text-bold" for="">طرح های محصول خود را
                                                        انتخاب نمایید :</label>
                                                    <div class="form-group">
                                                        <select name="designs[]" class="demo w-100 "
                                                                style="" multiple="multiple">

                                                            @foreach($designs as $design)
                                                                <option

                                                                        @if (!empty(old('designs')))
                                                                        @foreach (old('designs') as $design_old)
                                                                        {{$design_old==$design->id?"selected":""}}
                                                                        @endforeach
                                                                        @endif


                                                                        value="{{$design->id}}">{{$design->title}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <label class="text-bold" for="">سایز های محصول خود را
                                                        انتخاب نمایید :</label>
                                                    <div class="form-group">
                                                        <select name="sizes[]" class="demo w-100 "
                                                                style="" multiple="multiple">
                                                            @foreach($sizes as $size)
                                                                <option
                                                                        @if (!empty(old('sizes')))
                                                                        @foreach (old('sizes') as $size_old)
                                                                        {{$size_old==$size->id?"selected":""}}
                                                                        @endforeach
                                                                        @endif

                                                                        value="{{$size->id}}">{{$size->title}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <label class="text-bold" for="">برند محصول خود را
                                                        انتخاب نمایید :</label>
                                                    <div class="form-group">
                                                        <select name="brand" class="demo w-100 " style="">
                                                            @foreach($brands as $brand)
                                                                <option {{old('brand')==$brand->id?"selected":""}}
                                                                        value="{{$brand->id}}">{{$brand->title}}</option>

                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <label class="text-bold" for=""> محصولات مرتبط خود را
                                                        انتخاب نمایید :</label>
                                                    <select name="related[]" class="my-select" multiple="multiple">

                                                        @foreach ($products as $item)
                                                            <option

                                                                    @if (!empty(old('related')))
                                                                    @foreach (old('related') as $related_old)
                                                                    {{$related_old==$item->id?"selected":""}}
                                                                    @endforeach
                                                                    @endif

                                                                    data-img-src="/{{$item->image}}"
                                                                    value="{{$item->id}}">{{$item->title}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>

                                                <div class="col-sm-12">
                                                    <a onclick="document.getElementById('tabs-icons-text-4-tab').click()"
                                                       class="btn btn-outline-info btn-block">بعدی</a>
                                                </div>
                                            </div>
                                        </div>

                                        {{-----------------------------------------------------------------}}

                                        <div class="tab-pane fade" id="tabs-icons-text-4" role="tabpanel"
                                             aria-labelledby="tabs-icons-text-4-tab">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group{{ $errors->has('image') ? ' has-danger' : '' }}">
                                                        <p class="form-control-label text-right">تصویر
                                                            شاخص محصول :</p>
                                                        <input type="file"
                                                               name="image"
                                                               data-max-file-size="1M"
                                                               data-min-width="100"
                                                               data-max-width="700"
                                                               data-min-height="100"
                                                               data-max-height="700"
                                                               class="dropify-image"
                                                        >

                                                        @if ($errors->has('image'))
                                                            <span class="invalid-feedback" role="alert">
                                        									                                                     </span>
                                                        @endif
                                                    </div>
                                                    <hr>
                                                </div>

                                                <div class="col-sm-12">
                                                    <p class="form-control-label text-right">انتخاب گالری
                                                        محصول :</p>

                                                    <div id="imagee">

                                                    </div>

                                                </div>

                                                <div class="col-sm-6">
                                                    <a id="add-image"
                                                       class="mt-4 btn btn-block btn-success text-white ">افزودن
                                                        تصویر</a>
                                                </div>

                                                <div class="col-sm-6 mb-5">
                                                    <a id="remove-image"
                                                       class="mt-4 btn btn-block btn-danger text-white ">حذف
                                                        تصویر</a>
                                                </div>

                                                <div class="col-sm-12">
                                                    <input type="submit"
                                                           class="btn btn-outline-info btn-block"
                                                           value="ذخیره">

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footers.auth')
@endsection
@section('style')

    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
    <link rel="stylesheet" href="{{asset('css/fSelect.css')}}">
    <link rel="stylesheet" href="{{asset('chosen/chosen.min.css')}}">
    <link rel="stylesheet" href="{{asset('Flat.css')}}">
    <link rel="stylesheet" href="{{asset('chosen/ImageSelect.css')}}">
    <style>
        html {
            overflow: scroll;
            overflow-x: hidden;
        }

        ::-webkit-scrollbar {
            width: 0px; /* Remove scrollbar space */
            background: transparent; /* Optional: just make scrollbar invisible */
        }

        /* Optional: show position indicator in red */
        ::-webkit-scrollbar-thumb {
            background: #FF0000;
        }
    </style>
@stop
@section('script')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.js"></script>
    <script src="{{asset('chosen/chosen.jquery.min.js')}}"></script>
    <script src="{{asset('chosen/chosen.proto.min.js')}}"></script>
    <script src="{{asset('chosen/ImageSelect.jquery.js')}}"></script>
    <script>


        $(document).ready(function () {
            $(".my-select").chosen({
                width: "100%",
                rtl: true,
                html_template: '{text} <img style="border-radius: 7px;padding:0px;margin-right:4px;    float: right;"  class="{class_name}" src="{url}" />'
            });

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

            $('#remove-image').click(function () {
                $('#imagee > :last-child').remove();
            })

            $('#add-image').click(function () {

                var item = "<input type=\"file\" name=\"Gallery[]\" \t  \n" +
                    "\t\t\t\t\t\t\t\t\t\t\t\t\t\t       data-max-file-size=\"1M\"\n" +
                    "\t\t\t\t\t\t\t\t\t\t\t\t\t\t       data-min-width=\"260\"\n" +
                    "\t\t\t\t\t\t\t\t\t\t\t\t\t\t       data-max-width=\"1050\"\n" +
                    "\t\t\t\t\t\t\t\t\t\t\t\t\t\t       data-min-height=\"260\"\n" +
                    "\t\t\t\t\t\t\t\t\t\t\t\t\t\t       data-max-height=\"1050\"\n" +
                    "\t\t\t\t\t\t\t\t\t\t\t\t\t\t      class=\"dropify dropify\" />";

                $('#imagee').append(item);
                $('.dropify').dropify({
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

            });


            $('#summernote').summernote({
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
            $('.demo').fSelect();

        })


    </script>
@stop
