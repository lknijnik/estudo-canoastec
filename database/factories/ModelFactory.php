<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Products::class, function (Faker\Generator $faker) {
	return [
		'name' => substr($faker->sentence, 0, -1),
		'short_description' => $faker->paragraph,
		'sku' => $faker->randomNumber(6),
		'stock' => $faker->randomDigit,
		'minimum_stock' => 0,
		'price' => $faker->randomFloat(2, 10, 500),
		'weight' => $faker->randomFloat(2, 1, 25),
		'width' => $faker->randomFloat(2, 1, 25),
		'length' => $faker->randomFloat(2, 1, 25),
		'height' => $faker->randomFloat(2, 1, 25),
		'description' => $faker->paragraphs(3, true),
		'status' => 1
	];
});
