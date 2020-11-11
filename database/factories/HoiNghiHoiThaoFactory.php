<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\HoiNghiHoiThao;
use Faker\Generator as Faker;

$factory->define(HoiNghiHoiThao::class, function (Faker $faker) {

    return [
        'ten' => $faker->word,
        'loai' => $faker->randomDigitNotNull,
        'noi_dung' => $faker->text,
        'db_vn' => $faker->randomDigitNotNull,
        'db_nn_trong_nuoc' => $faker->randomDigitNotNull,
        'db_nn_ngoai_nuoc' => $faker->randomDigitNotNull,
        'db_cac_nuoc_den' => $faker->text,
        'thoi_gian' => $faker->date('Y-m-d H:i:s'),
        'dia_diem' => $faker->text,
        'kinh_phi' => $faker->randomDigitNotNull,
        'bao_cao' => $faker->text,
        'trong_kh' => $faker->randomDigitNotNull,
        'cap_cho_phep' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
