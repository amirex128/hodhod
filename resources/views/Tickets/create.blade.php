@extends('layouts.app', ['title' => 'سیستم پشتیبانی'])

@section('content')
    @include('users.partials.header', [
        'title' => $ticket->user->name." ".$ticket->user->lname,
        'description' =>$ticket->title,
        'class' => 'col-12'
    ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                    <img src="{{ $ticket->user->avatar?:asset("/upload/noImage.png") }}" class="rounded-circle">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        <div class="d-flex justify-content-between">
{{--                            <a href="#" class="btn btn-sm btn-info mr-4">وضعیت</a>--}}
{{--                            <a href="#" class="btn btn-sm btn-default float-right">بیشتر</a>--}}
                        </div>
                    </div>
                    <div class="card-body pt-0 pt-md-4">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                    <div>
                                        <span class="heading"> {{$ticket->user->id}}</span>
                                        <span class="description">شناسه کاربری</span>
                                    </div>
                                    <div>
                                        <span class="heading">{{$ticket->user->has('ticket')->count()}}</span>
                                        <span class="description">تعداد تیکت ها</span>
                                    </div>

                                    <div>
                                        <span class="heading">{{$ticket->user->has('order')->count()}}</span>
                                        <span class="description">تعداد سفارشات کاربر</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h3>
                                {{  $ticket->user->name." ".$ticket->user->lname }}<span class="font-weight-light"></span>
                            </h3>
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i>{{$ticket->user->phone }}
                            </div>
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i> {{$ticket->user->email}}
                            </div>
                            <div>
                                <i class="ni education_hat mr-2"></i>{{$ticket->user->address}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-8 order-xl-1">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">تیکت ها</h3>
                        </div>
                    </div>
                    <div class="card-body">

{{--                        <div class="text-right -3 mb-3"><h1>{{$ticket->title}}</h1></div>--}}
                        <form class="mb-3" action="{{route('sendComment',$ticket)}}" method="post">
                            @csrf
                            <div class="col-sm-12 text-right mb-4 rtl">
                                <textarea id="summernote" name="editordata"></textarea>


                            </div>
                            <button class="btn btn-block btn-danger">ارسال پاسخ</button>
                        </form>
                        <hr>
                        <div class="row mt-3">
                            @foreach($ticket->comments as $item)
                                @if($item->type=="user")
                                    <div class="col-md-9 col-sm-12 offset-md-3">
                                        <div class="card  rtl mb-5">
                                            <div class="card-header">
                                                <div class="row">
                                                    <div class="col-6 text-right">{{$item->user->name.' '.$item->user->lname}}</div>
                                                    <div class="col-6">{{\Morilog\Jalali\Jalalian::forge($item->created_at)->ago()}}</div>
                                                </div>
                                            </div>
                                            <div class="card-body text-right ">{{$item->comment}}</div>
                                        </div>
                                    </div>
                                @endif
                                @if($item->type=="admin")
                                    <div class="col-md-9">
                                        <div class="card  rtl mb-5">
                                            <div class="card-header bg-primary text-white">
                                                <div class="row">
                                                    <div class="col-6 text-right">{{$item->user->name.' '.$item->user->lname}}</div>
                                                    <div class="col-6">{{\Morilog\Jalali\Jalalian::forge($item->created_at)->ago()}}</div>
                                                </div>
                                            </div>
                                            <div class="card-body text-right ">{!! $item->comment !!}</div>
                                        </div>
                                    </div>
                                @endif

                            @endforeach
                        </div>


                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
@section('style')

    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.css" rel="stylesheet">


@stop
@section('script')

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

        })


    </script>
@stop
