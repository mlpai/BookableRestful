<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Bookable;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;

$suffix = [
    'Villa',
    'Cottage',
    'House',
    'Kothi',
    'Ghar',
    'Farm'
];

$factory->define(Bookable::class, function (Faker $faker) use($suffix) {
    return [
        'title' => $faker->city.' '.Arr::random($suffix) ,      //
        'description' => $faker->text()
    ];
});
