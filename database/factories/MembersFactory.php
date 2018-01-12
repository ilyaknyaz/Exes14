<?php

use Faker\Generator as Faker;

$factory->define(App\Member::class, function (Faker $faker) {
    return [
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'avatar' => $faker->image(),
        'info' => $faker->text(),
        'status' => $faker->randomElement(['В игре', 'Выбыл']),
        'direction_id' => function () {
            return factory(App\Direction::class)->create()->id;
        }
    ];
});