<?php

require_once __DIR__ . "/../lib/php/devuelveJson.php";

try {
    $datos = [
        ["id" => 1, "nombre" => "Ciudad A", "poblacion" => 500000],
        ["id" => 2, "nombre" => "Ciudad B", "poblacion" => 300000],
        ["id" => 3, "nombre" => "Ciudad C", "poblacion" => 1000000],
    ];

    // Devuelve los datos como JSON
    devuelveJson(["ciudades" => $datos]);
} catch (Throwable $error) {
    require_once __DIR__ . "/../lib/php/devuelveErrorInterno.php";
    devuelveErrorInterno($error);
}
