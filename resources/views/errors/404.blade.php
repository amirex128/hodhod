@extends('errors::illustrated-layout')

@section('code', '404')
@section('title', 'موردی یافت نشد')

@section('image')
    <div style="background-image: url({{ asset('/svg/404.svg') }});" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
    </div>
@endsection

@section('message', 'متاسفانه صفحه مورد نظر شما یافت نشد')
