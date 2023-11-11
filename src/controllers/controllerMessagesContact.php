<?php
function controllerMessagesContact($request, $response, $container) {

    // Guardem l'objecte en una variable
    $userModel = $container->users(); 

    // Fem un select per obtenir tots els missatges
    $messages = $container->users()->selectAllMessages();

    // Definim les variables per utilitzar a la view
    $response->set("messages", $messages);

    // Definim la plantilla
    $response->setTemplate("missatgescontactar.php");
    return $response;
}
