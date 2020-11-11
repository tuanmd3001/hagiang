<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\NguonOda;
use Faker\Generator as Faker;

$factory->define(NguonOda::class, function (Faker $faker) {

    return [
        'ten' => $faker->word,
        'tong_von' => $faker->word,
        'dia_ban' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
