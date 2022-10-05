<?php
	if ( !isset($_SERVER['DOCUMENT_ROOT'])) {
		throw new \Exception("Fatal error: \$_SERVER['DOCUMENT_ROOT'] is not set", 1);
	}
	$basePath = $_SERVER['DOCUMENT_ROOT'];
	print($basePath);
    $erreur = 0;
	$bdd = new PDO("mysql:host=localhost;dbname=membres;charset=utf8","jordan","toto");

    if(isset($_POST['connexion'])) {
		$email = htmlspecialchars($_POST['email']);
		$mdp = sha1($_POST['pass']);

		$verifMembre = $bdd -> prepare("SELECT id,email,passwd FROM users WHERE passwd = ? AND email = ?");
		$verifMembre -> execute(array($mdp,$email));

		$exist = $verifMembre -> rowCount();

		if($exist == 1) {
			session_start();
			$user = $verifMembre -> fetch();
			$_SESSION['res_id'] = $user['id'];
			header("Location: accueil_page.php");
		} else {
			$erreur = 1;
			require_once '../index.php';
		}
	}
	//Corriger: quand on essaie de se co on ne peut plus accéder à la page d'inscription ni de re tenter se connecter