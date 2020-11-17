<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\DoanRa;
use Faker\Generator as Faker;

$factory->define(DoanRa::class, function (Faker $faker) {

    return [
        'level' => $faker->randomDigitNotNull,
        'ten_doan' => $faker->word,
        'nuoc_di' => $faker->randomDigitNotNull,
        'doi_tac' => $faker->word,
        'noi_dung' => $faker->text,
        'so_nguoi' => $faker->randomDigitNotNull,
        'thoi_gian' => $faker->word,
        'kinh_phi' => $faker->randomDigitNotNull,
        'bao_cao' => $faker->word,
        'trong_kh' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
