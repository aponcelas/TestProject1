<?php
function controllerValidar($request, $response, $container)
{
    $enteredCode = $_POST['code'];
    $codigo = $container->getCodi();

    $response->setJSON();

    if ($enteredCode === $codigo) {
        $response->values = ['status' => 'valid'];

    } else {
        $response->values = ['status' => 'error'];
    }

    return $response;
}
?>
