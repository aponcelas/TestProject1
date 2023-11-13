<?php
function isLogged($request, $response, $container, $next){
    
    if (isset($_SESSION['identified']) && $_SESSION['identified'] === true) {
        $response = $next($request, $response, $container);
        return $response;
    } 

    $response->redirect("location: index.php?r=consultes");
}
