<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Enums\NoteType;
use Faker\Generator as Faker;

$factory->define(App\Note::class, function (Faker $faker) {
    return [
        'contact_id' => 1,
        'type' => NoteType::Interaction,
        'body' => $faker->sentences(2),
    ];
});
