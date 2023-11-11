<?php
function controllerAddApartment($request, $response, $container) {

    // Comprovem si s'ha enviat l'informació per POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Guardem els valors del formulario un variables
        $title = $_POST['title'];
        $postal_address = $_POST['postal_address'];
        $length = $_POST['length'];
        $latitude = $_POST['latitude'];
        $short_description = $_POST['short_description'];
        $square_metres = $_POST['square_metres'];
        $number_rooms = $_POST['number_rooms'];
        $services_extra = $_POST['services_extra'];
        $price_day_low_season = $_POST['price_day_low_season'];
        $price_day_high_season = $_POST['price_day_high_season'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];

        // Fem un insert per afegir l'apartament
        $container->apartaments()->addApartment($title, $postal_address, $length, $latitude, $short_description, $square_metres, $number_rooms, $services_extra, $price_day_low_season, $price_day_high_season, $start_date, $end_date);

        // Redirigim al panell de controll
        $response->redirect("location: index.php?r=paneldecontrol");
        return $response;
    }
}
