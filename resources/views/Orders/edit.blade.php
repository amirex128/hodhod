@extends('layouts.app', ['title' =>'مدیریت سفارشات ها'])
@php
    $order->visit=1;
    $order->save();
@endphp
@section('content')
    @include('layouts.headers.cards')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-12 d-flex justify-content-between">
                                <div class="">
                                    <img width="100px" height="100px" class="circle" src="/{{$order->user->avatar}}"
                                         alt="">
                                </div>
                                <h3 class=" d-flex flex-column justify-content-between">
                                    <span style="font-size: 25px" class="badge badge-info p-2">
                                                                              سفارش : {{$order->user->name." ".$order->user->lname}}

                                    </span>
                                    <span class="badge badge-danger  p-2">
                                        کد سفارش : {{$order->id}}


                                    </span>

                                </h3>

                            </div>

                        </div>
                    </div>
                    <hr>
                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>

                    <div class="container">
                        <form action="{{route('order.update',$order)}}" method="post">
                            @csrf
                            @method('put')
                            <ul class="list-group mb-4 rtl text-right">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{$order->receiver_name}}
                                    <span class="badge badge-primary badge-pill">نام گیرنده </span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{$order->address}}
                                    <span class="badge badge-primary badge-pill">آدرس گیرنده</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        {{$order->receiver_mobile}}
                                    </div>
                                    <span class="badge badge-primary badge-pill"> تلفن گیرنده</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        {{$order->home_phone}}<span
                                                class="badge badge-danger">{{$order->code_phone}} </span>

                                    </div>
                                    <span class="badge badge-primary badge-pill">تلفن منزل</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    @if ($order->surprize == true)
                                        <span class="badge badge-success">درخواست سورپرایز دارد </span>
                                    @else
                                        <span class="badge badge-danger">درخواست سورپرایز ندارد </span>

                                    @endif
                                    <span class="badge badge-primary badge-pill">وضعیت سورپرایز</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                      <span
                                              class="badge badge-danger"> {{$order->postal_code}}</span>

                                    </div>
                                    <span class="badge badge-primary badge-pill">کد پستی</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{$order->user->email}}
                                    <span class="badge badge-primary badge-pill">ایمیل</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{$order->province->name}} --- {{$order->city}}
                                    <span class="badge badge-primary badge-pill">استان و شهر</span>
                                </li>

                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <select class="form-control" name="status" id="">
                                            <option {{$order->status==0?"selected":""}} value="0">پرداخت نشده</option>
                                            <option {{$order->status==1?"selected":""}} value="1">در انتظار پرداخت
                                            </option>
                                            <option {{$order->status==2?"selected":""}} value="2">پرداخت شده</option>
                                            <option {{$order->status==3?"selected":""}} value="3">درحال بررسی</option>
                                            <option {{$order->status==4?"selected":""}} value="4">درحال بسته بندی
                                            </option>
                                            <option {{$order->status==5?"selected":""}} value="5">درحال ارسال</option>
                                            <option {{$order->status==6?"selected":""}} value="6">ارسال شده</option>
                                            <option {{$order->status==7?"selected":""}} value="7">لغو ارسال</option>
                                        </select>
                                    </div>

                                    <span class="badge badge-primary badge-pill">وضعیت سفارش</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        @if ($order->payment_status==0)
                                            پرداخت نشده
                                        @elseif ($order->payment_status==1)
                                            ارسال شده به درگاه و در انتظار پرداخت
                                        @elseif ($order->payment_status==2)
                                            خطا در هنگام ارسال به درگاه
                                        @elseif ($order->payment_status==3)
                                            پرداخت شده
                                        @elseif ($order->payment_status==4)
                                            خطا در پرداخت
                                        @elseif ($order->payment_status==5)
                                            پرداخت موقتا کنسل شده
                                        @endif
                                    </div>
                                    <span class="badge badge-primary badge-pill">وضعیت پرداخت</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        @if ($order->state==1)
                                            <span class="badge badge-info">درگاه پرداخت آنلاین </span>
                                        @else
                                            <span class="badge badge-success">پرداخت نقدی </span>
                                        @endif

                                    </div>
                                    <span class="badge badge-primary badge-pill">حالت پرداخت</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        @if ($order->time_receive==1)
                                            <span class="badge badge-info">سفارش در تایم مشتری ارسال شود </span>
                                        @else
                                            <span class="badge badge-success">در تایم عادی ارسال شود </span>
                                        @endif

                                    </div>
                                    <span class="badge badge-primary badge-pill">ارسال در زمان مقرر</span>
                                </li>

                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        {{$order->province->price}} <span class="badge badge-danger">تومان </span>
                                    </div>
                                    <span class="badge badge-primary badge-pill">هزینه حمل ونقل</span>
                                </li>
                                @if($order->time_receive==1)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div>
                                            <span class="badge badge-info">{{isset($order->receive_at)?date_fa($order->receive_at):"زمانی تنظیم نشده"}} </span>

                                        </div>
                                        <span class="badge badge-primary badge-pill">زمان ارسال سفارش مشتری</span>
                                    </li>
                                @endif
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        {{$order->total_raw}} <span class="badge badge-danger">تومان </span>

                                    </div>
                                    <span class="badge badge-primary badge-pill">جمع کل قیمت اجناس بدون تخفیف</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        {{$order->province->price}} <span class="badge badge-danger">تومان </span>
                                    </div>
                                    <span class="badge badge-primary badge-pill">هزینه حمل ونقل</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        {{$order->discount_price}} <span class="badge badge-danger">تومان </span>

                                    </div>
                                    <span class="badge badge-primary badge-pill">مبلغ کسر شده توسط تخفیف</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        {{$order->total_price}} <span class="badge badge-danger">تومان </span>

                                    </div>
                                    <span class="badge badge-primary badge-pill">مبلغ نهایی سفارش</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="form-control w-75" rows="3">{{$order->user_description}}</div>
                                    <span class="badge badge-primary badge-pill ">توضیحات کاربر</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <textarea id="admin_description" class="form-control w-75"
                                              rows="3">{{$order->admin_description}}</textarea>
                                    <span class="badge badge-primary badge-pill">توضیحات مدیر</span>
                                </li>
                            </ul>

                            <div class="list-group">

                                @foreach($order->order_item as $item)
                                    @can('read-product',$item->product)
                                        <a class="list-group-item list-group-item-action">
                                            <div class="d-flex w-100 justify-content-between">
                                                <div class="d-flex flex-column justify-content-between">
                                                    <h5 class="mb-1">{{$item->product->title}}</h5>
                                                    <small>{{$item->description}}</small>
                                                    <p class="mb-1"><span class="badge badge-danger">تومان </span>
                                                        <span>{{$item->product->price}}</span></p>
                                                </div>
                                                <div class="d-flex flex-column justify-content-between">
                                                    <div>
                                                        <span>تعداد :</span> <span
                                                                class="badge badge-info">{{$item->count}}</span>
                                                    </div>
                                                    <div>
                                                        <span>رنگ :</span> <span
                                                                class="badge badge-info">{{$item->color->title}}</span>
                                                        <span
                                                                class="btn"
                                                                style="background: {{$item->color->code}};"></span>

                                                    </div>
                                                    <div>
                                                        <span>سایز :</span> <span
                                                                class="badge badge-info">{{$item->size->title}}</span>

                                                    </div>
                                                </div>
                                                <div class="d-flex flex-column justify-content-between ">
                                                    {{--                                            <small class="m-2 badge">3 days ago</small>--}}
                                                    <img class="img-thumbnail" width="100px" height="100px"
                                                         src="/{{$item->product->image}}" alt="">

                                                </div>

                                            </div>

                                        </a>

                                    @endcan

                                @endforeach

                            </div>

                            <div class="my-5" id="map"></div>

                            <div class=" mt-4">
                                <button class="btn btn-outline-info btn-block">ذخیره اطلاعات</button>

                            </div>
                        </form>
                    </div>
                    <div class="card-footer py-4">

                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>


