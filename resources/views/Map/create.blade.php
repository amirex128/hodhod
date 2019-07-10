@extends('layouts.app', ['title' => 'مدیریت سوالات '])

@section('content')
    @include('users.partials.header', ['title' => 'افزودن سوالات'])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">مدیریت سوالات </h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('qas.index') }}" class="btn btn-sm btn-primary">بازگشت</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('qas.store') }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            
                            <h6 class="heading-small text-muted mb-4">اطلاعات سوالات </h6>
                            <div id="qas" class="pl-lg-4">
                                <div class="row rtl">
                                    <div class="col-sm-12 mb-3">
                                            <p class="form-control-label text-right"> سوال :</p>
                                            <input type="text" name="quest" id="input-name"
                                                   class="form-control form-control-alternative{{ $errors->has('quest') ? ' is-invalid' : '' }}"
                                                   placeholder="عنوان سوالات را وارد نمایید..."
                                                   value="{{ old('title') }}" required autofocus>

                                    </div>
                                    <div class="col-sm-12 mb-3">
                                        <p class="form-control-label text-right">پاسخ  :</p>
                                        <textarea   name="answer"  rows="7"
                                               class="form-control"
                                               placeholder="عنوان سوالات را وارد نمایید..."></textarea>
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
            qas: '#000',
            onDone: function(qas){
            $('#code').val(qas.hex)
                $('#example').css('background',qas.hex)
            }
        });
    })
    </script>
@stop
