@extends('layouts.app', ['title' =>'مدیریت تیکت ها'])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">تیکت ها</h3>
                            </div>

                        </div>
                    </div>

                    <div class="col-12">

                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">عنوان</th>
                                    <th scope="col">کاربر</th>
                                    <th scope="col">وضعیت</th>
                                    <th scope="col">تاریخ ایجاد</th>
                                    <th scope="col">تنظیمات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tickets as $ticket)
                                        <tr>
                                            <td><a href="{{route('getTicket',$ticket)}}">{{ str_words($ticket->title,5) }}...<a/></td>
                                            <td>{{ $ticket->user->name." ".$ticket->user->lname }}</td>
                                            <td>{{ $ticket->status==1?"فعال":"غیرفعال" }}</td>
                                            <td>{{ $ticket->created_at->format('d/m/Y H:i') }}</td>
                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        <form action="{{ route('ticket.update', $ticket) }}" method="post">
                                                            @csrf
                                                            <button type="button" class="dropdown-item" onclick="confirm('آیا برای بیتن تیکت مطمدن هستید؟') ? this.parentElement.submit() : ''">
                                                                بستن تیکت
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $tickets->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
