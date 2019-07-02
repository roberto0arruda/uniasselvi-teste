<?php

use Faker\Generator as Faker;
use App\Models\Cliente;

$factory->define(Cliente::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'cpf' => $faker->unique()->numerify("###########"),
        'email' => $faker->unique()->safeEmail,
    ];
});
