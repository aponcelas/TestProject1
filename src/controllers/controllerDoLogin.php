<?php

function controllerDoLogin($request, $response, $container) {


    $response = $_SESSION['identified'] = true;
    return $response;
    $response->redirect("location: index.php?r=consultar");
}

 
