<?php
$erreur = 0;
$erreurMail = 0;
$erreurMdp = 0;
?>
<html lang="fr">
<head>
	<title>TopLock</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/inscription.css">
	<link rel="stylesheet" type="text/css" href="../css/inscription_page.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
						<br>
						<br>
						<br>
						<br>
					<img src="../images/logo.png" alt="IMG" class="centrer" style="width:200px;height:200px;">
				</div>

				<form class="login100-form validate-form" method="POST" action="inscription.php">
					<span class="login100-form-title">
						Inscription
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Entrer un Nom">
						<input class="input100" type="name" name="name" placeholder="Nom" required="required">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-solid fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Entrer un email valide : ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email" required="required">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Entrer un email valide : ex@abc.xyz">
						<input class="input100" type="text" name="confirmEmail" placeholder="Confirmation Email" required="required">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Le mot de passe est requis">
						<input class="input100" type="password" name="mdp" placeholder="Mot de passe" required="required">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Vous devez répéter le mot de passe">
						<input class="input100" type="password" name="confirmMdp" placeholder="Répéter le mot de passe" required="required">
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
							<p style="color: red;">Les mots de passe ne se correspondent pas ou votre mot de passe ne contient pas au minimum 7 caractères dont 1 majuscule et 1 chiffre</p>
							<?php
						}
						if($erreurMdp == 1) {
							?>
							<p style="color: red;">Votre mot de passe doit contenir au minimum 7 caractères dont 1 majuscule et 1 chiffre</p>
							<?php
						}
						if($erreurMail == 1) {
							?>
							<p style="color: red;">Les addresses mails ne se correspondent pas ou celle-ci est déjà utilisée !</p>
							<?php
						}
					?>
					<div class="text-center p-t-10">
						<a class="txt2" href="../index.php">
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