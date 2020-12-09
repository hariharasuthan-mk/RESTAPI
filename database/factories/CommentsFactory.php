<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Comments;


$factory->define(Comments::class, function (Faker $faker) {
    return [
        
        'subtitle' => $faker->sentence(3), //$faker->word
        'content' => $faker->paragraph,
        'author_id' => factory(App\User::class),
        'post_id' => factory(App\Posts::class),
        'active' => 'yes',

        

   ];
});

