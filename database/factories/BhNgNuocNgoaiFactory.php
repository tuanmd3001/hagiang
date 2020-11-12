<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\BhNgNuocNgoai;
use Faker\Generator as Faker;

$factory->define(BhNgNuocNgoai::class, function (Faker $faker) {

    return [
        'ho_ten' => $faker->word,
        'quoc_tich' => $faker->word,
        'so_ho_chieu' => $faker->word,
        'noi_dung' => $faker->text,
        'dia_chi' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
