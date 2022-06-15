<?php
session_start();
$bdd = new PDO("mysql:host=localhost;dbname=membres;charset=utf8","jordan","toto");

$user = $bdd -> prepare("SELECT * FROM users WHERE id = ?");
$user -> execute(array($_SESSION['res_id']));

$infosUser = $user -> fetch();

$mdpItem = $bdd -> prepare("SELECT * FROM gestionmdp WHERE user = ?");
$mdpItem -> execute(array($_SESSION['res_id']));

$mdpInfoItem = $mdpItem -> fetch();
?>