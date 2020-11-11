<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\DuAnOda;
use Faker\Generator as Faker;

$factory->define(DuAnOda::class, function (Faker $faker) {

    return [
        'ten' => $faker->word,
        'noi_dung' => $faker->text,
        'chu_dau_tu' => $faker->word,
        'giai_ngan' => $faker->text,
        'dia_ban' => $faker->text,
        'ket_qua' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
