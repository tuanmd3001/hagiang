<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Danh_Muc\DmDonVi;
use Faker\Generator as Faker;

$factory->define(DmDonVi::class, function (Faker $faker) {

    return [
        'ten' => $faker->word,
        'code' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
