<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\BhNgHaGiang;
use Faker\Generator as Faker;

$factory->define(BhNgHaGiang::class, function (Faker $faker) {

    return [
        'ho_ten' => $faker->word,
        'nam_sinh' => $faker->word,
        'que_quan' => $faker->word,
        'nuoc_lao_dong' => $faker->word,
        'nganh_nghe' => $faker->word,
        'thoi_han' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
