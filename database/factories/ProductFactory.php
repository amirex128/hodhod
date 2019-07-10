<?php
	
	use App\model\Brand;
	use App\model\Product;
	use Carbon\Carbon;

$factory->define(Product::class, function () {
	$faker = Faker\Factory::create('fa_IR');
	
	return [
		'title' => $faker->realText(),
		'brand_id' =>  function () {
			return factory(Brand::class)->create()->id;
		},
		'description' => $faker->realText(),
		'body' => $faker->realText(2000),
		'video' => $faker->imageUrl(512,512), // password
		'stock' => rand(0,1000),
		'price' => rand(1000,10000000),
		'offer' => rand(1000,200000),
		'image' => $faker->imageUrl(512,512),
		'gallery' => [$faker->imageUrl(512,512),$faker->imageUrl(512,512),$faker->imageUrl(512,512),$faker->imageUrl(512,512),$faker->imageUrl(512,512)],
		'special' => rand(0,1),
		'status' => rand(0,1),
		'situation' => rand(1,4),
		'view_count' => rand(1,1000),
		'order_count' => rand(1,1000),
		'created_at' => Carbon::now()->addHours(rand(1,5))->addMinutes(rand(1,59))->addSeconds(rand(1,59)),
	];
});
