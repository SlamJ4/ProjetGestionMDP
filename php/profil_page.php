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
    <style type="text/css">
                * {
            padding: 0;
            margin: 0;
        }

        html,body {
            background-color: #6E7889;
            font-family: tahoma, sans-serif;
            color: #E6EBEE;
        }

        #card {
            background-color: #393B45;
            height: auto;
            width: 350px;
            margin: 10vh auto;
            border-radius: 25px;
            padding-bottom: 1px;
            box-shadow: 2px 2px 5px #4069E2;
        }

        h1 {
            color: white;
            text-align: center;
            width: 100%;
            background-color: #E6EBEE;
            border-radius: 25px 25px 0 0;
            color: #393B45;
            padding: 30px 0;
            font-weight: 800;
            margin: 0;
        }

        .image-crop {
            display: block;
            position: relative;
            background-color: #E6EBEE;
            width: 150px;
            height: 150px;
            margin: 0 auto;
            margin-top: 30px;
            overflow: hidden;
            border-radius: 50%;
            box-shadow: 1px 1px 5px #4069E2;
        }

        #avatar {
            display: inline;
            height: 230px;
            width: auto;
            margin-left: -34px;
        }

        #bio {
            display: block;
            margin: 30px auto;
            width: 280px;
            height: auto;
        }

        #bio p {
            color: #E6EBEE;
            font-weight: lighter;
            font-size: 15px;
            text-align: justify;
        }

        #stats {
            display: flex;
            flex-direction: row;
            height: auto;
            width: 280px;
            justify-content: space-between;
            align-items: center;
            margin: 0 auto;
            font-weight: 500;
        }

        .col {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: auto;
        }

        .stat {
            font-size: 25px;
            margin: 0;
        }

        .label {
            margin: 0;
        }

        #buttons {
            display: flex;
            margin: 0 auto;
            justify-content: space-between;
            width: 280px;
        }

        input {
            display: block;
            position: relative;
            padding: 10px 0;
            width: 138px;
            margin: 30px 0;
            border-radius: 25px;
            border: none;
            font-size: 20px;
            letter-spacing: 0.2px;
            font-weight: 500;
            background-color: #4069E2;
            color: #E6EBEE;
        }

        input:focus {
            display: none;
        }

        input:hover {
            transform: scale(1.03);
            cursor: pointer;
            transition: all 0.2s ease-in-out;
        }

        #msg{
            background-color: #E6EBEE;
            color: #393B45;
        }
    </style>
</head>
<body>
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