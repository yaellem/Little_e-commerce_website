<div class="full box">
	<div class="full">
		<h2 style="overflow: hidden;">Mon compte: <?php echo $info["login"]; ?></h2>
		<br>
		<h3 class="text-center">Modifier son mot de passe</h3>
		<form method="POST" action="/users/moncompte">
			<p style="line-height: 3em; width: 60%; margin: auto; text-align: right; display: grid; grid-template-columns: 1fr 1fr;">
				<label for="oldpass">Ancien mot de passe :&nbsp;</label><input type="password" name="oldpass" id="oldpass" placeholder="pass">
				<label for="newpass">Mot de passe :&nbsp;</label><input type="password" name="newpass" id="newpass" placeholder="pass">
				<label for="renewpass">Retappez le :&nbsp;</label><input type="password" name="renewpass" id="renewpass" placeholder="pass">
				<br><input type="submit" name="formmdp" value="valider">
			</p>
		</form>
		<h3 class="text-center">Action</h3>
		<p class="text-center">
			<a href="/users/autodel">SUPPRIMER</a>
		</p>
		<p class="full text-center" style="padding: 20px;">
			Derniere fois connecte <?php echo $info["last_log"]; ?>
			<br>
			Date d'inscription <?php echo $info["inscription"]; ?>
		</p>

	</div>
</div>