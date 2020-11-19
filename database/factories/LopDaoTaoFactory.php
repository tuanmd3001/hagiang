<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\LopDaoTao;
use Faker\Generator as Faker;

$factory->define(LopDaoTao::class, function (Faker $faker) {

    return [
        'type' => $faker->randomDigitNotNull,
        'ten' => $faker->word,
        'noi_dung' => $faker->text,
        'thoi_gian' => $faker->word,
        'dia_diem' => $faker->word,
        'so_luong' => $faker->randomDigitNotNull,
        'bao_cao' => $faker->word,
        'kinh_phi' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
