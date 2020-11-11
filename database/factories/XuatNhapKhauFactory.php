<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\XuatNhapKhau;
use Faker\Generator as Faker;

$factory->define(XuatNhapKhau::class, function (Faker $faker) {

    return [
        'ten' => $faker->word,
        'kim_ngach' => $faker->randomDigitNotNull,
        'loai_hinh' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
