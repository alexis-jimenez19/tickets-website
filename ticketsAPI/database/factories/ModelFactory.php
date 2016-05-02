<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/*
$factory->define(App\User::class, function ($faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => str_random(10),
        'remember_token' => str_random(10),
    ];
});
*/



$factory->define(App\Administrador::class, function ($faker) {
    return [
        'nombre_a' => $faker->firstName,
        'apellido_a' => $faker->lastName,
        'correo_a' => $faker->email,
        'username_a'=> $faker->userName,
        'password_a' => $faker->password,
        'pais_a' => $faker->country,
        'estado_a' => $faker->state,
        'direccion_a' => $faker->streetAddress,
        'telefono_a' => $faker->phoneNumber,
        'celular_a' => $faker->phoneNumber,
        'rol_id' => $faker->numberBetween($min = 1, $max = 4),
    ];
});



$factory->define(App\Evento::class, function ($faker) {
    return [
    	'nombre_e'=> $faker->text($maxNbChars = 40),
        'ciudad_e'=> $faker->city,
        'estado_e'=> $faker->state,
        'pais_e'=> $faker->country,
        'lugar_e'=> $faker->streetName,
        'fecha_e'=> $faker->date,
        'hora_e'=> $faker->time($format = 'H:i:s', $max = 'now'),
        'inicio_venta'=> $faker->date,
        'imagen_e'=> $faker->imageUrl($width = 640, $height = 480),
        'subcategoria_id' => $faker->numberBetween($min = 1, $max = 11),
        'administrador_id' => $faker->numberBetween($min = 1, $max = 20),
    ];
});

$factory->define(App\Boleto::class, function ($faker) {
    return [
    		'nombre_b'=> $faker-> sentence($nbWords = 6, $variableNbWords = true),
            'precio_b'=> $faker->numberBetween($min = 300, $max = 9000),
            'cantidad_b_disponibles'=> $faker->numberBetween($min = 100, $max = 200),
            'numero_referencia'=> $faker->creditCardNumber,
            'evento_id' => $faker->numberBetween($min = 1, $max = 30),
    ];
});

$factory->define(App\Cliente::class, function ($faker) {
    return [
    		'nombre_u'=> $faker->firstName,
            'apellido_u'=> $faker->lastName,
            'correo_u'=> $faker->email,
            'username_u'=> $faker->userName,
            'password_u'=> $faker->password,
            'pais_u'=> $faker->country,
            'estado_u'=> $faker->state,
            'direccion_u'=> $faker->streetAddress,
            'telefono_u'=> $faker->phoneNumber,
            'celular_u'=> $faker->phoneNumber,
    ];
});

$factory->define(App\BoletoCliente::class, function ($faker) {
    return [
            'nombre_b'=> $faker-> sentence($nbWords = 6, $variableNbWords = true),
            'precio_b'=> $faker->numberBetween($min = 300, $max = 9000),
            'cantidad_b_comprados'=> $faker->numberBetween($min = 1, $max = 4),
            'evento_id' => $faker->numberBetween($min = 1, $max = 30),
            'cliente_id' => $faker->numberBetween($min = 1, $max = 50),
    ];
});