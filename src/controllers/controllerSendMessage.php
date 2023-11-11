<?php
function controllerSendMessage($request, $response, $container) {

    // Comprovem s'hi s'ha enviat la informació per POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        // Guardem les dades en variables
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        // Guardem l'objecte en una variable
        $users = $container->users();

        // Fem un insert per guardar el missatge
        $users->sendMessage($name, $email, $message);

        // Redirigim a la pàgina principal
        $response->redirect("location: index.php?r=");
        return $response;
    }
}
