<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\SuVuBienGioi;
use Faker\Generator as Faker;

$factory->define(SuVuBienGioi::class, function (Faker $faker) {

    return [
        'ten' => $faker->word,
        'noi_dung' => $faker->text,
        'dia_ban' => $faker->word,
        'giai_quyet' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
