@extends('layouts.app', ['title' => 'مدیریت مقالات'])

@section('content')
    @include('users.partials.header', ['title' => 'افزودن مقاله'])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">مقاله</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('article.index') }}" class="btn btn-sm btn-primary">بازگشت</a>
                            </div>
                        </div>
                    </div>
                    @errors()
                    <div id="article" class="card-body">
                        <form method="post" action="{{ route('article.store') }}" autocomplete="off"
                              enctype="multipart/form-data">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">اطلاعات مقاله</h6>
                            <div class="pl-lg-4">


                                <div class="row rtl">
                                    <div class="col-sm-12">
                                        <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                            <p class="form-control-label text-right">عنوان مقاله :</p>
                                            <input type="text" name="title" id="input-name"
                                                   class="form-control form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                                   placeholder="عنوان مقاله را وارد نمایید..."
                                                   value="{{ old('title') }}" required autofocus>

                                            @if ($errors->has('title'))
                                                <span class="invalid-feedback" role="alert">
                                        									                                                                                             </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                            <p class="form-control-label text-right">توضیحات مقاله :</p>
                                            <input type="text" name="description" id="input-name"
                                                   class="form-control form-control-alternative{{ $errors->has('description') ? ' is-invalid' : '' }}"
                                                   placeholder="توضیحات مقاله را وارد نمایید..."
                                                   value="{{ old('description') }}" required autofocus>

                                            @if ($errors->has('description'))
                                                <span class="invalid-feedback" role="alert">
                                        									                                                                                             </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="rtl text-right form-group{{ $errors->has('category_parent') ? ' has-danger' : '' }}">
                                            <p class="form-control-label text-right">دسته بندی  :</p>

                                            <select class="demo form-control" name="parent" id="">

                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @if(count($category->childrenRecursiveArticle)>0)
                                                        @include("Articles.partials.row",["categories"=>$category->childrenRecursiveArticle,'article'=>isset($article)?:"","level"=>1])
                                                    @endif
                                                @endforeach

                                            </select>

                                            @if ($errors->has('category_parent'))
                                                <span class="invalid-feedback" role="alert"> </span>
                                            @endif

                                        </div>
                                    </div>

                                    <div class="col-sm-12 text-right">
                                        <textarea id="summernote" name="editordata"></textarea>

                                    </div>
                                    <div class="col-sm-12">
                                        <p class="form-control-label text-right">تصویر شاخص مقاله :</p>
                                        <input type="file"
                                               name="image"
                                               data-min-width="100"
                                               data-max-width="700"

                                               data-min-height="100"
                                               data-max-height="600"
                                               class="dropify-image"
                                        >


                                    </div>

                                </div>
                                <div class="col-sm-12 mt-3" dir="ltr">
                                    <button class="btn btn-outline-info btn-block">ذخیره</button>
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


    </script>
@stop


