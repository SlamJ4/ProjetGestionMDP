<?php
session_start();
if (!$_SESSION['res_id']) {
	header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Ajouter un mot de passe</title>
	<meta charset="utf-8">
	<style type="text/css">
	</style>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
	<br>
	<br>
	<form method="POST" action="AddPassword.php">
		<table align="center">
			<tr>
				<td align="right">
					<label for="name">
						<b>Site (<i>Nom ou URL</i>) : </b>
					</label>
				</td>
				<td>
					<input type="text" name="name" placeholder="Nom ou URL du site">
				</td>
			</tr>
			<tr>
				<td align="right">
					<label for="identifiant">
						<b>Identifiant : </b>
					</label>
				</td>
				<td>
					<input type="text" name="identifiant" placeholder="Pseuo ou Email">
				</td>
			</tr>
			<tr>
				<td align="right">
					<label for="mdp">
						<b>Mot de Passe : </b> 
					</label>
				</td>
				<td>
					<input type="pasword" name="password" placeholder="Mot de Passe">
				</td>
			</tr>
			<tr>
				<td>
					<label for="comm">
						<b>Commentaires : </b>
					</label>
				</td>
				<td>
					<input type="textarea" name="comm" placeholder="Infos supplémentaires">
				</td>
			</tr>
			<tr>
				<td>
					<label for="group">
						<b>Groupe</b>
					</label>
				</td>
				<td>
					<select name="pets" id="pet-select">
						<option value="">--Please choose an option--</option>
						<?php
						$bdd = new PDO("mysql:host=localhost;dbname=membres;charset=utf8","jordan","toto");

						$group_ids = $bdd -> prepare("SELECT id,nom FROM groupes WHERE user_id = ?");
						$group_ids -> execute(array($_SESSION['res_id']));
						
						$infosGroups = $group_ids -> fetch();

						foreach ($variable as $key => $value) {
							?>
							<option value="test"><?php echo $variable; ?></option><?php
						};
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" name="add" value="Créer">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>