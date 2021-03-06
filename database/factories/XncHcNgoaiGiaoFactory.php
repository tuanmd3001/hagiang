<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\XncHcNgoaiGiao;
use Faker\Generator as Faker;

$factory->define(XncHcNgoaiGiao::class, function (Faker $faker) {

    return [
        'hc_id' => $faker->randomDigitNotNull,
        'ngay_xnc' => $faker->word,
        'noi_dung' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
