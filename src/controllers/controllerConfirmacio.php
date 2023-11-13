<?php

function controllerConfirmacio($request, $response, $container) {

    $response->setTemplate("confirmacio.php");

    return $response;
}
