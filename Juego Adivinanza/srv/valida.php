<?php

require_once __DIR__ . "/../lib/php/BAD_REQUEST.php";
require_once __DIR__ . "/../lib/php/recuperaTexto.php";
require_once __DIR__ . "/../lib/php/ProblemDetails.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/../lib/php/devuelveProblemDetails.php";
require_once __DIR__ . "/../lib/php/devuelveErrorInterno.php";

try {
    // Recupera la respuesta ingresada por el usuario
    $respuesta = recuperaTexto("respuesta");

    // Verifica que la respuesta esté presente
    if ($respuesta === null || $respuesta === "") {
        throw new ProblemDetails(
            status: BAD_REQUEST,
            title: "Falta la respuesta a la adivinanza.",
            type: "/error/faltarespuesta.html"
        );
    } 

    // Definición de la respuesta correcta
    $respuestaCorrecta = "mapa"; // Respuesta esperada

    // Comprobación de la respuesta
    if (strtolower(trim($respuesta)) === $respuestaCorrecta) {
        $mensaje = "¡Correcto! La respuesta es '{$respuestaCorrecta}'.";
    } else {
        $mensaje = "Incorrecto. Inténtalo de nuevo.";
    }

    // Devuelve el mensaje como JSON
    devuelveJson($mensaje);

} catch (ProblemDetails $details) {
    devuelveProblemDetails($details);
} catch (Throwable $error) {
    devuelveErrorInterno($error);
}
