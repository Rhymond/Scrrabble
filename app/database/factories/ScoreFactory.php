<?php

$factory->define(App\Score::class, function (Faker\Generator $faker) {
    return [
        'game_id' => App\Game::all()->random()->id,
        'player_id' => App\Player::all()->random()->id,
        'score' => $faker->numberBetween(0, 1000)
    ];
});