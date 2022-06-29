<?php

$bdd = new PDO("mysql:host=localhost;dbname=membres;charset=utf8","jordan","toto");

if(isset($_POST['updatePassword'])) {
    header("Location: accueil_page.php");
}