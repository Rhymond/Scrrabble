<?php

$factory->define(App\Player::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'surname' => $faker->lastName,
        'club' => $faker->word,
        'email' => $faker->email,
        'contact_number' => $faker->phoneNumber,
    ];
});