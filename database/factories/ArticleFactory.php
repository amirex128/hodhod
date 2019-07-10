<?php

	use App\model\Article;
use App\model\Order;
use Carbon\Carbon;
use Faker\Factory;

$factory->define(Article::class, function () {
		$faker = Faker\Factory::create('fa_IR');

		return [
	    "title"=>$faker->realText(),
	    "description"=>$faker->realText(),
	    "body"=>$faker->realText(2000),
	    "image"=>$faker->imageUrl(),
	    "created_at"=>Carbon::now()->addHours(rand(1,5))->addMinutes(rand(1,59))->addSeconds(rand(1,59)),
	    "updated_at"=>Carbon::now()
    ];
});
$factory->define(Order::class, function () {
    $faker = Faker\Factory::create('fa_IR');

    return [
        "user_id"=>1,
        "province_id"=>1,
        "payment_type"=>1,
        "surprize"=>1,
        "total_price"=>654654654,
        "created_at"=>Carbon::now()->addMonth(rand(1,12))
    ];
});
