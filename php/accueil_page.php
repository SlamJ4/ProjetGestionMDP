<?php
    session_start();

    /*if (!$_SESSION['res_id']) {
        header("Location: ../index.php");
    }*/

    $bdd = new PDO("mysql:host=localhost;dbname=membres;charset=utf8","jordan","toto");
    
    $user = $bdd -> prepare("SELECT * FROM users WHERE id = ?");
    $user -> execute(array($_SESSION['res_id']));
    
    $infosUser = $user -> fetch();
    
    $mdpItem = $bdd -> prepare("SELECT * FROM gestionmdp WHERE user = ?");
    $mdpItem -> execute(array($_SESSION['res_id']));
    
    $mdpInfoItem = $mdpItem -> fetchAll();

      $group_ids = $bdd -> prepare("SELECT id,nom FROM groupes WHERE user_id = ?");
      $group_ids -> execute(array($_SESSION['res_id']));
                        
      $infosGroups = $group_ids -> fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>TopLock</title>
    <meta charset='utf-8'>
    <!----------------------------------------------Accueil---------------------------------------------------------------->
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
    <!----------------------------------------------Accueil---------------------------------------------------------------->


    <!----------------------------------------------SideBar---------------------------------------------------------------->
    <!-- Required meta tags -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../fonts/icomoon/style.css">

    <link rel="stylesheet" href="../css/sidebar-css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/sidebar-css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="../css/sidebar-css/style.css">
    <!----------------------------------------------SideBar---------------------------------------------------------------->

</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="accueil_page.php">TopLock</a>
        <ul class="navbar-nav mr-auto">
      </ul>
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary rounded-1 py-2 px-2" data-toggle="modal" data-target="#Modal">
                Add Password
              </button>
              <!-- Modal -->
              <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-body">
                      <div class="column" id="main">
                        <h1>Add password </h1>
                        <h3>ajouter un mot de passe en inscrivant vos informations ci-dessous</h3>
                        <form method="POST" action="AddPassword.php">
                          <div class="form-group">
                            <label for="InputSite">Site</label>
                            <input type="name" class="form-control" name="name" placeholder="Site">
                          </div>
                          <div class="form-group">
                            <label for="InputLogin">Identifiant </label>
                            <input type="name" class="form-control" name="identifiant" placeholder="identifiant du compte">
                          </div>
                          <div class="form-group">
                            <label for="group" class="col-form-label">Groupe :</label>
                            <select class="form-control" name="pets" id="pet-select">
                            <option value="">--Choisir un groupe--</option>
                              <?php
                              foreach ($infosGroups as $key) {
                                              ?> <option value="<?php echo $key['id']; ?>"><?php echo $key['nom']; ?></option><?php
                                          }
                              ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="InputPwd">Mot de passe</label>
                            <input type="password" class="form-control" name="password" placeholder="Mot de passe du compte">
                          </div>
                    <button type="submit" name="add" value="Créer" class="btn btn-primary">Add Password</button>
                  </form>
                </div>
                <div>
              </div>
            </div>
          </div>
        </div>
  </nav>

    <!----------------------------------------------SideBar---------------------------------------------------------------->
    <aside class="sidebar">
        <div class="toggle">
            <a href="#" class="burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
                <span></span>
            </a>
        </div>
        <div class="side-inner">

            <div class="profile">
                <a href="profil_page.php"><img src="../images/image-sidebar/person_4.jpg" alt="Image" class="img-fluid"></a>
                <h3 class="name">
                    <?php echo($infosUser['pseudo']); ?>
                </h3>
                <span class="country">Web Designer</span>
            </div>


            <div class="nav-menu">
                <ul>
                    <div>
                        <li><a href="profil_page.php"><span class="icon-pie-chart mr-3"></span>Profil</a></li>
                        <li><a href="../index.php">
                                <span class="icon-sign-out mr-3"></span>Sign out
                            </a></li>
                    </div>
                    <div>
                        <li><a href="../php/listGroup_page.php">
                                <span class="icon-add mr-3"></span>Ajouter groupe
                            </a></li>
                    </div>
                    <div>
                        <li><a>
                        <input class="form-control mr-sm-2" type="search" id="myInput" onkeyup="searchMDP()" placeholder="Search Password" aria-label="Search Password">
                            </a></li>
                    </div>
                </ul>
                <hr />
                <ul id="myUL">
                <?php

                  foreach($mdpInfoItem as $Item)
                  {
              
                ?>
                  <li><a href="#" onclick="retrievePasswordData('<?php echo($Item['site']); ?>','<?php echo($Item['login']); ?>','<?php echo($Item['password']); ?>')">
                <?php
                    echo $Item['site']."</a></li>";
                  }

                ?>
                </ul>
            </div>
        </div>

    </aside>

    <div class="content">
    
        <div class="container">
          <div class="row align-items-stretch no-gutters contact-wrap">
            <div class="col-md-12">
              <div class="form h-100">
                <h3 id="nomSite">nom du site</h3>
                <form class="mb-5" method="POST" id="contactForm" name="contactForm" action="updatePassword.php">
                  <div class="row">
                    <div class="col-md-6 form-group mb-3">
                      <label for="" class="col-form-label">Nom du compte :</label>
                      <input type="text" class="form-control" name="name" id="loginPwdCompte" placeholder="Nom du compte">
                    </div>
                    <div class="col-md-6 form-group mb-3">
                      <label for="" class="col-form-label">Mot de passe du compte :</label>
                      <input type="text" class="form-control" name="text" id="passPwdCompte"  placeholder="Mot de passe">
                    </div>
                    <div class="col-md-6 form-group mb-3">
                      <label for="group" class="col-form-label">Groupe :</label>
                      <select class="form-control" name="pets" id="pet-select">
                        <option value="">--Choisir un groupe--</option>
                        <?php
                        $bdd = new PDO("mysql:host=localhost;dbname=membres;charset=utf8","jordan","toto");

                        $group_ids = $bdd -> prepare("SELECT id,nom FROM groupes WHERE user_id = ?");
                        $group_ids -> execute(array($_SESSION['res_id']));
                        
                        $infosGroups = $group_ids -> fetchAll();

                        foreach ($infosGroups as $key) {
                                        ?> <option value="<?php echo $key['nom']; ?>"><?php echo $key['nom']; ?></option><?php
                                    }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 form-group mb-3">
                      <label for="message" class="col-form-label">Informations supplémentaires :</label>
                      <textarea class="form-control" name="message" id="message" cols="30" rows="4"  placeholder="ajouter des information supplémentaire" style="height: 80px;"></textarea>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 form-group">
						<button type="submit" name="updatePassword" class="btn btn-primary rounded-1 py-2 px-2">
							Sauvegarder
						</button>
					</div>
                  </div>
                </form>
    
                <div id="form-message-warning mt-4"></div> 
                <div id="form-message-success">
                  Vos information on bien été sauvegardé
                </div>
    
              </div>
            </div>
          </div>
        </div>
    
    </div>

    <script src="../js/jquery-3.3.1.min.js" defer></script>
    <script src="../js/popper.min.js" defer></script>
    <script src="../js/bootstrap.min.js" defer></script>
    <script src="../js/sidebar.js" defer></script>
    <script src="../js/accueil.js" defer></script>
    <!----------------------------------------------SideBar---------------------------------------------------------------->
</body>

</html>