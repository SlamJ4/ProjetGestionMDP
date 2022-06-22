<?php
    /*session_start();
    $bdd = new PDO("mysql:host=localhost;dbname=membres;charset=utf8","jordan","toto");

    $user = $bdd -> prepare("SELECT * FROM users WHERE id = ?");
    $user -> execute(array($_SESSION['res_id']));
    
    $infosUser = $user -> fetch();*/

    if(isset($_POST['editionProfil'])) {
        header("Location: editerProfil_page.php");
    }

    if(isset($_POST['deco'])) {
        session_destroy();
        header("Location: index.php");
    }

    if(isset($_POST['rediriger'])) {
        header("Location: accueil_page.php");
    }
?>