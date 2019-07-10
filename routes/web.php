<?php

use App\model\Discount;
use App\model\Order;
use App\User;
use Carbon\Carbon;

Route::get("/fontDownload/{id}", function ($req) {
    return Storage::download("fonts/ttf/" . $req);
});

Route::prefix('debug')->group(function () {
    Route::get("out",function (){
        Auth::logout();
        return "loged out";
    });
    Route::get("mail", function () {
        $title = "title";

        $user = "dear user";

        $text = "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quibus rebus vita consentiens virtutibusque respondens recta et honesta et constans et naturae congruens existimari potest. Cuius ad naturam apta ratio vera illa et summa lex a philosophis dicitur. Gracchum patrem non beatiorem fuisse quam fillum, cum alter stabilire rem publicam studuerit, alter evertere. Traditur, inquit, ab Epicuro ratio neglegendi doloris. Quid igitur dubitamus in tota eius natura quaerere quid sit effectum? Mihi enim erit isdem istis fortasse iam utendum. Si quae forte-possumus. </p><p>Duo Reges: constructio interrete. Qui-vere falsone, quaerere mittimus-dicitur oculis se privasse; Verum hoc idem saepe faciamus. Nec vero alia sunt quaerenda contra Carneadeam illam sententiam. Praeterea sublata cognitione et scientia tollitur omnis ratio et vitae degendae et rerum gerendarum. Nam ista vestra: Si gravis, brevis; Sed tamen est aliquid, quod nobis non liceat, liceat illis. Utrum igitur tibi litteram videor an totas paginas commovere? Inscite autem medicinae et gubernationis ultimum cum ultimo sapientiae comparatur. </p><p>Cur ipse Pythagoras et Aegyptum lustravit et Persarum magos adiit? Varietates autem iniurasque fortunae facile veteres philosophorum praeceptis instituta vita superabat. Restincta enim sitis stabilitatem voluptatis habet, inquit, illa autem voluptas ipsius restinctionis in motu est. Quae cum praeponunt, ut sit aliqua rerum selectio, naturam videntur sequi; </p><p>Isto modo ne improbos quidem, si essent boni viri. Si id dicis, vicimus. Sed tu istuc dixti bene Latine, parum plane. Dat enim intervalla et relaxat. Qui ita affectus, beatum esse numquam probabis; Ergo id est convenienter naturae vivere, a natura discedere. Quam tu ponis in verbis, ego positam in re putabam. Scio enim esse quosdam, qui quavis lingua philosophari possint; </p>";

        $header_title = \App\model\Setting::where("name", "title")->get("value")->first()["value"];

        $banner_url = "http://hodhod-gift.ir/reset_password.png";

        $opt = "option txt";
        return view("Email.Mail", compact(["opt", "title", "user", "text", "banner_url", "header_title"]));
    });
    Route::get('new_ticket', function () {
        $user= User::find(auth()->id());
        event(new \App\Event\Event\newTicketEvent("لنتی","برو لامصب :|",$user));
        return $user;
    });
    Route::get("order",function (){
        $order=Order::find(220);
        //return $order;
        event(new \App\Event\Event\newOrderEvent($order,false));
        return "ok";
    });
    Route::get("order",function (){
        $product=\App\model\Product::find(19);
        //return $order;
        event(new \App\Event\Event\newProductEvent($product));
        return $product;
    });

});


Route::post('/test/store', "TestController@store")->name("test.store");
Route::get('/test/index', "TestController@index")->name("test.index");
Route::get('/test/migrate', "TestController@migrate");
Route::get('/test/hash', "TestController@hash");
Route::get('/test/create-user', "TestController@createUser");
Route::get('/test/change', "TestController@changePermissionIndex");
Route::post('/test/change-permission', "TestController@changePermission")->name("change.permission");


Route::get('/', 'HomeController@home')->name('welcome');
//Route::get('/pro', "Api\ProductController@getAllProduct");

