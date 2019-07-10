<?php

use App\model\SmsRegister;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;


Route::fallback( "TestController@fallback");

Route::any('v1/success/{order}', 'Api\OrderController@success')->name('success');

Route::prefix('v1')->namespace('Api')->group(function () {
    Route::get('get-phone', "AuthController@getPhone");
    Route::get('check-code', "AuthController@checkCode");
    Route::get('setting/get', 'AllController@GetSetting')->name('settingGet');
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::get('category/all', 'CategoryController@getAllCategory');// send all category
    Route::get('category/{category}', 'CategoryController@getChildCategory');// send all category
    Route::get('category', 'CategoryController@CategoryNested');// send all category
    Route::get('product/category/{category}/', 'ProductController@getManyProduct');//get id of category and send all product belongs to category
    Route::get('product/all', 'ProductController@getAllProduct');//send all product
    Route::get('product/{product}', 'ProductController@getOneProduct')->where('product', '[0-9]+');// get id of product and send this product
    Route::get('product/popular/{count}', 'ProductController@popular');
    Route::get('product/new/{count}', 'ProductController@new');
    Route::any('product/special/{count}', 'ProductController@special');
    Route::any('product/offer/{count}', 'ProductController@offer');
    Route::post('product/search/', 'ProductController@search');
    Route::post('product/array', 'ProductController@getArray');
    Route::get('province/all', 'AllController@getProvince');
    Route::post('filter/{category}', 'AllController@filter');
    Route::get('filter/all', 'AllController@filter_all');
    Route::get('article', 'AllController@getArticle');
    Route::get('banner/all', 'AllController@getBanner');
    Route::get('qas', 'AllController@getQas');
    Route::get('slider/all', 'AllController@sliderAll');
//    Route::get('order/all', 'OrderController@allUser');
    Route::get("about","AllController@getAbout");
});


Route::prefix('v1')->namespace('Api')->middleware('jwt.auth')->group(function () {
    Route::get("check/discount","AllController@checkDiscount");
    Route::post('order/create/order', 'OrderController@storeOrder');
    Route::post('order/create/item/{order}', 'OrderController@storeItem');
    Route::post('user/update/{user}', 'UserController@update');
    Route::get('user/{user}', 'UserController@getUser');
    Route::get('user-get', 'AuthController@me');
    Route::post('upload/avatar', 'AllController@uploadAvatar');
    Route::post('user/update', 'AuthController@update');
    Route::post('ticket/create/', 'TicketController@create');
    Route::get('ticket/get-user', 'TicketController@allUser');
    Route::post('ticket/all', 'TicketController@all');
    Route::post('comment/create/{ticket}', 'CommentController@create');
    Route::get('comment/{ticket}', 'CommentController@getComment')->where('ticket', '[0-9]+');
    Route::get('checkout/{order}', 'OrderController@checkout')->name('checkout');
    Route::get('payment/{order}', 'OrderController@payment')->name('payment');
    Route::get('order/all', 'OrderController@getAllOrder')->name('getAllOrder');
    Route::get('order/{order}', 'OrderController@getOrderMain')->where('order', '[0-9]+');
});

