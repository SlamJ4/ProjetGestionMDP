<?php
session_start();

if (!$_SESSION['res_id']) {
    header("Location: ../index.php");
}

$bdd = new PDO("mysql:host=localhost;dbname=membres;charset=utf8","jordan","toto");

$erreurPseudo = 0;
$erreurEmail = 0;
$erreurPasswd = 0;

$user = $bdd -> prepare("SELECT * FROM users WHERE id = ?");
$user -> execute(array($_SESSION['res_id']));

$infosUser = $user -> fetch();

if(isset($_POST['confirmChanges'])) {
    $newPseudo = htmlspecialchars($_POST['newPseudo']);
    $newEmail = htmlspecialchars($_POST['newEmail']);
    $newMdp = sha1($_POST['newMdp']);
    $changement = 0;

    if(isset($newPseudo) AND $newPseudo != $infosUser['pseudo'] AND strlen($newPseudo) > 0) {
        $changePseudo = $bdd -> prepare("UPDATE users SET pseudo = ? WHERE id = ?");
        $changePseudo -> execute(array($newPseudo, $_SESSION['res_id']));
        $changement++;

    } else {
        $erreurPseudo = 1;
    }

    if(isset($newEmail) AND $newEmail != $infosUser['email'] AND strlen($newEmail) > 0) {
        $testEmail = $bdd -> prepare("SELECT * FROM users WHERE email = ?");
        $testEmail -> execute(array($_POST['email']));

        $emailUse = $testEmail -> rowCount();
        if ($emailUse == 0 AND $newEmail != $infosUser['email']) {
            $changeEmail = $bdd -> prepare("UPDATE users SET email = ? WHERE id = ?");
            $changeEmail -> execute(array($newEmail, $_SESSION['res_id']));
            $changement++;
        } else {
            $erreurEmail = 1;
        }
        
    }

    if(isset($newMdp)) {
        $countMaj = 0;
        $countCaraSpecial = 0;
        for($i = 0; $i < strlen($newMdp); $i += 1) {
            if(ctype_upper($newMdp[$i])) {
                $countMaj += 1;
            }
            if(ctype_digit($newMdp[$i])) {
                $countCaraSpecial += 1;
            }
        }
        if (strlen($mdp1) > 7 AND $countMaj >= 1 AND $countCaraSpecial >= 1) {

            $changePasswd = $bdd -> prepare("UPDATE users SET passwd = ? WHERE id = ?");
            $changePasswd -> execute(array($newMdp, $_SESSION['res_id']));
            $changement++;
        } else {
            $erreurPasswd = 1;
        }
    }

    if($changement > 0) {
        header("Location: profil_page.php");
    }
}

if(isset($_POST['cancel'])) {
    header("Location: profil_page.php");
}
?>