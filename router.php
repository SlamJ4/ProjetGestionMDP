<?php
require_once("autoload.php");

date_default_timezone_set('Europe/Paris');

if ( !isset($_SERVER['DOCUMENT_ROOT'])) {
    throw new \Exception("Fatal error: This application must be run in a web environnement.", 1);
}

$sBasepath=$_SERVER['DOCUMENT_ROOT'].'/';

$aRequest = getPost();

$sRequestURI = $_SERVER['REQUEST_URI'];
$sRequestMethod = $_SERVER['REQUEST_METHOD'];
$sRequestHTTP_authorisation = $_SERVER['HTTP_HTTP_AUTHORIZATION'] ?? "";

if ($sRequestMethod == "GET" && $sRequestURI == "/toplock") {
    $oController = new TopLockContentController();
    $oController->run();
    $oController->response();
} elseif ($sRequestMethod == "GET" && $sRequestURI == "/group") {
    $oController = new GroupController();
    $oController->run();
    $oController->response();
} elseif ($sRequestMethod == "GET" && $sRequestURI == "/profil") {
    $oController = new ProfilController();
    $oController->run();
    $oController->response();
} else {
    $oController = new HTTP404Controller($sRequestURI, $sRequestMethod);
    $oController->response();
}

function getPost()
{
    if(!empty($_POST)) {
        return $_POST;
    }

    $post = json_decode(file_get_contents('php://input'), true);
    if(json_last_error() == JSON_ERROR_NONE) {
        return $post;
    }

    return [];
}