<?php
include('inscription.php');
session_start();

$bdd = new PDO("mysql:host=localhost;dbname=membres;charset=utf8","jordan","toto");

$erreurPseudo = 0;
$erreurEmail = 0;
$erreurPasswd = 0;

$user = $bdd -> prepare("SELECT * FROM users WHERE id = ?");
$user -> execute(array($_SESSION['res_id']));

$infosUser = $user -> fetch();

function updateProfile() {
    $newPseudo = htmlspecialchars($_POST['newPseudo']);
    $newEmail = htmlspecialchars($_POST['newEmail']);
    $newMdp = sha1($_POST['newPasswd']);
    $changement = 0;

    if(isset($newPseudo) AND $newPseudo != $infosUser['pseudo'] AND strlen($newPseudo) > 0) {
        $changePseudo = $bdd -> prepare("UPDATE users SET pseudo = ? WHERE id = ?");
        $changePseudo -> execute(array($newPseudo, $_SESSION['res_id']));
        $changement++;

    } else {
        $erreurPseudo = 1;
    }

    if(isset($newEmail) AND verifEmail($newEmail, $newEmail) == 0 AND $newEmail != $infosUser['email']) {
        $changeEmail = $bdd -> prepare("UPDATE users SET email = ? WHERE id = ?");
        $changeEmail -> execute(array($newEmail, $_SESSION['res_id']));
        $changement++;
    } else {
        $erreurEmail = 1;
    } 

    if(isset($newMdp) AND $newMdp != $infosUser['passwd'] AND verifMdp($newMdp, $newMdp)) {
        $changePasswd = $bdd -> prepare("UPDATE users SET passwd = ? WHERE id = ?");
        $changePasswd -> execute(array($newMdp, $_SESSION['res_id']));
        $changement++;
        //METTRE LES MÊMES RÈGLES DE SÉCURITÉS QUE POUR L'INSCRIPTION + TRAITER LES VERIFS DANS DES FONCTIONS
    } else {
        $erreurPasswd = 1;
    }

    if($changement > 0) {
        header("Location: profil.php");
    }
}
?>