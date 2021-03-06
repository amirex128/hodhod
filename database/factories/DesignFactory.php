<?php
	
	use App\model\Design;
	use Carbon\Carbon;

$factory->define(Design::class, function () {
	$faker = Faker\Factory::create('fa_IR');
	
	return [
	    "title"=>$faker->realText(25),
	    "created_at"=>Carbon::now()->addHours(rand(1,5))->addMinutes(rand(1,59))->addSeconds(rand(1,59)),
	    "updated_at"=>Carbon::now()
    ];
});
