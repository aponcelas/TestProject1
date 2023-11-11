<?php
function controllerCompte($request, $response, $container){

    // Fem un select per obtenir les dades del usuari a partir de l'id
    $users = $container->users()->selectUser($_SESSION["user"]["id_user"]);

    // Fem un select per obtenir les reserves del usuari
    $reservations = $container->apartaments()->selectReservation($_SESSION["user"]["id_user"]);

    // Definim les variables per utilitzar a la view
    $response->set("users", $users);
    $response->set("reservations", $reservations);

    // Definim la plantilla
    $response->setTemplate("compte.php");
    return $response;
}