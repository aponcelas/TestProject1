<?php
function controllerAddUser($request, $response, $container) {

    // Guardem l'objecte en una variable
    $userModel = $container->users();

    // Comprovem s'hi s'ha enviat l'informació per POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtén los datos del formulario
        $name = $_POST['name'];
        $last_name = $_POST['last_name'];
        $telephone = $_POST['telephone'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $id_role = $_POST['id_role'];

        // Fem un insert per afegir un usuari
        $userModel->addUser($name, $last_name, $telephone, $email, $password, $id_role);

        // Regirigim al panell de control
        $response->redirect("location: index.php?r=paneldecontrol");
        return $response;
    }
}
