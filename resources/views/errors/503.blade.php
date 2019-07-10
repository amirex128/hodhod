@extends('errors::illustrated-layout')

@section('code', '503')
@section('title','سرور در دسترس نیست')

@section('image')
    <div style="background-image: url({{ asset('/svg/503.svg') }});" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
    </div>
@endsection

@section('message', 'متاسفانه سرور از دسترس خارج شده. لطفا بعدا تلاش نمایید')
