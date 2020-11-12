<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\DnVonNuocNgoai;
use Faker\Generator as Faker;

$factory->define(DnVonNuocNgoai::class, function (Faker $faker) {

    return [
        'ten' => $faker->word,
        'noi_dung' => $faker->text,
        'so_du_an' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
