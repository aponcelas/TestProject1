<?php
function controllerConsultar($request, $response, $container){

    $inscripcions = $container->inscripcio()->getAll();

    $response->set("inscripcions", $inscripcions);

    $response->setTemplate("consultar.php");
    return $response;
}