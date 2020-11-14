<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Abtc;
use Faker\Generator as Faker;

$factory->define(Abtc::class, function (Faker $faker) {

    return [
        'ho_ten' => $faker->word,
        'so_the' => $faker->word,
        'don_vi' => $faker->word,
        'thoi_han' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
