<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Ttqt;
use Faker\Generator as Faker;

$factory->define(Ttqt::class, function (Faker $faker) {

    return [
        'type' => $faker->randomDigitNotNull,
        'co_quan_de_xuat' => $faker->word,
        'danh_nghia_ky' => $faker->word,
        'loai_van_ban' => $faker->randomDigitNotNull,
        'ten_van_ban' => $faker->word,
        'nuoc_ky' => $faker->word,
        'ten_doi_tac' => $faker->word,
        'ngay_ky' => $faker->word,
        'tinh_trang_hieu_luc' => $faker->randomDigitNotNull,
        'ngay_hieu_luc' => $faker->word,
        'thoi_han_hieu_luc' => $faker->word,
        'nguoi_ky' => $faker->word,
        'cap_phe_duyet' => $faker->word,
        'uy_quyen' => $faker->randomDigitNotNull,
        'ghi_chu' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
