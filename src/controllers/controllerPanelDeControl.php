<?php
function controllerPanelDeControl($request, $response, $container) {
    
    // Guardem el rol de l'usuari en una variable
    $idRole = isset($_SESSION['id_role']) ? $_SESSION['id_role'] : null;

    // Si l'usuari no te rol o no es un gestor o admin
    if ($idRole === null || ($idRole !== 2 && $idRole !== 3)) {
        
        // Redirigim a la pàgina principal
        $response->redirect("location: index.php?r= ");
        return $response;
    }

    // Fem un select per obtenir els usuaris
    $users = $container->users()->selectAllUsers();

    // Fem un select per obtenir els apartaments
    $apartments = $container->apartaments()->selectAllApartments();

    // Fem un select per obtenir les reserves
    $reservations = $container->reserves()->getAllReservations();

    // Fem un select per obtenir les temporades
    $seasons = $container->reserves()->getSeason();

    // Fem un select per obtenir totes les imatges del apartament
    $images = $container->apartaments()->getAllImage();

    // Definim les variables per utilitzar a la view
    $response->set("images", $images);
    $response->set("users", $users);
    $response->set("apartments", $apartments);
    $response->set("reservations", $reservations);
    $response->set("seasons", $seasons);

    // Definim la plantilla
    $response->setTemplate("paneldecontrol.php");
    return $response;
}
