<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\LanhSuTinh;
use Faker\Generator as Faker;

$factory->define(LanhSuTinh::class, function (Faker $faker) {

    return [
        'ten' => $faker->word,
        'noi_dung' => $faker->text,
        'dia_ban' => $faker->text,
        'giai_quyet' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
