@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div id="app-chart">
        <div class="row">
            <div class="col-xl-8 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-dark ls-1 mb-1">مرور کلی</h6>
                                <h2 class="text-dark mb-0">میزان فروش</h2>
                            </div>
                            <div class="col">

                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
    <canvas id="myChart" width="400" height="400"></canvas>

                    </div>
                </div>
            </div>
            <div class="row col-xl-4">
                <div class="col-sm-12 mb-3">
                    <div class="card shadow">
                        <div class="card-header bg-transparent">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="text-uppercase text-muted ls-1 mb-1">مرور کلی</h6>
                                    <h2 class="mb-0">کاربران</h2>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Chart -->
                            <canvas id="myChart1" width="400" height="400"></canvas>

                        </div>
                    </div>
                </div>
                <div class="col-sm-12 mt-3">
                    <div class="card shadow">
                        <div class="card-header bg-transparent">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="text-uppercase text-muted ls-1 mb-1">مرور کلی</h6>
                                    <h2 class="mb-0">محصولات</h2>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Chart -->
                            <canvas id="myChart2" width="400" height="400"></canvas>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>
        <div class="row mt-5">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">سفارشات</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{route('order.index')}}" class="btn btn-sm btn-primary">مشاهده همه</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">خریدار</th>
                                <th scope="col">مبلغ</th>
                                <th scope="col">پرداخت</th>
                                <th scope="col">تاریخ ثبت</th>
                                <th scope="col">اطلاعات بیشتر</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->total_price }}</td>
                                    <td>
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
                                    </td>
                                    <td>
                                        @if ($order->visit==1)
                                            <div class="badge badge-success">بررسی شده</div>
                                        @else
                                            <div class="badge badge-danger">بررسی نشده</div>
                                        @endif
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <form action="{{ route('order.destroy', $order) }}" method="post">
                                                    @csrf
                                                    @method('delete')

                                                    <a class="dropdown-item" href="{{ route('order.edit', $order) }}">بررسی</a>

                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>

    @javascript('months', $months)
    @javascript('users', $users)
    @javascript('products', $products)

@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
    <script src="{{asset('js/vue.js')}}"></script>

    <script>
console.log(months)
        var app=new Vue({
            el:"#app-chart",
            data:{
                name:"amir"
            },
            mounted(){
                var ctx = document.getElementById('myChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: [ 'فروردین','اردیبهشت', 'خرداد', 'تیر', 'مرداد', 'شهریور','مهر', 'آبان', 'آذر', 'دی', 'بهمن', 'اسفند'],
                        datasets: [{
                            label: '# of Votes',
                            data: [months['فرو'],months['ارد'],months['خرد'],months['تیر'],months['شهر'],months['مهر'],months['آبا'],months['آذر'],months['دی'],months['بهم'],months['فرو'],months['اسف']],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',

                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(95, 162, 235, 0.2)',
                                'rgba(40, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(204, 102, 255, 0.2)',
                                'rgba(178, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(125, 75, 132, 0.2)',
                                'rgba(142, 12, 235, 0.2)',
                                'rgba(125, 46, 86, 0.2)',
                                'rgba(247, 47, 192, 0.2)',
                                'rgba(255, 102, 255, 0.2)',
                                'rgba(255, 80, 64, 0.2)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
                var ctx1 = document.getElementById('myChart1').getContext('2d');
                var myChart1 = new Chart(ctx1, {
                    type: 'line',
                    data: {
                        labels: [ 'فروردین','اردیبهشت', 'خرداد', 'تیر', 'مرداد', 'شهریور','مهر', 'آبان', 'آذر', 'دی', 'بهمن', 'اسفند'],
                        datasets: [{
                            label: 'میزان ثبت نام کاربران در این ماه ',
                            data: [users['فرو'],users['ارد'],users['خرد'],users['تیر'],users['شهر'],users['مهر'],users['آبا'],users['آذر'],users['دی'],users['بهم'],users['فرو'],users['اسف']],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(95, 162, 235, 0.2)',
                                'rgba(40, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(204, 102, 255, 0.2)',
                                'rgba(178, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(125, 75, 132, 0.2)',
                                'rgba(142, 12, 235, 0.2)',
                                'rgba(125, 46, 86, 0.2)',
                                'rgba(247, 47, 192, 0.2)',
                                'rgba(255, 102, 255, 0.2)',
                                'rgba(255, 80, 64, 0.2)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
                var ctx2 = document.getElementById('myChart2').getContext('2d');
                var myChart2 = new Chart(ctx2, {
                    type: 'line',
                    data: {
                        labels: [ 'فروردین','اردیبهشت', 'خرداد', 'تیر', 'مرداد', 'شهریور','مهر', 'آبان', 'آذر', 'دی', 'بهمن', 'اسفند'],
                        datasets: [{
                            label: 'میزان انتشار محصول در این ماه ',
                            data: [products['فرو'],products['ارد'],products['خرد'],products['تیر'],products['شهر'],products['مهر'],products['آبا'],products['آذر'],products['دی'],products['بهم'],products['فرو'],products['اسف']],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(95, 162, 235, 0.2)',
                                'rgba(40, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(204, 102, 255, 0.2)',
                                'rgba(178, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(125, 75, 132, 0.2)',
                                'rgba(142, 12, 235, 0.2)',
                                'rgba(125, 46, 86, 0.2)',
                                'rgba(247, 47, 192, 0.2)',
                                'rgba(255, 102, 255, 0.2)',
                                'rgba(255, 80, 64, 0.2)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            }
        })


    </script>
@endpush
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css">
@stop
