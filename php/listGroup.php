<?php
session_start();

if (!$_SESSION['res_id']) {
    header("Location: ../index.php");
}

$bdd = new PDO("mysql:host=localhost;dbname=membres;charset=utf8","jordan","toto");

if (isset($_POST['createGrp'])) {
    $nameGrp = htmlspecialchars($_POST['nameGrp']);
    $userId = $_SESSION['res_id'];

    $getId = $bdd -> prepare("SELECT id FROM groupes");
    $getId -> execute();
    $id = $getId -> rowCount();

    $ajoutGRp = $bdd -> prepare("INSERT INTO groupes(id,nom,user_id) VALUES(?,?,?)");
    $ajoutGRp -> execute(array($id+1,$nameGrp,$userId));
    header("Location: listGroup_page.php");
}

if(isset($_POST['test'])) {
    echo 'coucou';
}