<?php

// Configuració
include "../src/config.php";

// Controllers
include '../src/controllers/controllerIndex.php';
include '../src/controllers/controllerMenu.php';
include '../src/controllers/controllerDoRegister.php';
include '../src/controllers/controllerLogin.php';
include '../src/controllers/controllerContactar.php';
include '../src/controllers/controllerRegister.php';
include '../src/controllers/controllerUpdateUser.php';
include '../src/controllers/controllerCompte.php';
include '../src/controllers/controllerDoLogout.php';
include '../src/controllers/controllerPanelDeControl.php';
include '../src/controllers/controllerDoLogin.php';
include '../src/controllers/controllerDeleteUser.php';
include '../src/controllers/controllerAddUser.php';
include '../src/controllers/controllerUpdateApartment.php';
include '../src/controllers/controllerAddApartment.php';
include '../src/controllers/controllerDeleteReservation.php';
include '../src/controllers/controllerInfoApartamentAjax.php';
include '../src/controllers/controllerDoReservas.php';
include "../src/controllers/controllerUpdateReservation.php";
include "../src/controllers/controllerSendMessage.php";
include "../src/controllers/controllerMessagesContact.php";
include "../src/controllers/controllerGeneratePDF.php";
include "../src/controllers/controllerUpdateUserFromPanel.php";
include "../src/controllers/controllerUpdateSeason.php";
include "../src/controllers/controllerExportICS.php";
include "../src/controllers/controllerExportICSuser.php";
include '../src/controllers/controllerAddImage.php';
include '../src/controllers/controllerUpdateImage.php';
include '../src/controllers/controllerDeleteReservationUser.php';
include '../src/libs/fpdf.php';

// Middleware//
include '../src/middleware/isLogged.php';

// Models
include '../src/models/connection.php';
include '../src/models/apartaments.php';
include '../src/models/users.php';
include '../src/models/reserves.php';

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
} else if ($r == 'signup') {
    controllerRegister($request, $response, $container);
} else if ($r == 'login') {
    controllerLogin($request, $response, $container);
} else if ($r == 'contactar') {
    controllerContactar($request, $response, $container);
} else if ($r == 'registrar') {
    controllerDoRegister($request, $response, $container);
} else if ($r == 'compte') {
    isLogged($request, $response, $container, "controllerCompte");
} else if ($r == 'logout') {
    controllerDoLogout($request, $response, $container);
} else if ($r == 'paneldecontrol') {
    isLogged($request, $response, $container, "controllerPanelDeControl");
} else if($r == 'dologin') {
    controllerDoLogin($request, $response, $container);
} else if($r == 'doregister') {
    controllerRegister($request, $response, $container);
} else if($r == 'updateuser') {
    controllerUpdateUser($request, $response, $container);
} else if($r == 'deleteuser') {
    controllerDeleteUser($request, $response, $container);
} else if($r == 'adduser') {
    controllerAddUser($request, $response, $container);
} else if($r == 'updateapartment') {
    controllerUpdateApartment($request, $response, $container);
} else if($r == 'addapartment') {
    controllerAddApartment($request, $response, $container);
} else if($r == 'deletereservation') {
    controllerDeleteReservation($request, $response, $container);
} else if($r == 'infoapartamentajax') {
    controllerInfoApartamentAjax($request, $response, $container);
} else if ($r == 'doreservation') {
    controllerDoReservas($request, $response, $container);
} else if($r == 'updatereservation') {
    controllerUpdateReservation($request, $response, $container);
} else if($r == 'sendmessage') {
    controllerSendMessage($request, $response, $container);
} else if($r == 'messagescontact') {
    controllerMessagesContact($request, $response, $container);
} else if($r == 'generatepdf') {
    controllerGeneratePDF($request, $response, $container);
} else if($r == 'updateseason') {
    controllerUpdateSeason($request, $response, $container);
} else if($r == 'updateuserfrompanel') {
    controllerUpdateUserFromPanel($request, $response, $container);
} else if($r == 'exportICS') {
    controllerExportICS($request, $response, $container);
}else if($r == 'exportICSuser') {
    controllerExportICSuser($request, $response, $container);
} else if($r == 'addimage') {
    controllerAddImage($request, $response, $container);
} else if($r == 'updateimage') {
    controllerUpdateImage($request, $response, $container);
} else if($r == 'deletereservationuser') {
    controllerDeleteReservationUser($request, $response, $container);
}

$response->response();