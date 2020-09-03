<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Techlink\Cms\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function(Faker $faker) {

    $user = collect(User::all()->modelKeys());
    $category = collect(Category::all()->modelKeys());

    return [
        'user_id' => $faker->randomElement($user),
        'parent_id' => $faker->randomElement($category),
        'name' => $faker->word,
        'slug' => $faker->slug,
        'description' => $faker->paragraph($nbSentences = 10, $variableNbSentences = true),
    ];
});
