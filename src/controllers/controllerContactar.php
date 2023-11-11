<?php
function controllerContactar($request, $response, $container){
    
    // Definim la plantilla
    $response->setTemplate("contactar.php");
    return $response;
}