@extends('layouts.app', ['title' =>'مدیریت استان ها'])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <form action="{{ route('province.store') }}" method="post">

        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">استان ها</h3>
                            </div>
                            
                            <div class="col-4 text-right">
                                    @csrf
                                <button class="btn btn-sm btn-primary">ذخیره اطلاعات استان</button>
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
                                    <th scope="col">نام استان</th>
                                    <th scope="col">هزینه حمل ونقل</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($provinces as $province)
                                    <tr>
                                        <td>{{ $province->name }}</td>
                                        <td class="text-right">

                                                    <input type="text" name="{{$province->id}}" class="form-control" value="{{$province->price}}">


                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $provinces->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        </form>

        @include('layouts.footers.auth')
    </div>
@endsection
