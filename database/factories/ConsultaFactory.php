<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Consulta;
use Faker\Generator as Faker;

$factory->define(Consulta::class, function (Faker $faker) {
    return [
        'cantPacientes' => rand(1,10),
        'nombreEspecialista' => $faker->name,
        'tipoConsulta' => $faker->randomElement(Consulta::TIPO_CONSULTA),
        'estado' => $faker->randomElement(Consulta::ESTADO)
    ];
});
