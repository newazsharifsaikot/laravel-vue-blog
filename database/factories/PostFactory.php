<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id'=>random_int(1,10),
        'category_id'=>random_int(1,10),
        'title'=> $faker->sentence($nbWords = 6, $variableNbWords = true),
        'description'=> $faker->text($maxNbChars = 250),
        'image'=>$faker->imageUrl,

    ];
});