@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('chosen/map/css/s.map.min.css')}}">
    <link rel="stylesheet" href="{{asset('chosen/map/css/fa/style.css')}}">
    <style>
        #map {
            width: 100%;
            height: 500px;
        }
    </style>
@stop
@section('script')
    <script src="{{asset('chosen/map/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('chosen/map/js/jquery.env.js')}}"></script>
    <script src="{{asset('chosen/map/js/s.map.styles.js')}}"></script>
    <script src="{{asset('chosen/map/js/s.map.min.js')}}"></script>
    <script src="{{asset('js/map.js')}}"></script>
    <script>

        $(document).ready(function () {

            var map = $.sMap({
                element: '#map',
                presets: {
                    latlng: {
                        lat: 36.312545,
                        lng: 59.589440,
                    },
                    zoom: 12,
                },
                before: function () {
                    console.log('Before');
                },
                after: function () {
                    console.log('After');
                },
            });

            $.sMap.layers.static.build({
                layers: {
                    base: {
                        default: {
                            server: 'https://map.ir/shiveh',
                            layers: 'Shiveh:ShivehGSLD256',
                            format: 'image/png',
                        },
                    },
                },
            });

            $.sMap.logo.implement({
                url: env.url.domain + '/laravel-1.am/public/hod-hod-finally-logo.png',
            });

            $.sMap.logo.implement();
            $.sMap.zoomControl.implement();
            $.sMap.fullscreen.implement();
            $.sMap.userLocation.implement();

            $.sMap.features();

            $.sMap.features.polygon.create({
                name: 'one-polygon',
                popup: {
                    title: {
                        html: 'منطقه شماره یک',
                        i18n: '',
                    },
                    description: {
                        html: '',
                        i18n: '',
                    },
                },
                "coordinates": [
                    [

                        36.42694562164071
                        , 59.477405548095696],
                    [

                        36.359927919534485
                        , 59.40788269042969],
                    [

                        36.34043358406298
                        , 59.460411071777344],
                    [

                        36.35094177557743
                        , 59.46556091308593],
                    [

                        36.35733586908682
                        , 59.47495937347412],
                    [

                        36.35999703969807
                        , 59.48015213012695],
                    [

                        36.36262356042648
                        , 59.48650360107422],
                    [

                        36.365872029229976
                        , 59.492168426513665],
                    [

                        36.37720604965197
                        , 59.507789611816406],
                    [

                        36.38121402745713
                        , 59.51637268066406],
                    [

                        36.3834252371399
                        , 59.520320892333984],
                    [

                        36.37043347989971
                        , 59.5326805114746],
                    [

                        36.363245618141725
                        , 59.53731536865235],
                    [

                        36.357024817232166
                        , 59.54126358032227],
                    [

                        36.34872964257773
                        , 59.546070098876946],
                    [

                        36.34568785707743
                        , 59.54782962799073],
                    [

                        36.348764207639206
                        , 59.56795692443848],
                    [

                        36.349904846059765
                        , 59.574136734008796],
                    [

                        36.348902467731726
                        , 59.57958698272705],
                    [

                        36.39752022072802
                        , 59.57954406738281],
                    [

                        36.42694562164071
                        , 59.47800636291503]
                ],
                popupOpen: true,
            });

            $.sMap.features.polygon.create({
                name: 'two-polygon',
                popup: {
                    title: {
                        html: 'منطقه شماره دو',
                        i18n: '',
                    },
                    description: {
                        html: '',
                        i18n: '',
                    },
                },
                "coordinates": [
                    [

                        36.34541132523059
                        , 59.547100067138665],
                    [

                        36.34499652561904
                        , 59.508647918701165],
                    [

                        36.34568785707743
                        , 59.49920654296875],
                    [

                        36.34679397464441
                        , 59.48914289474487],
                    [

                        36.34665571080782
                        , 59.48173999786378],
                    [

                        36.346811257606724
                        , 59.47199821472168],
                    [

                        36.34748529014466
                        , 59.46998119354248],
                    [

                        36.35109731381392
                        , 59.46575403213501],
                    [

                        36.35584972122994
                        , 59.472641944885254],
                    [

                        36.359374956015856
                        , 59.4795298576355],
                    [

                        36.361154793312636
                        , 59.48292016983032],
                    [

                        36.36186326091064
                        , 59.485087394714355],
                    [

                        36.363228338827895
                        , 59.487855434417725],
                    [

                        36.364247811779414
                        , 59.4898509979248],
                    [

                        36.366131209729055
                        , 59.492619037628174],
                    [

                        36.36865385482424
                        , 59.49669599533081],
                    [

                        36.37122825076429
                        , 59.50025796890259],
                    [

                        36.373647068653185
                        , 59.503777027130134],
                    [

                        36.37487372612558
                        , 59.504764080047615],
                    [

                        36.37727515446745
                        , 59.507360458374016],
                    [

                        36.378519030646956
                        , 59.510815143585205],
                    [

                        36.38017750127444
                        , 59.51474189758301],
                    [

                        36.38180138616158
                        , 59.51755285263061],
                    [

                        36.383528886051046
                        , 59.52044963836669],
                    [

                        36.37444180668679
                        , 59.52969789505004],
                    [

                        36.37031253579547
                        , 59.533538818359375],
                    [

                        36.36429964903028
                        , 59.53665018081666],
                    [

                        36.35944407667052
                        , 59.53989028930663],
                    [

                        36.3472087646811
                        , 59.547078609466546],
                    [

                        36.345480458284364
                        , 59.548065662384026],
                    [

                        36.34534219211546
                        , 59.54742193222045],
                    [

                        36.34556687451529
                        , 59.547250270843506]],
                popupOpen: true,
            });

            $.sMap.features.polygon.create({
                name: 'three-polygon',
                popup: {
                    title: {
                        html: 'منطقه شماره سه',
                        i18n: '',
                    },
                    description: {
                        html: '',
                        i18n: '',
                    },
                },
                "coordinates": [
                    [

                        36.351080031803, 59.46568965911865
                    ],
                    [

                        36.35063069817224, 59.465153217315674
                    ],
                    [

                        36.349576482166725, 59.46463823318482
                    ],
                    [

                        36.34558415774996, 59.46234226226807
                    ],
                    [

                        36.342092866470914, 59.46081876754761
                    ],
                    [

                        36.34105581910871, 59.46064710617065
                    ],
                    [

                        36.33977677501037, 59.46073293685913
                    ],
                    [

                        36.33946565299958, 59.46276068687438
                    ],
                    [

                        36.339085391076395, 59.464209079742425
                    ],
                    [

                        36.336700069393146, 59.471590518951416
                    ],
                    [

                        36.33474681680725, 59.47795271873475
                    ],
                    [

                        36.3324045776704, 59.48538780212402
                    ],
                    [

                        36.314986827431504, 59.541006088256836
                    ],
                    [

                        36.34382124805382, 59.548001289367676
                    ],
                    [

                        36.34529034223881, 59.54797983169556
                    ],
                    [

                        36.345221209016245, 59.54418182373046
                    ],
                    [

                        36.345203925701014, 59.52381849288941
                    ],
                    [

                        36.34515207573231, 59.51624393463134
                    ],
                    [

                        36.345221209016245, 59.507102966308594
                    ],
                    [

                        36.34527305893892, 59.50407743453979
                    ],
                    [

                        36.34643103154974, 59.49279069900513
                    ],
                    [

                        36.346811257606724, 59.48869228363037
                    ],
                    [

                        36.34669027679001, 59.48135375976562
                    ],
                    [

                        36.346863106470636, 59.47304964065552
                    ],
                    [

                        36.346984087018846, 59.471590518951416
                    ],
                    [

                        36.347969207342814, 59.469337463378906
                    ],
                    [

                        36.3509936216908, 59.46596860885621
                    ],
                    [

                        36.35094177557743, 59.46571111679077
                    ]
                ],
                popupOpen: true,
            });

            $.sMap.features.polygon.create({
                name: 'four-polygon',
                popup: {
                    title: {
                        html: 'منطقه شماره چهار',
                        i18n: '',
                    },
                    description: {
                        html: '',
                        i18n: '',
                    },
                },
                coordinates: [
                    [36.340014, 59.460780],
                    [36.304624, 59.469713],
                    [36.259310, 59.552256],
                    [36.300376, 59.562726],
                    [36.315113, 59.540848],
                    [36.340045, 59.460694],
                ],
                popupOpen: true,
            });

            $.sMap.features.polygon.create({
                name: 'five-polygon',
                popup: {
                    title: {
                        html: 'منطقه شماره پنج',
                        i18n: '',
                    },
                    description: {
                        html: '',
                        i18n: '',
                    },
                },
                "coordinates": [
                    [

                        36.31491766731496, 59.5409631729126
                    ],
                    [

                        36.30025433737397, 59.56315040588379
                    ],
                    [

                        36.29688207323153, 59.57357883453369
                    ],
                    [

                        36.29497970606571, 59.57679748535156
                    ],
                    [

                        36.29210877324223, 59.58465099334716
                    ],
                    [

                        36.29108835600835, 59.58585262298584
                    ],
                    [

                        36.295204533693536, 59.59771871566772
                    ],
                    [

                        36.295792541349144, 59.59964990615845
                    ],
                    [

                        36.29740089258894, 59.60394144058227
                    ],
                    [

                        36.29769488869313, 59.604070186615
                    ],
                    [

                        36.29833475873667, 59.60482120513916
                    ],
                    [

                        36.29897462353138, 59.6056580543518
                    ],
                    [

                        36.29954530932524, 59.60660219192504
                    ],
                    [

                        36.2998955008134, 59.60723519325256
                    ],
                    [

                        36.300695314982676, 59.607723355293274
                    ],
                    [

                        36.30147782793512, 59.608232975006096
                    ],
                    [

                        36.304248984704955, 59.60990667343139
                    ],
                    [

                        36.307344263364726, 59.61185932159423
                    ],
                    [

                        36.311113766417606, 59.61409091949463
                    ],
                    [

                        36.31488308723368, 59.616472721099846
                    ],
                    [

                        36.320242816755396, 59.619712829589844
                    ],
                    [

                        36.32634554385806, 59.62355375289917
                    ],
                    [

                        36.327227201464765, 59.62357521057129
                    ],
                    [

                        36.336285223382895, 59.60640907287598
                    ],
                    [

                        36.340606427629886, 59.597053527832024
                    ],
                    [

                        36.343924949728944, 59.58928585052491
                    ],
                    [

                        36.345480458284364, 59.585723876953125
                    ],
                    [

                        36.348072903494, 59.58108901977539
                    ],
                    [

                        36.34942094089192, 59.57791328430176
                    ],
                    [

                        36.349835716934216, 59.57383632659912
                    ],
                    [

                        36.34942094089192, 59.57048892974853
                    ],
                    [

                        36.348971597685896, 59.567828178405755
                    ],
                    [

                        36.348314860643015, 59.56508159637451
                    ],
                    [

                        36.34762355250817, 59.56332206726074
                    ],
                    [

                        36.3468285405652, 59.55894470214843
                    ],
                    [

                        36.34631005014225, 59.55529689788818
                    ],
                    [

                        36.345860688983024, 59.5519495010376
                    ],
                    [

                        36.3456532906503, 59.5497179031372
                    ],
                    [

                        36.34530762553485, 59.54774379730224
                    ],
                    [

                        36.339958262276085, 59.547185897827156
                    ],
                    [

                        36.33674328239216, 59.54632759094238
                    ],
                    [

                        36.33479867370346, 59.545758962631226
                    ],
                    [

                        36.33236136226454, 59.54515814781189
                    ],
                    [

                        36.32966467352121, 59.54443931579589
                    ],
                    [

                        36.327097546559976, 59.543817043304436
                    ],
                    [

                        36.32340661312426, 59.542851448059075
                    ],
                    [

                        36.321003522691925, 59.54217553138733
                    ],
                    [

                        36.31987110547244, 59.54190731048585
                    ],
                    [

                        36.317303655878725, 59.54123139381409
                    ],
                    [

                        36.31552281625428, 59.54070568084717
                    ],
                    [

                        36.31504734248313, 59.540791511535645
                    ],
                    [

                        36.314952247380894, 59.540877342224114
                    ]
                ],
                popupOpen: true,
            });

            $.sMap.features.polygon.create({
                name: 'six-polygon',
                popup: {
                    title: {
                        html: 'منطقه شماره شیش',
                        i18n: '',
                    },
                    description: {
                        html: '',
                        i18n: '',
                    },
                },
                "coordinates": [
                    [

                        36.30015057757432, 59.56330060958863
                    ],
                    [

                        36.29600007240471, 59.56128358840942
                    ],
                    [

                        36.29369990568895, 59.56027507781982
                    ],
                    [

                        36.289289621948456, 59.55815076828003
                    ],
                    [

                        36.28745625417975, 59.55737829208375
                    ],
                    [

                        36.285570953723386, 59.55626249313354
                    ],
                    [

                        36.27666272551563, 59.554481506347656
                    ],
                    [

                        36.25867019438799, 59.5517349243164
                    ],
                    [

                        36.240950421445, 59.58709716796875
                    ],
                    [

                        36.230427405208005, 59.59636688232422
                    ],
                    [

                        36.21574820162049, 59.5953369140625
                    ],
                    [

                        36.202451451485494, 59.600830078125
                    ],
                    [

                        36.18942952802744, 59.6066665649414
                    ],
                    [

                        36.18167075700458, 59.632415771484375
                    ],
                    [

                        36.18998369654791, 59.68254089355468
                    ],
                    [

                        36.20937712409333, 59.67636108398437
                    ],
                    [

                        36.24371940083272, 59.6286392211914
                    ],
                    [

                        36.25541725596825, 59.62151527404785
                    ],
                    [

                        36.25950071015022, 59.6173095703125
                    ],
                    [

                        36.267788081627934, 59.60904836654663
                    ],
                    [

                        36.27367002461384, 59.603447914123535
                    ],
                    [

                        36.27960341811362, 59.59750413894654
                    ],
                    [

                        36.28548447095851, 59.59158182144166
                    ],
                    [

                        36.291122946641586, 59.58583116531372
                    ],
                    [

                        36.29210877324223, 59.58495140075683
                    ],
                    [

                        36.29286975367836, 59.5826768875122
                    ],
                    [

                        36.29397662106287, 59.57954406738281
                    ],
                    [

                        36.29491052820373, 59.57688331604004
                    ],
                    [

                        36.29596548393379, 59.574973583221436
                    ],
                    [

                        36.29702042539756, 59.572999477386475
                    ],
                    [

                        36.29778135792465, 59.570735692977905
                    ],
                    [

                        36.29900056388532, 59.56688404083251
                    ],
                    [

                        36.30010734428372, 59.56334352493286
                    ]
                ],
                popupOpen: true,
            });

            $.sMap.features.polygon.create({
                name: 'seven-polygon',
                popup: {
                    title: {
                        html: 'منطقه شماره هفت',
                        i18n: '',
                    },
                    description: {
                        html: '',
                        i18n: '',
                    },
                },
                "coordinates": [
                    [

                        36.39738204701894, 59.57954406738281
                    ],
                    [

                        36.34891110897934, 59.57958698272705
                    ],
                    [

                        36.34727789613907, 59.58269834518433
                    ],
                    [

                        36.34513479240174, 59.586517810821526
                    ],
                    [

                        36.34337187253246, 59.590702056884766
                    ],
                    [

                        36.34020888685252, 59.59799766540527
                    ],
                    [

                        36.33860141867091, 59.60134506225585
                    ],
                    [

                        36.33507524323365, 59.60866212844849
                    ],
                    [

                        36.331082175394876, 59.61645126342773
                    ],
                    [

                        36.32788411633325, 59.62284564971924
                    ],
                    [

                        36.32726177606958, 59.62336063385009
                    ],
                    [

                        36.32352763010715, 59.6317720413208
                    ],
                    [

                        36.3203465498203, 59.637608528137214
                    ],
                    [

                        36.3178223393809, 59.642500877380364
                    ],
                    [

                        36.31560926571928, 59.64683532714844
                    ],
                    [

                        36.31343070996889, 59.650740623474114
                    ],
                    [

                        36.31190914286077, 59.6534013748169
                    ],
                    [

                        36.30900425046696, 59.65751051902772
                    ],
                    [

                        36.30664394570698, 59.661920070648186
                    ],
                    [

                        36.3049147393683, 59.664698839187615
                    ],
                    [

                        36.30324601889735, 59.66571807861328
                    ],
                    [

                        36.29862875132119, 59.66305732727051
                    ],
                    [

                        36.297349010808475, 59.662199020385735
                    ],
                    [

                        36.29676101488494, 59.66232776641846
                    ],
                    [

                        36.29779865175947, 59.66490268707276
                    ],
                    [

                        36.30073854794736, 59.67039585113525
                    ],
                    [

                        36.30288287292438, 59.67438697814941
                    ],
                    [

                        36.30530381413761, 59.68039512634277
                    ],
                    [

                        36.30699842827041, 59.68550205230712
                    ],
                    [

                        36.307620930335844, 59.68803405761719
                    ],
                    [

                        36.3176148663942, 59.71155166625976
                    ],
                    [

                        36.33476410244316, 59.71155166625976
                    ],
                    [

                        36.39742522632939, 59.579533338546746
                    ]
                ],
                popupOpen: true,
            });

            $.sMap.features.polygon.create({
                name: 'eight-polygon',
                popup: {
                    title: {
                        html: 'منطقه شماره هشت',
                        i18n: '',
                    },
                    description: {
                        html: '',
                        i18n: '',
                    },
                },
                "coordinates": [
                    [

                        36.327062971882285, 59.62384343147277
                    ],
                    [

                        36.32506625822014, 59.62281346321106
                    ],
                    [

                        36.32323373139413, 59.62160110473633
                    ],
                    [

                        36.3201995946043, 59.61976647377014
                    ],
                    [

                        36.317926075667174, 59.618371725082405
                    ],
                    [

                        36.314338448930236, 59.61614012718201
                    ],
                    [

                        36.311546037230265, 59.61433768272399
                    ],
                    [

                        36.30878810831414, 59.61268544197082
                    ],
                    [

                        36.30603872785008, 59.61104393005371
                    ],
                    [

                        36.30312497042758, 59.60925221443176
                    ],
                    [

                        36.299994937616, 59.60732102394104
                    ],
                    [

                        36.29954530932524, 59.606720209121704
                    ],
                    [

                        36.29920808640626, 59.60586190223693
                    ],
                    [

                        36.298507695685274, 59.604917764663696
                    ],
                    [

                        36.297919708495726, 59.60426330566406
                    ],
                    [

                        36.29755653772329, 59.60387706756592
                    ],
                    [

                        36.29720201224311, 59.603437185287476
                    ],
                    [

                        36.29696854336406, 59.60278272628784
                    ],
                    [

                        36.29618166162544, 59.60070133209228
                    ],
                    [

                        36.29573201135395, 59.59928512573242
                    ],
                    [

                        36.29565418700539, 59.59903836250305
                    ],
                    [

                        36.293457778931646, 59.59259033203125
                    ],
                    [

                        36.291114298984716, 59.58595991134643
                    ],
                    [

                        36.28747355030335, 59.58951115608215
                    ],
                    [

                        36.285216373778326, 59.59174275398255
                    ],
                    [

                        36.28010505461355, 59.596989154815674
                    ],
                    [

                        36.27754926950737, 59.599531888961785
                    ],
                    [

                        36.2760313270707, 59.600958824157715
                    ],
                    [

                        36.27498907599983, 59.60204780101776
                    ],
                    [

                        36.27400303313223, 59.60307240486145
                    ],
                    [

                        36.27363110144755, 59.603431820869446
                    ],
                    [

                        36.27230337737707, 59.60473537445069
                    ],
                    [

                        36.271600582696294, 59.60544079542161
                    ],
                    [

                        36.271194040116, 59.6058377623558
                    ],
                    [

                        36.27043068582904, 59.606543183326714
                    ],
                    [

                        36.26752857393819, 59.60930585861205
                    ],
                    [

                        36.26529677220772, 59.61152672767639
                    ],
                    [

                        36.263454190157354, 59.61333990097046
                    ],
                    [

                        36.26151640439149, 59.61536765098571
                    ],
                    [

                        36.259518012468014, 59.61729884147643
                    ],
                    [

                        36.25839335383838, 59.618457555770874
                    ],
                    [

                        36.25734654164152, 59.61951971054078
                    ],
                    [

                        36.25641218502299, 59.620453119277954
                    ],
                    [

                        36.25542590757986, 59.62150454521179
                    ],
                    [

                        36.24351173078124, 59.62868213653564
                    ],
                    [

                        36.23070434483337, 59.646921157836914
                    ],
                    [

                        36.238596711841325, 59.67524528503418
                    ],
                    [

                        36.25811651230768, 59.71481323242187
                    ],
                    [

                        36.317061602396564, 59.71240997314453
                    ],
                    [

                        36.317718602956596, 59.71159458160401
                    ],
                    [

                        36.3076555136382, 59.688076972961426
                    ],
                    [

                        36.30651425656165, 59.6837854385376
                    ],
                    [

                        36.30558048834815, 59.68125343322753
                    ],
                    [

                        36.30485421645195, 59.67945098876953
                    ],
                    [

                        36.303297896755446, 59.67542767524719
                    ],
                    [

                        36.30274020797238, 59.673893451690674
                    ],
                    [

                        36.3011881693596, 59.670894742012024
                    ],
                    [

                        36.29957557284925, 59.66794967651367
                    ],
                    [

                        36.29831746502072, 59.665701985359185
                    ],
                    [

                        36.29743980390167, 59.663904905319214
                    ],
                    [

                        36.29692098480302, 59.6628051996231
                    ],
                    [

                        36.2967912794892, 59.66240286827087
                    ],
                    [

                        36.29707663089493, 59.66230630874634
                    ],
                    [

                        36.29731874642062, 59.66232240200042
                    ],
                    [

                        36.30175883895792, 59.66554641723632
                    ],
                    [

                        36.30355728552834, 59.665482044219964
                    ],
                    [

                        36.30585716157705, 59.663207530975335
                    ],
                    [

                        36.30755176368509, 59.66003179550171
                    ],
                    [

                        36.30973048371174, 59.65646982192993
                    ],
                    [

                        36.31209934037328, 59.6526288986206
                    ],
                    [

                        36.31453728557725, 59.64840173721313
                    ],
                    [

                        36.31641324115199, 59.64500606060028
                    ],
                    [

                        36.31873002720476, 59.64049458503723
                    ],
                    [

                        36.32049350475924, 59.63707208633423
                    ],
                    [

                        36.323441189424265, 59.63192224502563
                    ],
                    [

                        36.32452169106911, 59.62979793548584
                    ],
                    [

                        36.32564539688769, 59.626954793930054
                    ],
                    [

                        36.32704568453768, 59.623939990997314
                    ]
                ],
                popupOpen: true,
            });


            ////////////////////////////////////////////////////////////////////////////////////////////

            $.sMap.features.marker.create({
                before: function () {
                    console.log('Before');
                },
                after: function () {
                    console.log('After');
                },
                name: '1-marker',
                popup: {
                    title: {
                        html: 'سفارش  {{$order->user->name." ".$order->user->lname}}',
                        i18n: '',
                    },
                    description: {
                        html: '{{str_words($order->address)}}',
                        i18n: '',
                    },
                    custom: false,
                },
                class: 'default',
                latlng: {lat: "{{$order->location[1]}}", lng: "{{$order->location[0]}}"},
                icon: icons.default.blue,
                popupOpen: true,
                pan: true,
                draggable: false,
                on: {
                    click: function () {
                        console.log('click callback');
                    },
                    contextmenu: function () {
                        console.log('contextmenu callback');
                    },
                },
            });


        });


    </script>
@stop

