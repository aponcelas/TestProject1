<?php
function controllerInscripcio($request, $response, $container){

    $response->setTemplate("inscripcio.php");
    return $response;
}