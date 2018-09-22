<form  method="post" action="/users/create">
	<div id="bandeau-co">
		<p class="cr">Creation de votre compte</p>
		<p class="login">Votre login:</p>
		<input class="log1" type="text" name="login" value="" required placeholder="Choisissez un login"></input>
		<p class="passwd">Votre password:</p>
		<input class="log1" type="password" name="passwd" required value=""></input>
		<p>
			<input class="sub" type="submit" name="submit" value="OK"></input>
		</p>
	</div>
	<div>
		<p class="samelogin">
		<?php if ($_SESSION['sameuser'] == TRUE){echo "Le login existe déjà"; $_SESSION['sameuser'] = FALSE;} ?>	
		</p>
	</div>
</form>
</div>
<a href="/users/create">
	<p class="create-acc">
		Créer un compte
	</p>
</a>