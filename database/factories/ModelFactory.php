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

$factory->define(App\Product::class, function (Faker\Generator $faker)
{
	$name = substr($faker->sentence, 0, -1);
	$url = strtolower(str_replace(' ', '-', $name));

	return [
		'name' => $name,
		'short_description' => $faker->paragraph,
		'url' => $url,
		'sku' => $faker->randomNumber(6),
		'stock' => $faker->randomDigit,
		'minimum_stock' => 0,
		'price' => $faker->randomFloat(2, 10, 500),
		'discount_price' => 0.00,
		'discount_percentage' => 0.00,
		'weight' => $faker->randomFloat(2, 1, 25),
		'width' => $faker->randomFloat(2, 1, 25),
		'length' => $faker->randomFloat(2, 1, 25),
		'height' => $faker->randomFloat(2, 1, 25),
		'description' => $faker->paragraphs(3, true),
		'status' => 1
	];
});

$factory->define(App\Review::class, function (Faker\Generator $faker)
{
	return [
		'product_id' => App\Product::all()->random()->id,
		'title' => substr($faker->sentence, 0, -1),
		'text' => $faker->paragraphs(3, true),
		'stars' => $faker->regexify('[1-5]'),
		'status' => $faker->boolean(70)
	];
});

$factory->define(App\Category::class, function (Faker\Generator $faker)
{
	return [
		'name' => $faker->word
	];
});

$factory->define(App\Subcategory::class, function (Faker\Generator $faker)
{
	return [
		'name' => $faker->word,
		'category_id' => App\Category::all()->random()->id
	];
});

$factory->define(App\Brand::class, function (Faker\Generator $faker)
{
	return [
		'name' => $faker->word
	];
});

$factory->define(App\AttributeType::class, function (Faker\Generator $faker)
{
	return [
		'name' => $faker->word,
		'is_grouping' => 0
	];
});

$factory->define(App\Attribute::class, function (Faker\Generator $faker)
{
	$identifyer_type = $faker->randomElement($arr = ['none', 'color', 'image', 'text', 'colorname']);

	switch($identifyer_type)
	{
		case "none" : $identifyer = ""; break;
		case "color" :
		case "colorname" : $identifyer = $faker->hexcolor; break;
		case "image" : $identifyer = $faker->image('upload', 100, 100); break;
		case "text" : $identifyer = $faker->word; break;
	}

	return [
		'name' => $faker->word,
		'attribute_type_id' => App\AttributeType::all()->random()->id,
		'identifyer_type' => $identifyer_type,
		'identifyer' => $identifyer
	];
});

$factory->define(App\Customer::class, function (Faker\Generator $faker)
{
	$apelido = $faker->firstName;
	$nome = $apelido . ' ' . $faker->lastName;

	return [
		'name' => $nome,
		'nickname' => $apelido,
		'cpf' => $faker->cpf,
		'rg' => $faker->rg,
		'password' => bcrypt('123'),
		'birth_date' => $faker->date,
		'phone' => $faker->phoneNumber,
		'mobile' => $faker->cellPhoneNumber
	];
});

$factory->define(App\CustomerAddress::class, function (Faker\Generator $faker)
{
	return [
		'customer_id' => App\Customer::all()->random()->id,
		'address_type' => ucfirst($faker->word),
		'address' => $faker->streetName,
		'number' => $faker->buildingNumber,
		'complement' => $faker->secondaryAddress,
		'district' => $faker->cityPrefix,
		'cep' => $faker->postcode,
		'state' => $faker->stateAbbr,
		'city' => $faker->city,
		'reference' => $faker->secondaryAddress
	];
});

$factory->define(App\ProductImages::class, function (Faker\Generator $faker)
{
	$product_id => App\Product::all()->random()->id;
	$order = App\Product::find($product_id)->images->count() + 1;
	$main = $order == 1 ? 1 : 0;

	return [
		'product_id' => $product_id,
		'title' => substr($faker->sentence, 0, -1),
		'image' => $faker->image('upload', 800, 600),
		'order' => $order,
		'main' => $main
	];
});
