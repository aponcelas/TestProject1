<?php
function controllerDoLogin($request, $response, $container){

    // Obtenim els valors a través de POST
    $email = $request->get(INPUT_POST, "email");
    $password = $request->get(INPUT_POST, "password");

    // Guardem l'objecte en una variable
    $userModel = $container->users();

    // Fem un select per fer el login
    $user = $userModel->login($email, $password);

    // Si hem fet login...
    if($user) {

        // Guardem l'informació en la sessió
        $response->setSession("user", $user);
        $response->setSession("logged", true);
        
        // Guardem el rol de l'usuari en la sessió
        if (isset($user['id_role'])) {
            $response->setSession("id_role", $user['id_role']);
        }

        // Redirigim al compte
        $response->redirect("location: index.php?r=compte");
    } else {

        // Regirigim al login
        $response->redirect("location: index.php?r=login");
    }
    return $response;
}
