<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
$factory->define(User::class, function () {
	static $password;
	$faker = Faker\Factory::create('fa_IR');

    return [
		'name' => $faker->firstName(),
		'lname' => $faker->lastName(),
		'phone' => $faker->phoneNumber,
		'avatar' => $faker->imageUrl(128,128),
		'status' => rand(0,1),
		'sms_status' => rand(0,1),
		'address' => $faker->address(),
		'city' => $faker->city(),
		'email_status' => rand(0,1),
		'mac' => $faker->macAddress,
		'email' => $faker->email,
		'email_verified_at' => now(),
		'password' => $password ?: $password = bcrypt('a6766581'), // password
		'remember_token' => Str::random(10),
		'created_at' => Carbon::now()->addHours(rand(1,5))->addMinutes(rand(1,59))->addSeconds(rand(1,59))
    ];
});
