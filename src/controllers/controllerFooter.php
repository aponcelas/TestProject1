<?php
function controllerFooter($request, $response, $container){
    
    // Definim la plantilla
    $response->setTemplate("footer.php");
    return $response;
    
}
