<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Blog;
use Faker\Generator as Faker;

$factory->define(Blog::class, function (Faker $faker) {
    return [
        "name" => $faker->name(),
        "email" => $faker->email(),
        "body" => $faker->paragraph(),
        "ishidden"=>rand(0,1),
        "user_id"=>1
    ];
});
