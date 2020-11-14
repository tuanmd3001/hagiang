<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ChuKy;
use Faker\Generator as Faker;

$factory->define(ChuKy::class, function (Faker $faker) {

    return [
        'ten' => $faker->word,
        'file' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
