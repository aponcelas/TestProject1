<?php
function controllerUpdateImage($request, $response, $container){

    // Comporvem s'hi l'informació s'ha enviat per POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Guardem les dades en variables
        $imageId = $_POST['image_id'];
        $apartmentId = $_POST['apartment_id'];
        $path = $_POST['file_name'];

        // Fem un update per actualitzar els valors de les imatges
        $container->apartaments()->updateImage($imageId, $apartmentId, $path);
    }

    // Redirigim al panell de control
    $response->redirect("location: index.php?r=paneldecontrol");
    return $response;
}