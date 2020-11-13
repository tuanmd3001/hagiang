<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\NgHgNuocNgoai;
use Faker\Generator as Faker;

$factory->define(NgHgNuocNgoai::class, function (Faker $faker) {

    return [
        'quoc_gia' => $faker->word,
        'so_luong' => $faker->randomDigitNotNull,
        'nganh_nghe' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
