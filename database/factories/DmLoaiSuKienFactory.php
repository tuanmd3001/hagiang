<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Danh_Muc\DmLoaiSuKien;
use Faker\Generator as Faker;

$factory->define(DmLoaiSuKien::class, function (Faker $faker) {

    return [
        'ten' => $faker->word,
        'code' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});