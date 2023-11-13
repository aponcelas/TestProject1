<?php
function controllerLogin($request, $response, $container){

    $response->setTemplate("login.php");
    return $response;
}