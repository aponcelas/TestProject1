<?php
function controllerUpdateUserFromPanel($request, $response, $container) {

    // Obtenim els valors per POST
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $last_name = $_POST['last_name'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $card_number = $_POST['card_number'];
    $id_role = $_POST['id_role'];

    // Guardem l'objecte en una variable
    $userModel = $container->users();

    // Fem un update per actualitzar les dades del usuari
    $userModel->updateUser($user_id, $name, $last_name, $telephone, $email, $card_number, $id_role);

    // Redirigim al panell de control
    $response->redirect("location: index.php?r=paneldecontrol");
}
