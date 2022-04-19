<?php
	$erreur = 0;
	$erreurMdp = 0;
	$bdd = new PDO("mysql:host=localhost;dbname=membres;charset=utf8","root","");

    if(isset($_POST['inscription'])) {
		$name = htmlspecialchars($_POST['name']);
		$email1 = htmlspecialchars($_POST['email']);
		$email2 = htmlspecialchars($_POST['confirmEmail']);
		$mdp1 = sha1($_POST['mdp']);
		$mdp2 = sha1($_POST['confirmMdp']);
		
		if ($mdp1 == $mdp2) {
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
			if(strlen($_POST['mdp']) > 7 AND $countMaj >= 1 AND $countCaraSpecial >= 1) {
				if($email1 == $email2) {
					$ajoutMembre = $bdd -> prepare("INSERT INTO users(pseudo, email, passwd) VALUES(?,?,?)");
					$ajoutMembre -> execute(array($name, $email1, $mdp1));
					header("Location: index.php");
				} else {
					$erreur = 1;
				}
			} else {
				$erreurMdp = 1;
			}
			/*if($email1 == $email2) {
				$ajoutMembre = $bdd -> prepare("INSERT INTO users(pseudo, email, passwd) VALUES(?,?,?)");
				$ajoutMembre -> execute(array($name, $email1, $mdp1));
				header("Location: index.php");
			} else {
				$erreur = 1;
			}*/
		} else {
			$erreur = 1;
		}
		
		//Ajouter pour empêcher création de compte si nom ou mail déjà utilisé
    }
    
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>TopLock</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/inscription.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<style>
						.centrer {
						  display: block;
						  margin-left: auto;
						  margin-right: auto;
						}
						</style>
						<br>
						<br>
						<br>
						<br>
					<img src="images/logo.png" alt="IMG" class="centrer" style="width:200px;height:200px;">
				</div>

				<form class="login100-form validate-form" method="POST">
					<span class="login100-form-title">
						Inscription
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Entrer un Nom">
						<input class="input100" type="name" name="name" placeholder="Nom">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-solid fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Entrer un email valide : ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Entrer un email valide : ex@abc.xyz">
						<input class="input100" type="text" name="confirmEmail" placeholder="Confirmation Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Le mot de passe est requis">
						<input class="input100" type="password" name="mdp" placeholder="Mot de passe">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Vous devez répéter le mot de passe">
						<input class="input100" type="password" name="confirmMdp" placeholder="Répéter le mot de passe">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button name="inscription"  class="login100-form-btn">
							Inscription
						</button>
					</div>
					<?php
						if($erreur == 1) {
							?>
							<p style="color: red;">Les mots de passe ou les mails ne correspondent pas</p>
							<?php
						}
						if($erreurMdp == 1) {
							?>
							<p style="color: red;">Votre mot de passe doit contenir au minimum 7 caractères dont 1 majuscule et 1 chiffre</p>
							<?php
						}
					?>
					<div class="text-center p-t-10">
						<a class="txt2" href="index.php">
							Vous avez déjà un compte ?
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/login-register.js"></script>

</body>
</html>