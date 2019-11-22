<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CheckListItem;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(CheckListItem::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});
