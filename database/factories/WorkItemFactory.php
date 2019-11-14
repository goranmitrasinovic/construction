<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\WorkItem;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(WorkItem::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'quantity' => $faker->randomDigit,
        'quantity_type' => $faker->randomLetter,
    ];
});
