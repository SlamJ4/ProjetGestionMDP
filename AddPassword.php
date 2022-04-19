<?php
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Add a Password</title>
	<meta charset="utf-8">
	<style type="text/css">
		
	</style>
</head>
<body>
	<br>
	<br>
	<form method="POST">
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
				<td></td>
				<td>
					<input type="submit" name="add" value="Créer">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>