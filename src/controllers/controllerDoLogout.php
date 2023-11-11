<?php

function controllerDoLogout($request, $response, $container){

    // Eliminem l'usuari de la sessió
    $response->setSession("user", []);

    // Deixem l'estat de loguejat en fals
    $response->setSession("logged", false);

    // Redirigim a la pàgina principal
    $response->redirect("location: index.php");
    return $response;
}