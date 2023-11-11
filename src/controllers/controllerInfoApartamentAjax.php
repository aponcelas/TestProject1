<?php
function controllerInfoApartamentAjax($request, $response, $container) {

    // Obtenim l'apartament de l'id
    $apartamentId = $_GET['apartament_id'];

    // Fem un select per obtenir l'informació de l'apartament
    $apartamentInfo = $container->apartaments()->getApartamentInfoById($apartamentId);

    // Fem un select per obtenir les temporades
    $season = $container->reserves()->getSeason();

    // Configurem la resposa en format JSON
    $response->setJSON();

    // Si em obtingut l'informació de l'apartament
    if (!empty($apartamentInfo)) {

        // Configurem la resposta
        $response->values = ['apartament' => $apartamentInfo, 'season' => $season];    
    } else {

        // En cas de no trobar l'apartament, configurem la resposta amb un missatge d'error
        $response->values = ['error' => 'Apartament no disponible'];
    }
    return $response;
}
