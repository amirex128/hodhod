@extends('layouts.app', ['title' =>'مدیریت سفارشات ها'])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h3 class="mb-0">سفارشات ها</h3>
                            </div>

                            <div class="col-2 text-right">
                                <a href="{{ route('order.index',["paid"=>1]) }}" class="btn btn-sm btn-primary">همه سفارشات</a>

                            </div>
                            <div class="col-2 text-right">
                                <a href="{{ route('order.index',["paid"=>3]) }}" class="btn btn-sm btn-primary">پرداخت شده</a>
                            </div>
                            <div class="col-2 text-right">
                                <a href="{{ route('order.index',["paid"=>2]) }}" class="btn btn-sm btn-primary">پرداخت نشده</a>
                            </div>
                        </div>
                    </div>

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

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">شناسه سفارش</th>
                                <th scope="col">خریدار</th>
                                <th scope="col">مبلغ</th>
                                <th scope="col">پرداخت</th>
                                <th scope="col"> وضعیت بررسی</th>
                                <th scope="col">تاریخ ثبت</th>
                                <th scope="col">اطلاعات بیشتر</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($orders as $order)
                                @can('read-order',$order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
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
                                        <td>{{ date_fa($order->created_at) }}</td>
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

                                                        <a class="dropdown-item"
                                                           href="{{ route('order.edit', $order) }}">بررسی</a>

                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                @endcan
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $orders->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
