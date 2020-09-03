<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Techlink\Cms\Models\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {

    $user = collect(User::all()->modelKeys());

    return [
        'user_id' => $faker->randomElement($user),
        'name' => $faker->sentence,
        'slug' => $faker->slug,
        'description' => $faker->paragraph($nbSentences = 30, $variableNbSentences = true),
        'excerpt' => $faker->paragraph($nbSentences = 5, $variableNbSentences = true),
        'status' => $faker->boolean($chanceOfGettingTrue = 70),
        'commentable' => $faker->boolean($chanceOfGettingTrue = 70),
        'type' => $faker->randomElement(['post', 'page']),
    ];
});
