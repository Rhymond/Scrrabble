<?php

$factory->define(App\Game::class, function (Faker\Generator $faker) {
    return [
        'winner_id' => App\Player::all()->random()->id,
        'looser_id' => App\Player::all()->random()->id
    ];
});