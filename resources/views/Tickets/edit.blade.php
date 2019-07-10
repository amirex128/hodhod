@extends('layouts.app', ['title' => 'مدیریت رنگ ها'])

@section('content')
    @include('users.partials.header', ['title' => 'ویرایش رنگ'])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">ویرایش رنگ ها</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('color.index') }}" class="btn btn-sm btn-primary">بازگشت</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('color.update',$color) }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <h6 class="heading-small text-muted mb-4">اطلاعات رنگ ها</h6>
                            <div id="color" class="pl-lg-4">
                                <div class="row rtl">
                                    <div class="col-sm-12">
                                        <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                            <p class="form-control-label text-right">عنوان رنگ :</p>
                                            <input type="text" name="title" id="input-name"
                                                   class="form-control form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                                   placeholder="عنوان رنگ را وارد نمایید..."
                                                   value="{{ old('title',$color->title) }}" required autofocus>

                                            @if ($errors->has('title'))
                                                <span class="invalid-feedback" role="alert">
                                                                                             </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <p class="form-control-label text-right">کد رنگ :</p>
                                        <div id="example" style="background:{{$color->code}}" class="btn btn-block mb-3 btn-success ">انتخاب رنگ</div>
                                        <input type="hidden" name="code" id="code">
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
@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/pickr.min.css"/>

@endsection

@section('script')
    <script src="{{asset('js/vanilla-picker.min.js')}}"></script>

    <script>

        $(document).ready(function () {
            new Picker({
                parent: document.querySelector('#example'),
                popup:'top',
                color: '#000',
                onDone: function(color){
                    $('#code').val(color.hex)
                    $('#example').css('background',color.hex)
                }
            });
        })
    </script>
@stop
