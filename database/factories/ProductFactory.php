<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Product;
use Faker\Generator as Faker;
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

$factory->define(Product::class, function (Faker $faker) {
    return [
       'sku' => $faker->unique()->ean8,
        'name' => $faker->word,
        'quantity' => $faker->numberBetween($min = 1000, $max = 9000),
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 10000.00),
        'description' => $faker->text($maxNbChars = 200),
        'picture' => 'product.jpg'
    ];
});
