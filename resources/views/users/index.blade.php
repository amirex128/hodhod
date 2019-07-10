@extends('layouts.app', ['title' => 'مدیریت کاربران'])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">کاربران</h3>
                            </div>
                            @include("Components.recycle_link",["trashed"=>$trashed,"name"=>"user"])

                            <div class="col-2 text-right">
                                <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">افزودن کاربر</a>
                            </div>
                        </div>
                    </div>

                    @status
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">نام</th>
                                <th scope="col">ایمیل</th>
                                <th scope="col">وضعیت</th>
                                <th scope="col">مسئولیت</th>
                                <th scope="col">تاریخ ایجاد</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                                @unless (auth()->user()->id==$user->id)
                                    <tr>
                                        <td>{{ $user->name." ".$user->lname }}</td>
                                        <td>
                                            <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                        </td>
                                        <td>
                                            @if ($user->status==1)
                                                <span class="badge badge-success">کاربر فعال</span>
                                            @else
                                                <span class="badge badge-success">کاربر غیر فعال</span>

                                            @endif

                                        </td>
                                        <td>
                                            @if ($user->roles->contains('name','admin'))
                                                <span class="badge badge-primary">مدیر</span>
                                            @elseif ($user->roles->contains('name','manager'))

                                                <span class="badge badge-dark">کاربر</span>

                                            @else
                                                <span class="badge badge-danger">مشتری</span>

                                            @endif
                                        </td>

                                        <td>{{date_fa(isset($user->created_at)?$user->created_at:now()) }}</td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    @include("Components.recycle_form",["trashed"=>$trashed,"name"=>"user","model"=>$user])
                                                </div>
                                            </div>
                                            @include("Components.modal-delete", ["user" => auth()->user(), "name" => $user->name." ".$user->lname, "what" => "کاربر", "trashed" => $trashed, "model"=>$user])

                                            {{--<div class="modal fade" id="modal-notification-ok" tabindex="-1"--}}
                                                 {{--role="dialog" aria-labelledby="modal-notification" aria-hidden="true">--}}
                                                {{--<div class="modal-dialog modal-danger modal-dialog-centered modal-"--}}
                                                     {{--role="document">--}}
                                                    {{--<div class="modal-content bg-gradient-danger">--}}

                                                        {{--<div class="modal-header">--}}
                                                            {{--<h6 class="modal-title"--}}
                                                                {{--id="modal-title-notification">{{auth()->user()->name." ".auth()->user()->lname}}--}}
                                                                {{--عزیز</h6>--}}
                                                            {{--<button type="button" class="close" data-dismiss="modal"--}}
                                                                    {{--aria-label="Close">--}}
                                                                {{--<span aria-hidden="true">×</span>--}}
                                                            {{--</button>--}}
                                                        {{--</div>--}}

                                                        {{--<div class="modal-body">--}}

                                                            {{--<div class="py-3 text-center">--}}
                                                                {{--<i class="ni ni-bell-55 ni-3x"></i>--}}
                                                                {{--<h4 class="heading mt-4">از حذف محصول--}}
                                                                    {{--&quot;{{ str_limit($product->title,50) }}&quot;--}}
                                                                    {{--مطمئن هستید؟</h4>--}}
                                                                {{--@if($trashed==true)--}}
                                                                    {{--<p>.این محصول به طور کامل حذف خواهد شد و قابل--}}
                                                                        {{--بازیابی نیست</p>--}}
                                                                {{--@else--}}
                                                                    {{--<p>.بعدا می توانید در بخش زباله دان این محصول را--}}
                                                                        {{--بازیابی کنید</p>--}}
                                                                {{--@endif--}}
                                                            {{--</div>--}}

                                                        {{--</div>--}}

                                                        {{--<div class="modal-footer">--}}
                                                            {{--<button type="button" class="btn btn-white" onclick="ok()">--}}
                                                                {{--!حذفش کن--}}
                                                            {{--</button>--}}
                                                            {{--<button type="button"--}}
                                                                    {{--class="btn btn-link text-white ml-auto"--}}
                                                                    {{--data-dismiss="modal">بستن--}}
                                                            {{--</button>--}}
                                                        {{--</div>--}}

                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        </td>
                                    </tr>
                                @endunless
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $users->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
