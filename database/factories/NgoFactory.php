<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Ngo;
use Faker\Generator as Faker;

$factory->define(Ngo::class, function (Faker $faker) {

    return [
        'ten' => $faker->word,
        'noi_dung' => $faker->text,
        'dia_ban' => $faker->text,
        'giay_phep' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
