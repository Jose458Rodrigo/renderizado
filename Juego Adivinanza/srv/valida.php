<?php

require_once __DIR__ . "/../lib/php/BAD_REQUEST.php";
require_once __DIR__ . "/../lib/php/recuperaTexto.php";
require_once __DIR__ . "/../lib/php/ProblemDetails.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/../lib/php/devuelveProblemDetails.php";
require_once __DIR__ . "/../lib/php/devuelveErrorInterno.php";

try {

 $saludo = recuperaTexto("saludo");
 $nombre = recuperaTexto("nombre");
 $respuesta = recuperaTexto("respuesta");

 if (
  $saludo === false
  || $saludo === ""
 )
  throw new ProblemDetails(
   status: BAD_REQUEST,
   title: "Falta el saludo.",
   type: "/error/faltasaludo.html"
  );

 if (
  $nombre === false
  || $nombre === ""
 )
  throw new ProblemDetails(
   status: BAD_REQUEST,
   title: "Falta el nombre.",
   type: "/error/faltanombre.html"
  );
  if (
    $respuesta === null 
    || $respuesta === "") {
        throw new ProblemDetails(
        status: BAD_REQUEST,
        title:"/error/faltarespuesta.html",
        type: "Falta la respuesta a la adivinanza."
        );
    }

    // Definición de la adivinanza y respuesta correcta
    $adivinanza = "Tengo ciudades, pero no casas; montañas, pero no árboles; y agua, pero no peces. ¿Qué soy?";
    $respuestaCorrecta = "mapa"; // Respuesta esperada

    // Comprobación de la respuesta
    if (strtolower(trim($respuesta)) === $respuestaCorrecta) {
        $mensaje = "{$saludo} {$nombre}, ¡correcto! La respuesta es '{$respuestaCorrecta}'.";
    } else {
        $mensaje = "{$saludo} {$nombre}, incorrecto. Inténtalo de nuevo.";
    }

    devuelveJson($mensaje);



 $resultado =
  "{$saludo} {$nombre}.";

 devuelveJson($resultado);
} catch (ProblemDetails $details) {

 devuelveProblemDetails($details);
} catch (Throwable $error) {

 devuelveErrorInterno($error);
}
