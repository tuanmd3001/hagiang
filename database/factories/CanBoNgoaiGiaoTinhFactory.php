<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CanBoNgoaiGiaoTinh;
use Faker\Generator as Faker;

$factory->define(CanBoNgoaiGiaoTinh::class, function (Faker $faker) {

    return [
        'ho_ten' => $faker->word,
        'don_vi' => $faker->word,
        'chuc_danh' => $faker->word,
        'sdt' => $faker->word,
        'email' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
