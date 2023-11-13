<?php
function controllerIndex($request, $response, $container){

    $response->setTemplate("index.php");
    return $response;
}