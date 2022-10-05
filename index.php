<?php

//$sBasepath=$_SERVER['DOCUMENT_ROOT'].'/ProjetGestionMDP'.'/';
//echo $sBasepath;
if ( !isset($_SERVER['DOCUMENT_ROOT'])) {
	throw new \Exception("Fatal error: \$_SERVER['DOCUMENT_ROOT'] is not set", 1);
}
//base path debug line
//$basePath = $_SERVER['DOCUMENT_ROOT'];
//print("($basePath)");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>TopLock</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="/ProjetGestionMDP/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/ProjetGestionMDP/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/ProjetGestionMDP/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/ProjetGestionMDP/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="/ProjetGestionMDP/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/ProjetGestionMDP/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/ProjetGestionMDP/css/util.css">
	<link rel="stylesheet" type="text/css" href="/ProjetGestionMDP/css/login.css">
	<link rel="stylesheet" type="text/css" href="/ProjetGestionMDP/css/index.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
						<br>
						<br>
					<img src="/ProjetGestionMDP/images/logo.png" alt="IMG" class="centrer" style="width:200px;height:200px;">
				</div>

				<form class="login100-form validate-form" method="POST" action="php/connexion.php">
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
						<input class="input100" type="email" name="email" placeholder="Email" required="required">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Mot de passe" required="required">
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

					<div class="text-center p-t-10">
						<a class="txt2" href="php/inscription_form.php">
							Créer un utilisateur
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="../vendor/jquery/jquery-3.2.1.min.js" defer></script>
<!--===============================================================================================-->
	<script src="../vendor/bootstrap/js/popper.js" defer></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js" defer></script>
<!--===============================================================================================-->
	<script src="../vendor/select2/select2.min.js" defer></script>
<!--===============================================================================================-->
	<script src="../vendor/tilt/tilt.jquery.min.js" defer></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="../js/main.js" defer></script>

</body>
</html>