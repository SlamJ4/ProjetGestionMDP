<?php
session_start();

if (!$_SESSION['res_id']) {
    header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>TopLock</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/profil.css" type="text/css"/>
</head>
<body>
    <div id="card">
    <h1 action="profil.php">Édition du Profil</h1>
    <div class="image-crop">
        <img id="avatar" src="https://drive.google.com/uc?id=1EVA3KUBLxCXF2EGmTf4LUB8F4yAvBrjl"></img>
    </div>
    <p><br></p>
    <div id="stats">
        <div class="col" id="col1">
            <p class="stat">108</p>
            <p class="label">Langue</p>
        </div>
                <div class="col" id="col2">
            <p class="stat">457</p>
            <p class="label">Enregistrements</p>
        </div>
                <div class="col" id="col3">
            <p class="stat">229</p>
            <p class="label">Following</p>
        </div>
    </div>
    <div id="bio">

        <form method="POST" action="editerProfil.php">
        <table align="center">
            <tr>
                <td align="right">
                    <label for="pseudo">
                        <b>Pseudo :</b>
                    </label>
                </td>
                <td align="right">
                    <input type='text' name='newPseudo' placeholder='Nouveau Pseudo'/> 
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="email">
                        <b>Adresse Email :</b>
                    </label>
                </td>
                <td align="right">
                    <input type='text' name='newEmail' placeholder='Nouvel Email'/> 
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="passws">
                        <b>Mot de Passe :</b>
                    </label>
                </td>
                <td align="right">
                    <input type='text' name='newMdp' placeholder='Nouveau Mot de Passe'/> 
                </td>
            </tr>
            <div id="buttons">
                <table>
                <tr>
                    <td>
                        <input class='btn' type="submit" name="confirmChanges" value="Confirmer"/>
                    </td>
                    <td>
                    </td>
                    <td>
                        <input class="btn" type="submit" name="cancel" id="msg" value="Annuler"/>
                    </td>
                </tr>
                </table>
            </div>
        </table>
    </form>
    </div>
    
</div>
</body>
<script src="../js/profil.js" type="text/javascript">
</script>
</html>