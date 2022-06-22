<?php
    session_start();
    $bdd = new PDO("mysql:host=localhost;dbname=membres;charset=utf8","jordan","toto");

    $user = $bdd -> prepare("SELECT * FROM users WHERE id = ?");
    $user -> execute(array($_SESSION['res_id']));
    
    $infosUser = $user -> fetch();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>TopLock</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/profil.css" type="text/css"/>
</head>
<body>
    <div id="backButton">
        <span class="test"><- Test nom bouton</span>
    </div>
    <div id="card">
    <h1 action="profil.php"><?php echo($infosUser['pseudo']); ?></h1>
    <div class="image-crop">
        <img id="avatar" src="https://drive.google.com/uc?id=1EVA3KUBLxCXF2EGmTf4LUB8F4yAvBrjl"></img>
    </div>
    <div id="bio">
        <form method="POST" action="profil.php">
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
        </table>
    </form>
    </div>
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
    <div id="buttons">
        <form method="POST" action="profil.php">
            <table>
                <tr>
                    <td>
                        <input type="submit" name="editionProfil" value="Éditer Profil"/>
                    </td>
                    <td>
                    </td>
                    <td>
                        <input type="submit" name="deco" id="msg" value="Déconnexion"/>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
</body>
<script type="text/javascript">
    var col1 = document.querySelector('#col1');

    col1.addEventListener('mouseover', function(e) {
        col1.style.textDecoration = 'underline';
    })

    col1.addEventListener('mouseout', function(e) {
        col1.style.textDecoration = '';
    })

    var col2 = document.querySelector('#col2');

    col2.addEventListener('mouseover', function(e) {
        col2.style.textDecoration = 'underline';
    })

    col2.addEventListener('mouseout', function(e) {
        col2.style.textDecoration = '';
    })

    var col3 = document.querySelector('#col3');

    col3.addEventListener('mouseover', function(e) {
        col3.style.textDecoration = 'underline';
    })

    col3.addEventListener('mouseout', function(e) {
        col3.style.textDecoration = '';
    })
</script>
</html>