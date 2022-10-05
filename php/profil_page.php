<!DOCTYPE html>
<html lang="fr">
<head>
    <title>TopLock</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/profile.css" type="text/css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.0/clipboard.min.js"></script>
    <link rel="icon" href="../images/imgacceuil/Icon/clairlock16px.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/acceuil.css" />
    <link rel="stylesheet" href="../css/info.css" />
    <link rel="stylesheet" href="../css/modal.css" />
    <link rel="stylesheet" href="../css/list_table.css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../fonts/icomoon/style.css">
    <link rel="stylesheet" href="../css/sidebar-css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/sidebar-css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/sidebar-css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	  <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="accueil_page.php">TopLock</a>
    </nav>

    <div id="card">
    <h1 action="profil.php"><?php echo($infosUser['pseudo']); ?></h1>
    <div class="image-crop">
        <img id="avatar" src="https://drive.google.com/uc?id=1EVA3KUBLxCXF2EGmTf4LUB8F4yAvBrjl"></img>
    </div>
    <div id="bio-txt">
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
                        <input class="btn" type="submit" name="editionProfil" value="Éditer"/>
                    </td>
                    <td>
                    </td>
                    <td>
                        <input class="btn" type="submit" name="deco" id="msg" value="Déco"/>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
</body>
<script src="../js/profil.js" type="text/javascript">
</script>
</html>