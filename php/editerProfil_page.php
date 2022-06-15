<?php
    include('editerProfil.php');

    if(isset($_POST['confirmChanges'])) {
        updateProfile();
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