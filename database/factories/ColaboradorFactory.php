<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Colaborador;
use App\Unidade;
use Faker\Generator as Faker;

$factory->define(Colaborador::class, function (Faker $faker) {
    $unidade = Unidade::inRandomOrder()->first();
    return [
        'unidade_id' => $unidade->id,
        'nome' => $faker->name,
        'cpf' => $faker->unique()->numerify('###########'),
        'email' => $faker->unique()->safeEmail,
    ];
});
