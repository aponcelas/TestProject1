<?php
function controllerDeleteReservation($request, $response, $container) {

    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Obtenim l'id de la reserva
        $reservationId = $_POST['reservation_id']; 

        // Fem un delete per eliminar la reserva
        $container->reserves()->deleteReservation($reservationId);

        // Redirigim al panell de control
        $response->redirect("location: index.php?r=paneldecontrol");
        return $response;

    } else {

        $reservationId = $_GET['reservation_id']; 

        // Fem un delete per eliminar la reserva
        $container->reserves()->deleteReservation($reservationId);

        // Redirigim al panell de control
        $response->redirect("location: index.php?r=compte");
        return $response;
    }
}
