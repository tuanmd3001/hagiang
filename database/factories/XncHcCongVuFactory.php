<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\XncHcCongVu;
use Faker\Generator as Faker;

$factory->define(XncHcCongVu::class, function (Faker $faker) {

    return [
        'hc_id' => $faker->randomDigitNotNull,
        'ngay_xnc' => $faker->word,
        'noi_dung' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
