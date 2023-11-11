<?php
function controllerUpdateApartment($request, $response, $container){

    // Comporvem s'hi l'informació s'ha enviat per POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Guardem les dades en variables
        $apartmentId = $_POST["apartment_id"];
        $title = $_POST["title"];
        $postalAddress = $_POST["postal_address"];
        $length = $_POST["length"];
        $latitude = $_POST["latitude"];
        $shortDescription = $_POST["short_description"];
        $squareMetres = $_POST["square_metres"];
        $numberRooms = $_POST["number_rooms"];
        $servicesExtra = $_POST["services_extra"];
        $priceLowSeason = $_POST["price_day_low_season"];
        $priceHighSeason = $_POST["price_day_high_season"];
        $startDate = $_POST['start_date'];
        $endDate = $_POST['end_date'];

        // Fem un update per actualitzar els valors del apartament
        $container->apartaments()->updateApartment($apartmentId, $title, $postalAddress, $length, $latitude, $shortDescription, $squareMetres, $numberRooms, $servicesExtra, $priceLowSeason, $priceHighSeason,$startDate, $endDate);
    }

    // Redirigim al panell de control
    $response->redirect("location: index.php?r=paneldecontrol");
    return $response;
}
