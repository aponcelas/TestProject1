<?php
function controllerExportICSuser($request, $response, $container) {
    $reservationId = $request->get(INPUT_GET, "id"); // Obtenim la reserva per la ID

    $reservationData = $container->reserves()->getReservationData($reservationId);

    if (empty($reservationData)) {
        
    } else {
        $reservation = $reservationData[0]; // Tomar el primer registro si hay datos

        $ics_data = "BEGIN:VCALENDAR\r\n";
        $ics_data .= "VERSION:2.0\r\n";
        $ics_data .= "PRODID:-//Your Organization//Your Calendar Application//EN\r\n";
        $ics_data .= "METHOD:PUBLISH\r\n";
        $ics_data .= "X-WR-CALNAME:Schedule\r\n";
        $ics_data .= "X-WR-TIMEZONE:Europe/Madrid\r\n";

        $id = $reservation['id_reserved'];
        $start_date = new DateTime($reservation['entry_date']);
        $end_date = new DateTime($reservation['output_date']);

        $ics_data .= "BEGIN:VEVENT\r\n";
        $ics_data .= "DTSTART:" . $start_date->format("Ymd\THis") . "\r\n";
        $ics_data .= "DTEND:" . $end_date->format("Ymd\THis") . "\r\n";
        $ics_data .= "DTSTAMP:" . date('Ymd\THis') . "\r\n";
        $ics_data .= "UID:" . $id . "\r\n";
        $ics_data .= "SEQUENCE:0\r\n";
        $ics_data .= "END:VEVENT\r\n";

        $ics_data .= "END:VCALENDAR\r\n";

        // Descargar el archivo
        $filename = "event_calendar.ics";
        header("Content-type:text/calendar");
        header("Content-Disposition: attachment; filename=$filename");
        echo $ics_data;

        die();
    }

    return $response;
}
