<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Report;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Report::class, function (Faker $faker) {
    $workItems = App\WorkItem::pluck('id')->toArray();

    return [
        'report_type' => $faker->name,
        'location' => $faker->city,
        'description' => $faker->realText,
        'start_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'end_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
    ];
});
