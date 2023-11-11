<?php
function controllerDoRegister($request, $response, $container){
 
    // Obtenim els valors per POST
    $name = $request->get(INPUT_POST, "name");
    $last_name = $request->get(INPUT_POST, "last_name");
    $telephone = $request->get(INPUT_POST, "telephone");
    $email = $request->get(INPUT_POST, "email");
    $password = $request->get(INPUT_POST, "password");
    $id_role = 1;
    
    // Guardem l'objecte en una variable
    $userModel = $container->users();

    // Fem un insert per registrar l'usuari
    $userModel = $userModel->register($name, $last_name, $telephone, $email, $password, $id_role);
    
    // Redirigim a compte
    $response->redirect("location: index.php?r=compte");
}
