<?php
function controllerRegister($request, $response, $container){

    // Definim la plantilla
    $response->setTemplate("signup.php");
    return $response;
}


