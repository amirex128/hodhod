@extends('layouts.app', ['title' =>'مدیریت بنر ها'])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h3 class="mb-0">بنر ها</h3>
                            </div>
                            @include("Components.recycle_link",["trashed"=>$trashed,"name"=>"banner"])

                            <div class="col-2 text-right">
                                <a href="{{ route('banner.create') }}" class="btn btn-sm btn-primary">افزودن بنر یک
                                    ستونه</a>
                            </div>
                            <div class="col-2 text-right">
                                <a href="{{ route('banner.create2') }}" class="btn btn-sm btn-primary">افزودن بنر دو
                                    ستونه</a>
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
                                <th scope="col">وضعیت</th>
                                <th scope="col">ستون</th>
                                <th scope="col">تاریخ ایجاد</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($Banners as $banner)
                                <tr>
                                    <td>{{ $banner->title }}</td>
                                    <td>{{ $banner->status }}</td>
                                    <td>{{ $banner->side=='1'?'تک ستونه':'دو ستونه' }}</td>
                                    <td>{{ $banner->created_at->format('d/m/Y H:i') }}</td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                @include("Components.recycle_form",["trashed"=>$trashed,"name"=>"banner","model"=>$banner])
                                            </div>
                                        </div>
                                        @include("Components.modal-delete", ["user" => auth()->user(), "name" => $banner->title, "what" => "بنر", "trashed" => $trashed, "model"=>$banner])
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $Banners->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
