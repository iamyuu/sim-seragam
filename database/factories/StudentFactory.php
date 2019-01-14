<?php

use Faker\Generator as Faker;

$factory->define(App\Student::class, function (Faker $faker) {
    return [
    	'no_daftar' => random_int(0001, 9999),
    	'nama_lengkap' => $faker->name,
    	'jenis_kelamin' => random_int(1, 2),
    	'no_hp' => $faker->phoneNumber,
    	'agama' => random_int(1, 5),
    	'asal_smp' => 'SMP '.$faker->city
    ];
});
