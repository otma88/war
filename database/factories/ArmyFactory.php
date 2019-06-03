<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Army::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'number_of_soliders' => 50,
        'number_of_generals' => 5,
    ];
});
