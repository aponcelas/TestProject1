<?php
function controllerUpdateSeason($request, $response, $container) {

    // Comprovem si s'ha enviat l'informació per POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Si obtenim l'id
        if (isset($_POST['season_id'])) {

            // Guardem les dades en variables
            $seasonId = $_POST['season_id'];
            $name = $_POST['name'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            
            // Fem un update per actualitzar les temporades
            $container->reserves()->updateSeason($seasonId, $name, $start_date, $end_date);
    
            // Redirigim al panell de control
            $response->redirect("location: index.php?r=paneldecontrol");
            return $response;
        }
    }
}
