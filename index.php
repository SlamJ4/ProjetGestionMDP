<?php
	$erreur = 0;
	$bdd = new PDO("mysql:host=localhost;dbname=membres;charset=utf8","jordan","toto");

	if(isset($_POST['connexion'])) {
		$email = $_POST['email'];
		$mdp = sha1($_POST['pass']);

		$verifMembre = $bdd -> prepare("SELECT * FROM users WHERE email = ? AND password = ?");
		$verifMembre -> execute(array($email, $mdp));

		$exist = $verifMembre -> rowCount();

		if($exist == 1) {
			header("Location: acceuil.php");
		} else {
			$erreur = 1;
		}
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
	<link rel="stylesheet" type="text/css" href="css/main.css">
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

				<form class="login100-form validate-form" /*action="verification.php"*/ method="POST">
					<span class="login100-form-title">
						Connexion
					</span>

					<?php
						if($erreur == 1) {
							?>
							<p style="color: red;">Les identifiants sont incorrects</p>
							<?php
						}
					?>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Mot de passe">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button name="connexion" class="login100-form-btn">
							Connexion
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Oublier
						</span>
						<a class="txt2" href="#">
							Utilisateur / Mot de Passe ?
						</a>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="inscription.php">
							Créer un utilisateur
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
	<script src="js/main.js"></script>

</body>
</html>