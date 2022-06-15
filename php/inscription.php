<?php

    function verifPasswd ($mdp1, $mdp2) {
        $countMaj = 0;
        $countCaraSpecial = 0;
        for($i = 0; $i < strlen($_POST['mdp']); $i += 1) {
            if(ctype_upper($_POST['mdp'][$i])) {
                $countMaj += 1;
            }
            if(ctype_digit($_POST['mdp'][$i])) {
                $countCaraSpecial += 1;
            }
        }

        if ($mdp1 == $mdp2 && strlen($mdp1) > 7 AND $countMaj >= 1 AND $countCaraSpecial >= 1) {
            return true;
        } else {
            return false;
        }
    }

    function verifEmail ($email1, $email2) {
        if ($email1 == $email2) {
            $testEmail = $bdd -> prepare("SELECT * FROM users WHERE email = ?");
            $testEmail -> execute(array($_POST['email']));

            $emailUse = $testEmail -> rowCount();
            return $emailUse; 
        } else {
            return 1;
        }
    }

    $erreur = 0;
	$erreurMdp = 0;
	$erreurMail = 0;
	$bdd = new PDO("mysql:host=localhost;dbname=membres;charset=utf8","jordan","toto");

    if(isset($_POST['inscription'])) {
		$name = htmlspecialchars($_POST['name']);
		$email1 = htmlspecialchars($_POST['email']);
		$email2 = htmlspecialchars($_POST['confirmEmail']);
		$mdp1 = sha1($_POST['mdp']);
		$mdp2 = sha1($_POST['confirmMdp']);
		
		if (verifPasswd($mdp1, $mdp2)) {
			if(verifEmail($email1, $email2) == 0) {
				$ajoutMembre = $bdd -> prepare("INSERT INTO users(pseudo, email, passwd) VALUES(?,?,?)");
						$ajoutMembre -> execute(array($name, $email1, $mdp1));
						header("Location: index.php");
			} else {
				$erreurMail = 1;
			}
		} else {
			$erreur = 1;
		}
		
    }

?>