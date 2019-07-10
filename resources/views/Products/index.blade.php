@extends('layouts.app', ['title' => 'مدیریت محصولات'])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">محصولات</h3>
                            </div>
                            @include("Components.recycle_link",["trashed"=>$trashed,"name"=>"product"])

                            <div class="col-2 text-right">
                                <a href="{{ route('product.create') }}" class="btn btn-sm btn-primary">افزودن محصول</a>
                            </div>
                        </div>
                    </div>

                    @status()


                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">عنوان</th>
                                <th scope="col">دسترسی</th>
                                <th scope="col">قیمت</th>
                                <th scope="col">تخفیف</th>
                                <th scope="col">موجودی</th>
                                <th scope="col">تاریخ ایجاد</th>
                                <th scope="col">گزینه ها</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($Products as $product)
                                    <tr>
                                        <td class="rtl text-left">{{ str_limit($product->title,50) }}</td>
                                        <td>




                                            @can('update-product',$product)
                                                <div class="col-md-4">
                                                    <a style="background: #5e72e4;border-radius: 5px;padding: 5px 7px;cursor: help"
                                                       class="text-white btn btn-sm" data-toggle="modal"
                                                       data-target="#modal-notification"> مجاز</a>
                                                    <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
                                                        <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                                                            <div class="modal-content bg-gradient-info">

                                                                <div class="modal-header">
                                                                    <h6 class="modal-title" id="modal-title-notification">{{auth()->user()->name." ".auth()->user()->lname}} عزیز</h6>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>

                                                                <div class="modal-body">

                                                                    <div class="py-3 text-center">
                                                                        <i class="ni ni-bell-55 ni-3x"></i>
                                                                        <h4 class="heading mt-4">! مجوز دسترسی</h4>
                                                                        <p>شما به این محصول دسترسی کامل دارید</p>
                                                                        <p>شما قادر به ویرایش و حذف محصولات خود هستید</p>
                                                                    </div>

                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-block btn-link text-white ml-auto" data-dismiss="modal">بستن</button>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endcan
                                            @cannot('update-product',$product)
                                                    <div class="col-md-4">
                                                        <a style="background: #f5365c ;border-radius: 5px;padding: 5px 7px;cursor: help"
                                                           class="text-white btn btn-sm" data-toggle="modal"
                                                           data-target="#modal-notification"> غیر مجاز</a>
                                                        <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
                                                            <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                                                                <div class="modal-content bg-gradient-danger">

                                                                    <div class="modal-header">
                                                                        <h6 class="modal-title" id="modal-title-notification">{{auth()->user()->name." ".auth()->user()->lname}} عزیز</h6>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button>
                                                                    </div>

                                                                    <div class="modal-body">

                                                                        <div class="py-3 text-center">
                                                                            <i class="ni ni-bell-55 ni-3x"></i>
                                                                            <h4 class="heading mt-4">! عدم دسترسی</h4>
                                                                                <p>شما متاسفانه به این محصول دسترسی ندارید</p>
                                                                                <p>شما تنها قادر به ویرایش و حذف محصولات خود هستید</p>
                                                                        </div>

                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-block btn-link text-white ml-auto" data-dismiss="modal">بستن</button>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            @endcan

                                        </td>
                                        <td>
                                            <div class="badge badge-lg badge-success"
                                                 style="font-size: 12px">{{ $product->price }}</div>
                                        </td>
                                        <td>
                                            <div class="badge badge-lg badge-success"
                                                 style="font-size: 12px">{{ $product->offer }}</div>
                                        </td>
                                        <td>{{ $product->stock }}</td>
                                        <td>{{date_fa($product->created_at) }}</td>
                                        <td class="text-right">
                                            @can('update-product',$product)
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        @include("Components.recycle_form",["trashed"=>$trashed,"name"=>"product","model"=>$product])
                                                    </div>

                                                    @include("Components.modal-delete", ["user" => auth()->user(), "name" => $product->title, "what" => "محصول", "trashed" => $trashed, "model"=>$product])
                                                    
                                                </div>

                                            @endcan
                                            @cannot('update-product',$product)
                                            @endcan
                                        </td>
                                    </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $Products->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
