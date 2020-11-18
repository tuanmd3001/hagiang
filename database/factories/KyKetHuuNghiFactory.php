<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\KyKetHuuNghi;
use Faker\Generator as Faker;

$factory->define(KyKetHuuNghi::class, function (Faker $faker) {

    return [
        'ten' => $faker->text,
        'ngay_ky' => $faker->word,
        'tinh_hinh' => $faker->word,
        'ket_qua' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
