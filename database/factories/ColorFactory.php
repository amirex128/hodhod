<?php
	
	use App\model\Color;
	use Carbon\Carbon;

$factory->define(Color::class, function () {
	$faker = Faker\Factory::create('fa_IR');
	
	return [
	    "title"=>$faker->colorName,
	    "code"=>$faker->hexColor,
	    "created_at"=>Carbon::now()->addHours(rand(1,5))->addMinutes(rand(1,59))->addSeconds(rand(1,59)),
	    "updated_at"=>Carbon::now()
    ];
});
