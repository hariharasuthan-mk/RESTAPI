<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\usersfiles;
use App\User;




$factory->define(usersfiles::class, function (Faker $faker) {
    return [       
        'title'       => $faker->sentence(2),
        'src'         => $faker->imageUrl(400, 300),
        'mime_type'   => 'image/png',
        'user_id'     => factory(App\User::class),        
        'description' => $faker->sentence(5),
    ];
});
