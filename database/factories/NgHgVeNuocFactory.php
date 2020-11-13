<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\NgHgVeNuoc;
use Faker\Generator as Faker;

$factory->define(NgHgVeNuoc::class, function (Faker $faker) {

    return [
        'ten' => $faker->word,
        'quoc_gia' => $faker->word,
        'noi_dung' => $faker->text,
        'dia_phuong' => $faker->word,
        'thoi_gian' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
