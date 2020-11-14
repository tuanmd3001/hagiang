<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\HcNgoaiGiao;
use Faker\Generator as Faker;

$factory->define(HcNgoaiGiao::class, function (Faker $faker) {

    return [
        'so_ho_chieu' => $faker->word,
        'ho_ten' => $faker->word,
        'don_vi' => $faker->word,
        'thoi_han' => $faker->word,
        'loai' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
