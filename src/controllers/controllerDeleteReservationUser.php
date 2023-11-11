<?php
function controllerDeleteReservationUser($request, $response, $container) {

    // Obtenim l'id de la reserva
    $reservationId = $_POST['reservation_id']; 

    // Fem un delete per eliminar la reserva
    $container->reserves()->deleteReservation($reservationId);

    // Redirigim al panell de control
    $response->redirect("location: index.php?r=compte");
    return $response;
}