<?php
require_once('../class/Database.php');
session_start();
$dbh = Database::connexion();

$dbh->prepare("SELECT id, pseudo, email, passwd FROM users WHERE id = ?");
$user -> execute(array($_SESSION['res_id']));

$infosUser = $user -> fetch();

$mdpItem = $dbh -> prepare("SELECT site, login, password FROM gestionmdp WHERE user = ?");
$mdpItem -> execute(array($_SESSION['res_id']));

$mdpInfoItem = $mdpItem -> fetchAll();