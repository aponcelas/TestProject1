<?php

function controllerGeneratePDF($request, $response, $container) {
    if (ob_get_contents()) {
        ob_clean();
    }
    $reservationId = $_POST['reservation_id'];

    $pdf = new FPDF();
    $pdf->AddPage();

    $reserves = $container->reserves();
    $users = $container->users();

    $reservationData = $reserves->getReservationData($reservationId);

    $pdf->SetFont('Arial', 'B', 16);

    $pdf->Cell(0, 10, 'Identificador de la reserva: ' . $reservationId, 0, 1, 'C');

    // Dades de la reserva i diseny del PDF
    foreach ($reservationData as $data) {
        $userId = $data['id_user'];
        $userData = $users->selectUser($userId);

        if (!empty($userData)) {
            $user = $userData[0];

            $pdf->SetFont('Arial', 'B', 16);
            $pdf->Cell(40, 10, 'Informacio del usuari', 0, 1);
            $pdf->SetFont('Arial', '', 12);
            $pdf->Cell(40, 10, 'Nom:', 0);
            $pdf->MultiCell(0, 10, $user['name'], 0, 'L');
            $pdf->Cell(40, 10, 'Correu electronic:', 0);
            $pdf->MultiCell(0, 10, $user['email'], 0, 'L');

            $pdf->SetFont('Arial', 'B', 16);
            $pdf->Cell(40, 10, 'Dades de la reserva', 0, 1);
            $pdf->SetFont('Arial', '', 12);
            $pdf->Cell(40, 10, 'Data de la entrada:', 0);
            $pdf->MultiCell(0, 10, $data['entry_date'], 0, 'L');
            $pdf->Cell(40, 10, 'Data de la sortida:', 0);
            $pdf->MultiCell(0, 10, $data['output_date'], 0, 'L');
            $pdf->Cell(40, 10, 'Estat:', 0);
            $pdf->MultiCell(0, 10, $data['state'], 0, 'L');
            $pdf->Cell(40, 10, 'Preu:', 0);
            $pdf->MultiCell(0, 10, $data['price'], 0, 'L');

            $pdf->Ln(10);
        }
    }

    $pdf->Output();
}
