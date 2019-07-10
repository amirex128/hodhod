@extends('layouts.app', ['title' => 'مدیریت طرح ها'])

@section('content')
    @include('users.partials.header', ['title' => 'ویرایش طرح'])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">ویرایش طرح ها</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('design.index') }}" class="btn btn-sm btn-primary">بازگشت</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('design.update',$design) }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">اطلاعات طرح</h6>
                            <div id="design" class="pl-lg-4">
                                <div class="row rtl">
                                    <div class="col-sm-12">
                                        <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                            <p class="form-control-label text-right">عنوان طرح :</p>
                                            <input type="text" name="title" id="input-name"
                                                   class="form-control form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                                   placeholder="عنوان طرح را وارد نمایید..."
                                                   value="{{ old('title',$design->title) }}" required autofocus>

                                            @if ($errors->has('title'))
                                                <span class="invalid-feedback" role="alert">
                                                                                             </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <button class="btn btn-block btn-outline-info">ذخیره</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
