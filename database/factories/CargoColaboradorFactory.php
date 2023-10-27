<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cargo;
use App\CargoColaborador;
use Faker\Generator as Faker;

$factory->define(CargoColaborador::class, function (Faker $faker) {
    $cargo = Cargo::inRandomOrder()->first();
    $colaborador = CargoColaborador::getCheckStaffWithoutJob();

    return [
        'cargo_id' => $cargo->id,
        'colaborador_id' => $colaborador->id,
        'nota_desempenho' => $faker->randomFloat(2, 0, 10),
    ];

});
