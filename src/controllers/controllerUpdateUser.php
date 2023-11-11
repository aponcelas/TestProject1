<?php
function controllerUpdateUser($request, $response, $container) {

    // Obtenim les dades per POST
    $id_user = $_SESSION["user"]["id_user"];
    $name = $request->get(INPUT_POST, "name");
    $last_name = $request->get(INPUT_POST, "last_name");
    $telephone = $request->get(INPUT_POST, "telephone");
    $email = $request->get(INPUT_POST, "email");
    $card_number = $request->get(INPUT_POST, "card_number");

    // Guardem l'objecte en una variable
    $userModel = $container->users();

    // Fem un update per actualitzar els valors del usuari
    $userModel->updateUser($id_user, $name, $last_name, $telephone, $email, $card_number);

    // Redirigim al compte
    $response->redirect("location: index.php?r=compte");
    
}
