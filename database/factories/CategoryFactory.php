<?php
	
	use App\model\Category;
	use Carbon\Carbon;

$factory->define(Category::class, function () {
	$faker = Faker\Factory::create('fa_IR');
	
	return [
	    'name' => $faker->realText(25),
	    'parent_id' => rand(1,10),
	    'image' => $faker->imageUrl(),
	    'icon' => $faker->imageUrl(144,144),
	    "created_at"=>Carbon::now()->addHours(rand(1,5))->addMinutes(rand(1,59))->addSeconds(rand(1,59)),
	    "updated_at"=>Carbon::now()
    ];
});
