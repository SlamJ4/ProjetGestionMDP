<?php
    $erreur = 0;
	$bdd = new PDO("mysql:host=localhost;dbname=membres;charset=utf8","jordan","toto");

    if(isset($_POST['connexion'])) {
		$email = htmlspecialchars($_POST['email']);
		$mdp = sha1($_POST['pass']);

		$verifMembre = $bdd -> prepare("SELECT * FROM users WHERE passwd = ?");
		$verifMembre -> execute(array($mdp));

		$exist = $verifMembre -> rowCount();

		if($exist == 1) {
			session_start();
			$user = $verifMembre -> fetch();
			$_SESSION['res_id'] = $user['id'];
			header("Location: accueil_page.php");
		} else {
			$erreur = 1;
		}
	}
