<?php

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $name = $faker->lastName,
        'username' => strtolower($name),
        'password' => bcrypt('123'),
        'remember_token' => str_random(10),
    ];
});
