<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\WeChat::class, function (Faker $faker) {
    return [
        'open_id' => 'wx49bbe08c88598089|' . $faker->regexify('[A-Z0-9._%+-]{22}'),
        'union_id' => $faker->regexify('[A-Z0-9._%+-]{28,32}'),
        'avatar' => $faker->imageUrl,
        'nickname' => $faker->name,
        'sex' => mt_rand(0, 2),
        'country' => $faker->country,
        'province' => $faker->state,
        'city' => $faker->city,
        'mobile' => $faker->phoneNumber,
        'status' => 1,
    ];
});
