<?php

function controllerDoLogin($request, $response, $container) {
    
    $response->redirect("location: index.php?r=consultar");
    return $response;
}

 
