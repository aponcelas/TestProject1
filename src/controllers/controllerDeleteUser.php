<?php
function controllerDeleteUser($request, $response, $container) {

    // Guardem l'objecte en una variable
    $userModel = $container->users();
    
    // Comprovem si s'ha envaiat l'id del usuari per POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['user_id'])) {

            // Fem un delete per eliminar l'usuari
            $user_id = $_POST['user_id'];
            $userModel->deleteUser($user_id); 
        }
    }

    // Redirigim al panell de control
    $response->redirect("location: index.php?r=paneldecontrol");
    return $response;
}
