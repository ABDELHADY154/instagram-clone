<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, User::all()->count()),
        'image' => 'demo' . rand(1, 5) . '.jpg',
        'caption' => $faker->text(200),
        'like_no' => 0,
        'comment_no' => 0,
    ];
});
