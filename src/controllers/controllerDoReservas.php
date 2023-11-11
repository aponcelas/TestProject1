<?php
function controllerDoReservas($request, $response, $container) {

    // Si estem iniciats amb un usuari...
    if (isset($_SESSION["user"]["id_user"])) {

        // Guardem els valors en variables
        $startDate = $request->get(INPUT_POST, "startDate");
        $endDate = $request->get(INPUT_POST, "endDate");
        $apartamentId = $request->get(INPUT_POST, "apartment_id");
        $priceDayHigh = $request->get(INPUT_POST, "high_price");
        $priceDayLow = $request->get(INPUT_POST, "low_price");
        $idUser = $_SESSION["user"]["id_user"];
        $state = "Pending";

        // Obtenim un array associatiu amb l'id de temporada i el preu
        $seasonAndPrice = calculateSeasonAndPrice($startDate, $endDate, $container, $priceDayHigh, $priceDayLow);

        // Guardem l'id de temporada i el preu  
        $idSeason = $seasonAndPrice['idSeason'];
        $price = $seasonAndPrice['totalPrice'];

        // Fem un insert per fer la reserva
        $container->reserves()->DoReservation($startDate, $endDate, $state, $price, $idUser, $apartamentId, $idSeason);

        // Regirigim al compte
        $response->redirect("location: index.php?r=compte");
    } else {

        // Redirigim al login
        $response->redirect("location: index.php?r=login");
    }
}

// Funció per calcular la temporada y el preu total
function calculateSeasonAndPrice($startDate, $endDate, $container, $priceDayHigh, $priceDayLow) {

    // Fem un select per obtenir les temporades
    $Season = $container->reserves()->getSeason();

    // Associem cada temporada a una variable
    $lowSeason = $Season[0];
    $highSeason = $Season[1];

    // Declarem les variables amb DateTime per poder manipular-les
    $startDateHighSeason = new DateTime($highSeason['start_date']);
    $endDateHighSeason = new DateTime($highSeason['end_date']);
    $startDateLowSeason = new DateTime($lowSeason['start_date']);
    $endDateLowSeason = new DateTime($lowSeason['end_date']);
    $startDateReservation = new DateTime($startDate);
    $endDateReservatino = new DateTime($endDate);

    // Contador dels dies totals
    $totalDays = 0;

    // Obtenim la quantitas de dias per cada temporada
    $daysLowSeason = $startDateReservation->diff($endDateLowSeason)->days;
    $daysHighSeason = $startDateHighSeason->diff($endDateReservatino)->days;

    // Comprovem si la reserva és fa en una temporada o altra i en cas d'estar entre les dos temporades
    // és calcula en quina temporada y esta més temps
    if ($startDateReservation >= $startDateHighSeason && $endDateReservatino <= $endDateHighSeason) {
        $idSeason = 2;
    } elseif ($startDateReservation >= $startDateLowSeason && $endDateReservatino <= $endDateLowSeason) {
        $idSeason = 1;
    } else {
        if ($daysHighSeason > $daysLowSeason) {
            $idSeason = 2;
        } else {
            $idSeason = 1;
        }
    }

    // Bucle per saber la quantitat de dias que hi ha a la reserva
    while ($startDateReservation <= $endDateReservatino) {
        $totalDays++;
        $startDateReservation->modify('+1 day');
    }

    // Obtenim el preu per dia a partir de la temporada
    if ($idSeason == 1) {
        $pricePerDay = $priceDayLow;
    } else {
        $pricePerDay = $priceDayHigh;
    }

    // Obtenim el preu total
    $totalPrice = $totalDays * $pricePerDay;

    // Retornem un arrray associatiu
    return ['idSeason' => $idSeason, 'totalPrice' => $totalPrice];
}

