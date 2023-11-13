<?php
function controllerValidar($request, $response, $container)
{
    $enteredCode = $_POST['code'];
    $codigo = $container->getCodi();

    // Ensure that the response is in JSON format
    $response->setJSON();

    if ($enteredCode === $codigo) {
        // El código es válido
        $response->values = ['status' => 'valid'];
    } else {
        // El código no es válido
        $response->values = ['status' => 'error'];
    }

    return $response;
}

