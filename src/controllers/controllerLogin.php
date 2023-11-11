<?php
function controllerLogin($request, $response, $container){
    
    // Definim la plantilla
    $response->setTemplate("login.php");
    return $response;
    
}
