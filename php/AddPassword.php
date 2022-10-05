<?php
	session_start();

	$bdd = new PDO("mysql:host=localhost;dbname=membres;charset=utf8","jordan","toto");

	if(isset($_POST['add'])) {
		$site = htmlspecialchars($_POST['name']);
		$login = htmlspecialchars($_POST['identifiant']);
		$mdp = sha1($_POST['password']);
		$group = htmlspecialchars($_POST['pets']);

		if(isset($group)) {
			$group_id = $group;
		} else {
			$group_id = NULL;
		}

		if($_SESSION['res_id'] != 0) {
			$ajoutMdp = $bdd -> prepare("INSERT INTO gestionmdp(user,site,login,password,group_id) VALUES(?,?,?,?,?)");
			$ajoutMdp -> execute(array($_SESSION['res_id'], $site,$login,$mdp,$group_id));
			header("Location: accueil_page.php");
		}
	}