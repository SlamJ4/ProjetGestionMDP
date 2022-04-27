<?php
    session_start();

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
        $newMdp = sha1($_POST['newPasswd']);
        $changement = 0;

        if(isset($newPseudo) AND $newPseudo != $infosUser['pseudo'] AND strlen($newPseudo) > 0) {
            $changePseudo = $bdd -> prepare("UPDATE users SET pseudo = ? WHERE id = ?");
            $changePseudo -> execute(array($newPseudo, $_SESSION['res_id']));
            $changement++;

        } else {
            $erreurPseudo = 1;
        }

        if(isset($newEmail) AND $newEmail != $infosUser['email'] AND strlen($newEmail) > 0) {
            $changeEmail = $bdd -> prepare("UPDATE users SET email = ? WHERE id = ?");
            $changeEmail -> execute(array($newEmail, $_SESSION['res_id']));
            $changement++;

        } else {
            $erreurEmail = 1;
        }        

        if(isset($newMdp) AND $newMdp != $infosUser['passwd'] AND strlen($newMdp) > 0) {
            $changePasswd = $bdd -> prepare("UPDATE users SET passwd = ? WHERE id = ?");
            $changePasswd -> execute(array($newMdp, $_SESSION['res_id']));
            $changement++;
            //METTRE LES MÊMES RÈGLES DE SÉCURITÉS QUE POUR L'INSCRIPTION
        } else {
            $erreurPasswd = 1;
        }

        if($changement > 0) {
            header("Location: profil.php");
        }
    }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>TopLock</title>
    <meta charset="UTF-8">
</head>
<body>
    <h1 align="center">Édition de Mon profil</h1>

    <form method="POST">
        <table align="center">
            <tr>
                <td align="center">
                    <label for="pseudo">
                        <b>Pseudo :</b>
                    </label>
                </td>
                <td>
                    <input type="pseudo" name="newPseudo" placeholder="Nouveau Pseudo"/>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <label for="email">
                        <b>Adresse Email :</b>
                    </label>
                </td>
                <td>
                    <input type="email" name="newEmail" placeholder="Nouvelle Adresse Email"/>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <label for="pseudo">
                        <b>Mot de Passe :</b>
                    </label>
                </td>
                <td>
                    <input type="password" name="newPasswd" placeholder="Nouveau Mot de Passe"/>
                </td>
            </tr>
            <tr>
                <td align="center">
                </td>
                <td>
                    <input type="submit" name="confirmChanges" value="Confirmer les changements"/>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>