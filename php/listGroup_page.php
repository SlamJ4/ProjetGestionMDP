<?php

session_start();

if (!$_SESSION['res_id']) {
    header("Location: ../index.php");
}

$bdd = new PDO("mysql:host=localhost;dbname=membres;charset=utf8","jordan","toto");

$recupGroupes = $bdd -> prepare("SELECT id,nom,user_id FROM groupes WHERE user_id = ?");
$recupGroupes -> execute(array($_SESSION['res_id']));

$infosGroupes = $recupGroupes -> fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>TopLock</title>
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
<section class="ftco-section">
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6 text-center mb-5">
      <h2 class="heading-section">Table #02</h2>
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary rounded-1 py-2 px-2" data-toggle="modal" data-target="#Modal">
          Créer un groupe
      </button>
      <!-- Modal -->
      <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-body">
              <div class="column" id="main">
                <h1>Créer un groupe </h1>
                <h3>créer un nouveau groupe de mot de passe</h3>
                <form method="POST" action="listGroup.php">
                  <div class="form-group">
                    <label for="InputSite">Nom du groupe</label>
                    <input type="text" class="form-control" name="nameGrp" placeholder="Nom Groupe">
                  </div>
                    <button type="submit" name="createGrp" value="Créer" class="btn btn-primary">Créer Groupe</button>
                  </form>
                </div>
                <div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <div class="row">
      <div class="col-md-12">
        <div class="table-wrap">
          <form action="listGroup.php" method="post">
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th>Nom du groupes</th>
                  <th>Mot de passe</th>
                  <th>&nbsp;</th>
                </tr>
                <?php
                    foreach ($infosGroupes as $key) {
                      ?> <tr>
                        <td><?php echo ($key['nom']);?></td>
                        <td><?php $recupMdp = $bdd -> prepare("SELECT id,site,user,group_id FROM gestionmdp WHERE user = ? AND group_id = ?");
                                  $recupMdp -> execute(array($_SESSION['res_id'], $key['id']));

                                  $infosMdp = $recupMdp -> fetchAll();

                                  foreach($infosMdp as $elmt) {
                                    echo $elmt['site'].', ';
                                  }?>
                        </td>
                        <td>
                                  <?php //trouver quoi supprimer et quoi garder dans la balise button car quand supprime tt, le php marche ?>
                                  <button type="submit" class="close" data-dismiss="alert" aria-label="Close" name="test">
                                      <span aria-hidden="true"><i class="fa fa-close"></i></span>
                                </button>
                              </td>
                      </tr><?php
                    }
                ?>
              </thead>
            </table>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>


<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>