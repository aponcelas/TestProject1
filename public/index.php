<?php

// Configuració
include "../src/config.php";

// Controllers
include '../src/controllers/controllerIndex.php';
include '../src/controllers/controllerInscripcio.php';
include '../src/controllers/controllerDoInscripcio.php';
include '../src/controllers/controllerConfirmacio.php';
include '../src/controllers/controllerConsultar.php';
include '../src/controllers/controllerLogin.php';
include '../src/controllers/controllerDoLogin.php';
include '../src/controllers/controllerValidar.php';

// Middleware//
include '../src/middleware/isLogged.php';

// Models
include '../src/models/connection.php';
include '../src/models/inscripcio.php';

// Emeset Framework
include "../src/Emeset/Container.php";
include "../src/Emeset/Request.php";
include "../src/Emeset/Response.php";

// Instanciom els objectes Emeset
$request = new \Emeset\Request();
$response = new \Emeset\Response();
$container = new \Emeset\Container($config);

$r = '';
if (isset($_REQUEST["r"])) {
  $r = $_REQUEST["r"];
}

if ($r == '') {
    controllerIndex($request, $response, $container);
} else if ($r == 'inscripcio') {
    controllerInscripcio($request, $response, $container);
} else if ($r == 'doinscripcio') {
    controllerDoInscripcio($request, $response, $container);
} else if ($r == 'confirmacio') {
    controllerConfirmacio($request, $response, $container);
} else if ($r == 'consultar') {
    isLogged($request, $response, $container, "controllerConsultar");
} else if ($r == 'login') {
    controllerLogin($request, $response, $container);
} else if ($r == 'dologin') {
    controllerDoLogin($request, $response, $container);
} else if ($r == 'validar') {
    controllerValidar($request, $response, $container);
} 

$response->response();