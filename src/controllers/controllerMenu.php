<?php
function controllerMenu($request, $response, $container){

    // Definim la plantilla
    $response->setTemplate("menu.php");
    return $response;
}