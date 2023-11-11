<?php
function isLogged($request, $response, $container, $next){
    
    // Comprovem si hem iniciat sessió
    $logged = $request->get("SESSION", "logged");
    
    // Si no hem iniciat sessió...
    if(!$logged) {

        // Redirigim al login
        $response->redirect("location: index.php?r=login");
        return $response;
    }

    // Guardem el nom de l'usuari de la sessió
    $name = $request->get("SESSION", "name");

    // Assignem el correu a l'usuari
    $response->set("email", $request->get("SESSION", "email"));

    $response = $next($request, $response, $container);
    return $response;
}
