<?php
    session_start();
    $bdd = new PDO("mysql:host=localhost;dbname=membres;charset=utf8","jordan","toto");

    $user = $bdd -> prepare("SELECT * FROM users WHERE id = ?");
    $user -> execute(array(8));
    
    $infosUser = $user -> fetch();

    if(isset($_POST['editionProfil'])) {
        header("Location: editerProfil.php");
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>TopLock</title>
    <meta charset="UTF-8">
</head>
<body>
    <h1 align="center">Mon Profil</h1>

    <form method="POST">
        <table align="center">
            <tr>
                <td align="right">
                    <label for="pseudo">
                        <b>Pseudo :</b>
                    </label>
                </td>
                <td>
                    <?php echo($infosUser['pseudo']); ?>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="email">
                        <b>Adresse Email :</b>
                    </label>
                </td>
                <td>
                    <?php echo($infosUser['email']); ?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Éditer mon profil" name="editionProfil"/>
                </td>
            </tr>
        </table>
    </form>

</body>
</html>