Auth::routes();
Route::middleware(['auth', 'verified'])->group(function () {
    /*profile*/
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
    /*home*/
    Route::get('/home', 'HomeController@index')->name('home');
    /*ticket*/
    Route::get('ticket', 'TicketController@index')->name('ticket.index')->middleware('can:create-ticket');
    Route::post('ticket/{ticket}', 'TicketController@update')->name('ticket.update')->middleware('can:create-ticket');
    Route::get('ticket/{ticket}', 'CommentController@getTicket')->name('getTicket')->middleware('can:create-ticket');
    /*comment*/
    Route::post('comment/{ticket}', 'CommentController@sendComment')->name('sendComment')->middleware('can:create-ticket');
    /*updatePasswordUser*/
    Route::put('/updatePasswordUser/{user}', 'AllController@updatePassword')->name('user.password');
    Route::put('/updatePasswordProfile/{user}', 'AllController@updateProfile')->name('profile.password');
    /*user*/
    Route::post("user/restore","UserController@restore")->name("user.restore")->middleware('can:create-user');
    Route::delete("user/force/destroy","UserController@forceDestroy")->name("user.force.destroy")->middleware('can:create-user');
    Route::resource('user', 'UserController', ['except' => ['show']])->middleware('can:create-user');
    /*product*/
    Route::post("product/restore","ProductController@restore")->name("product.restore");
    Route::delete("product/force/destroy","ProductController@forceDestroy")->name("product.force.destroy");
    Route::resource('product', 'ProductController')->except(["show"]);
    /*article*/
    Route::post("article/restore","ArticleController@restore")->name("article.restore")->middleware('can:create-article');
    Route::delete("article/force/destroy","ArticleController@forceDestroy")->name("article.force.destroy")->middleware('can:create-article');
    Route::resource('article', 'ArticleController')->middleware('can:create-article')->except(["show"]);
    /*category*/
    Route::post("category/restore","CategoryController@restore")->name("category.restore")->middleware('can:create-category');
    Route::delete("category/force/destroy","CategoryController@forceDestroy")->name("category.force.destroy")->middleware('can:create-category');
    Route::resource('category', 'CategoryController')->middleware('can:create-category')->except(["show"]);
    /*slider*/
    Route::post("slider/restore","SliderController@restore")->name("slider.restore")->middleware('can:create-slider');
    Route::delete("slider/force/destroy","SliderController@forceDestroy")->name("slider.force.destroy")->middleware('can:create-slider');
    Route::resource('slider', 'SliderController')->middleware('can:create-slider')->except(["show"]);
    /*media*/
    Route::resource('media', 'MediaController')->middleware('can:create-slider');
    /*banner*/
    Route::post("banner/restore","BannerController@restore")->name("banner.restore")->middleware('can:create-banner');
    Route::delete("banner/force/destroy","BannerController@forceDestroy")->name("banner.force.destroy")->middleware('can:create-banner');
    Route::get('bannerr/create2', 'BannerController@create2')->name('banner.create2')->middleware('can:create-banner');
    Route::post('bannerr/store2', 'BannerController@store2')->name('banner.store2')->middleware('can:create-banner');
    Route::put('bannerr/{banner}/update2', 'BannerController@update2')->name('banner.update2')->middleware('can:create-banner');
    Route::get('bannerr/{banner}/edit2', 'BannerController@edit2')->name('banner.edit2')->middleware('can:create-banner');
    Route::resource('banner', 'BannerController')->middleware('can:create-banner')->except(["show"]);
    /*color*/
    Route::post("color/restore","ColorController@restore")->name("color.restore")->middleware('can:create-color');
    Route::delete("color/force/destroy","ColorController@forceDestroy")->name("color.force.destroy")->middleware('can:create-color');
    Route::resource('color', 'ColorController')->middleware('can:create-color')->except(["show"]);
    /*brand*/
    Route::post("brand/restore","BrandController@restore")->name("brand.restore")->middleware('can:create-brand');
    Route::delete("brand/force/destroy","BrandController@forceDestroy")->name("brand.force.destroy")->middleware('can:create-brand');
    Route::resource('brand', 'BrandController')->middleware('can:create-brand')->except(["show"]);
    /*size*/
    Route::post("size/restore","SizeController@restore")->name("size.restore")->middleware('can:create-size');
    Route::delete("size/force/destroy","SizeController@forceDestroy")->name("size.force.destroy")->middleware('can:create-size');
    Route::resource('size', 'SizeController')->middleware('can:create-size')->except(["show"]);
    /*design*/
    Route::post("design/restore","DesignController@restore")->name("design.restore")->middleware('can:create-design');
    Route::delete("design/force/destroy","DesignController@forceDestroy")->name("design.force.destroy")->middleware('can:create-design');
    Route::resource('design', 'DesignController')->middleware('can:create-design')->except(["show"]);
    /*order*/
    Route::resource('order', 'OrderController')->middleware('can:show-order')->except(["show"]);
    /*social*/
    Route::post("social/restore","SocialController@restore")->name("social.restore")->middleware('can:create-setting');
    Route::delete("social/force/destroy","SocialController@forceDestroy")->name("social.force.destroy")->middleware('can:create-setting');
    Route::resource('social', 'SocialController')->middleware('can:create-setting')->except(["show"]);
    /*setting*/
    Route::resource('setting', 'SettingController')->middleware('can:create-setting')->except(["show"]);
    /*province*/
    Route::resource('province', 'ProvinceController')->middleware('can:create-province')->except(["show", "create", "edit", "update"]);
    /*qas*/
    Route::post("qas/restore","QasController@restore")->name("qas.restore")->middleware('can:create-qas');
    Route::delete("qas/force/destroy","QasController@forceDestroy")->name("qas.force.destroy")->middleware('can:create-qas');
    Route::resource('qas', 'QasController')->middleware('can:create-qas')->except(["show"]);
    /*discount*/
    Route::post("discount/restore","DiscountController@restore")->name("discount.restore")->middleware('can:create-discount');
    Route::delete("discount/force/destroy","DiscountController@forceDestroy")->name("discount.force.destroy")->middleware('can:create-discount');
    Route::resource('discount', 'DiscountController')->middleware('can:create-discount')->except(["show", ""]);
    /*map*/
    Route::resource('map', 'MapController')->middleware("can:show-map")->except(["show", "destroy", "edit", "update", "store"]);
    /**/

});
