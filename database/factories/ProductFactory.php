<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => implode(" ", $faker->words(3)),
        'slug' => Str::slug(implode(" ", $faker->words(3)), '-'),
        'description' => $faker->sentence(10),
        'long_description' => $faker->text,
        'price' => $faker->randomFloat(2, 5, 150),
        'category_id' => $faker->numberBetween(1, 5),
    ];
});
