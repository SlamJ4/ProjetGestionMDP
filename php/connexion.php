<?php
$erreur = 0;
$bdd = new PDO("mysql:host=localhost;dbname=membres;charset=utf8","jordan","toto");

function userExist($email, $mdp) {
    $verifMembre = $bdd -> prepare("SELECT * FROM users WHERE passwd = ?");
    $verifMembre -> execute(array($mdp));

    $exist = $verifMembre -> rowCount();

    return $exist;
}

?>