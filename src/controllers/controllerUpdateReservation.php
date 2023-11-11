<?php
function controllerUpdateReservation($request, $response, $container) {

    // Comprovem si s'ha enviat l'informació per POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Guardem les dades en variables
        $reservationId = $_POST['reservation_id'];
        $entryDate = $_POST['entry_date'];
        $outputDate = $_POST['output_date'];
        $state = $_POST['state'];

        // Fen un update per actualitzar les dades de la reserva
        $container->reserves()->updateReservation($reservationId, $entryDate, $outputDate, $state);

        // Redirigim al panell de control
        $response->redirect("location: index.php?r=paneldecontrol");
        return $response;
    }
}
