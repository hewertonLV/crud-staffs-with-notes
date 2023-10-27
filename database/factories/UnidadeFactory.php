<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Unidade;
use Faker\Generator as Faker;

$factory->define(Unidade::class, function (Faker $faker) {
    return [
        'nome_fantasia' => $faker->company,
        'razao_social' => $faker->company,
        'cnpj' => $faker->unique()->numerify('##############'),
    ];
});
