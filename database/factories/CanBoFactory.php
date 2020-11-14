<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CanBo;
use Faker\Generator as Faker;

$factory->define(CanBo::class, function (Faker $faker) {

    return [
        'ten' => $faker->word,
        'ngay_sinh' => $faker->word,
        'gioi_tinh' => $faker->randomDigitNotNull,
        'sdt' => $faker->word,
        'email' => $faker->word,
        'noi_cong_tac' => $faker->word,
        'noi_o' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
