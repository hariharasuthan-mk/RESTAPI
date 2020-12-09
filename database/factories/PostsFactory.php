<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Posts;




$factory->define(Posts::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(5), //$faker->title
        'subtitle' => $faker->sentence(3), //$faker->word
        'content' => $faker->paragraph,
        'author_id' => factory(App\User::class),
        'published_at' => "2008-04-25 08:37:17",
        'active' => 'yes',

   ];
});
