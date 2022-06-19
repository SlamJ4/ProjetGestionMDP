<?php
    session_start();
    $bdd = new PDO("mysql:host=localhost;dbname=membres;charset=utf8","jordan","toto");
    
    $user = $bdd -> prepare("SELECT * FROM users WHERE id = ?");
    $user -> execute(array($_SESSION['res_id']));
    
    $infosUser = $user -> fetch();
    
    $mdpItem = $bdd -> prepare("SELECT * FROM gestionmdp WHERE user = ?");
    $mdpItem -> execute(array($_SESSION['res_id']));
    
    $mdpInfoItem = $mdpItem -> fetch();
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
        <a class="navbar-brand" href="#">TopLock</a>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link " href="#" onclick="ajouteLigne('myUl','popo')">Add
                    Password</a></li>
        </ul>

        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" id="myInput" onkeyup="searchMDP()"
                placeholder="Search Password" aria-label="Search Password">
        </form>


    </nav>
    <!--
    <div class="main">
    
    <script>$(document).ready(function () {
            new ClipboardJS('.btn');
        });
    </script>
        <div>
            <p>Items : </p>
        </div>
        <div>
            <form class="form-inline">
                <input class="form-control mr-sm-2" type="write" placeholder="Username/Mail" aria-label="UsernameMail">
            </form>
        </div>
        <div>
            <form class="form-inline">
                <input class="form-control mr-sm-2" type="write" placeholder="Password" aria-label="Password"
                    id="clipboardPassword">
            </form>
        </div>

        <button type="button" class="btn btn-info btn-clipboard" data-clipboard-action="copy"
            data-clipboard-target="#clipboardPassword">Copy</button>

        <div class='bottom-right'>
            <button class="btn">
                <img title="Have an idea !" src="images/imgacceuil/Idea/bulbclair24px.png"
                    onmouseover="this.src='images/imgacceuil/Idea/bulbfull24px.png'"
                    onmouseout="this.src='images/imgacceuil/Idea/bulbclair24px.png'" />
            </button>
        </div>
    </div> -->

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
                        <li><a href="index.php">
                                <span class="icon-sign-out mr-3"></span>Sign out
                            </a></li>
                    </div>
                </ul>
                <hr />
                <ul id="myUL">
                    <li><a href="#"><?php echo($mdpInfoItem['site']); ?></a></li>
                    <li><a href="#"><?php echo($mdpInfoItem['site']); ?></a></li>

                    <li><a href="#">Billy</a></li>
                    <li><a href="#">Bob</a></li>

                    <li><a href="#">Calvin</a></li>
                    <li><a href="#">Christina</a></li>
                    <li><a href="#">Cindy</a></li>
                    <li><a href="#">COucou</a></li>
                </ul>
            </div>
        </div>

    </aside>

    <script src="../js/jquery-3.3.1.min.js" defer></script>
    <script src="../js/popper.min.js" defer></script>
    <script src="../js/bootstrap.min.js" defer></script>
    <script src="../js/sidebar.js" defer></script>
    <script src="../js/accueil.js" defer></script>
    <!----------------------------------------------SideBar---------------------------------------------------------------->
</body>

</html>