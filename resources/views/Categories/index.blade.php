@extends('layouts.app', ['title' => __('User Management')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">مدیریت دسته بندی ها</h3>
                            </div>
                            @include("Components.recycle_link",["trashed"=>$trashed,"name"=>"category"])

                            <div class="col-2 text-right">
                                <a href="{{ route('category.create') }}" class="btn btn-sm btn-primary">افزودن دسته بندی</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        @status()

                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">عنوان</th>
                                    <th scope="col">پدر</th>
                                    <th scope="col">نوع</th>
                                    <th scope="col">تاریخ ایجاد</th>
                                    <th scope="col">گزینه ها</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($Categories as $category)

                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <div class="badge badge-default"> {{!$category->parent_id==null? \App\model\Category::find($category->parent_id)->name:"بدون پدر"}}</div>
                                    </td>
                                    <td>
                                                <div class="badge badge-info">
                                                    @if((int)$category->type==1)
                                                        محصولات
                                                       @elseif((int)$category->type==2)
                                                        مقالات
                                                    @endif
                                                </div>
                                            </td>
                                    <td>
                                        {{ date_fa($category->created_at )}}
                                    </td>

                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                @include("Components.recycle_form",["trashed"=>$trashed,"name"=>"category","model"=>$category])
                                            </div>
                                        </div>
                                        @include("Components.modal-delete", ["user" => auth()->user(), "name" => $category->name, "what" => "دسته بندی", "trashed" => $trashed, "model"=>$category])
                                    </td>

                                </tr>

                                @if(count($category->childrenRecursive)>0)

                                    @include("Categories.partials.list",["category"=>$category->childrenRecursive,"level"=>1])

                                @endif

                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
{{--                            {{ $Categories->links() }}--}}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection
{{--<div class="modal fade" id="modal-notification-ok-{{$category->id}}" tabindex="-1"--}}
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
                        {{--&quot;{{ str_limit($category->name,50) }}&quot;--}}
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
                {{--<button type="button" class="btn btn-white" onclick="document.getElementById('drop-down-form-{{$category->id}}').submit();">--}}
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