<?php

require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/../lib/php/devuelveErrorInterno.php";

try {
    $lista = [
        [
            "nombre" => "HERNANDEZ RUIZ LUIS ENRIQUE",
            "chiste" => "¿Que hace una abeja en el gym? Zom-ba."
        ],
        [
            "nombre" => "ORTIZ GARCIA JOSE RODRIGO",
            "chiste" => "¿Por qué arrestaron al rompecabezas? Porque estaba armado."
        ],
        [
            "nombre" => "RODRIGUEZ HERRERA EMMANUEL",
            "chiste" => "Doctor ¿Tendre cura? Por supuesto, cura, misa y funeral."
        ],
        [
            "nombre" => "ROMERO HERNANDEZ ANGEL",
            "chiste" => "¿Sabian que el 32% de la salchica es sal? y el resto... chicha"
        ],
        [
            "nombre" => "VERGARA LOPEZ ANGELA LIZETH",
            "chiste" => "!Me acaba de picar una serpiente: ¿Cobra? No, Gratis."
        ],
        [
            "nombre" => "VILLARREAL MATEOS CHRISTOPHER LOGAN",
            "chiste" => "¿Que hace una vaca pensando? pues... pensar... No, hace leche concentrada."
        ]
    ];

    // Genera el código HTML de la lista con separaciones.
    $render = "";
    foreach ($lista as $modelo) {
        // Convierte el nombre a minúsculas y luego pone en mayúsculas la primera letra de cada palabra
        $nombre = ucwords(strtolower($modelo["nombre"]));
        $nombre = htmlentities($nombre);
        $chiste = htmlentities($modelo["chiste"]);
        $render .=
            "<dt>{$nombre}</dt>
            <dd>{$chiste}</dd>
            <hr>";  // Agrega una línea horizontal como separación
    }

    devuelveJson(["lista" => ["innerHTML" => $render]]);
} catch (Throwable $error) {
    devuelveErrorInterno($error);
}
