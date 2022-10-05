<?php
	session_start();

	$bdd = new PDO("mysql:host=localhost;dbname=membres;charset=utf8","jordan","toto");

	if(isset($_POST['updatePassword'])) {
		$login = htmlspecialchars($_POST['loginPwdCompte']);
		$mdp = sha1($_POST['passPwdCompte']);
		//$comm = htmlspecialchars($_POST['comm']);

		if($_SESSION['res_id'] != 0) {
			$ajoutMdp = $bdd -> prepare("UPDATE gestionmdp(user,login,password) VALUES(?,?,?)");
			$ajoutMdp -> execute(array($_SESSION['res_id'], $site,$login,$mdp));
			header("Location: accueil_page.php");
		}
	}