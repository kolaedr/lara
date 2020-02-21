<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\News;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'content' => $faker->text($maxNbChars = 500),
        'img'=>$faker->imageUrl($width = 640, $height = 480),
        'category_id' => $faker->numberBetween($min = 1, $max = 10)
    ];
});
