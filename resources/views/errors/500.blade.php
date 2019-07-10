@extends('errors::illustrated-layout')

@section('code', '500')
@section('title', 'خطا')

@section('image')
    <div style="background-image: url({{ asset('/svg/500.svg') }});" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
    </div>
@endsection

@section('message','خطا در برقراری ارتباط با سرور')
