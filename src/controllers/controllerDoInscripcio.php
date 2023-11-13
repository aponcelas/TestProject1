<?php

function controllerDoInscripcio($request, $response, $container) {
    // Verificar si el formulario se ha enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener los valores del formulario
        $nom = $_POST["nom"];
        $cognoms = $_POST["cognoms"];
        $data_naixement = $_POST["data_naixement"];
        $carrer = $_POST["carrer"];
        $numero = $_POST["numero"];
        $ciutat = $_POST["ciutat"];
        $codi_postal = $_POST["codi_postal"];

        $resguard_pagament = $_FILES["resguard_pagament"];
        $resguard_pagament_path = "resguard/" . basename($resguard_pagament["name"]);

        if (move_uploaded_file($resguard_pagament["tmp_name"], $resguard_pagament_path)) {

            $container->inscripcio()->addInscripcio($nom, $cognoms, $data_naixement, $carrer, $numero, $ciutat, $codi_postal, $resguard_pagament_path);

        }



    }

    $response->redirect("location: index.php?r=confirmacio");
    return $response;
}

