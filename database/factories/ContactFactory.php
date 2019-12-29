<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Contact;
use App\Enums\Priority;
use Faker\Generator as Faker;

$factory->define(Contact::class, function (Faker $faker) {
    return [
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'email' => $faker->safeEmail,
        'birthdate' => $faker->date(),
        'priority' => Priority::getRandomValue(),
    ];
});
