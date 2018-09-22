<form  method="post" action="/users/connection">
	<?php
		render_error();
		render_success();
	?>
	<div id="bandeau-co">
		<p class="co">Connexion</p>
		<p class="login">Login:</p>
		<input class="log" type="text" name="login" required value="">
		<p class="passwd">Password:</p>
		<input class="log" type="password" name="passwd" required value="">
			<p>
				<?php if ($_SESSION['badpass'] == FALSE && $_SESSION['badlog'] == FALSE && $_SESSION['nolog'] == FALSE){?><a ref="/articles"><input class="sub" type="submit" name="submit" value="OK"></a>
				<?php } ?>
		</p>
	</div>
	<div >
		<p class="badlogin">
			<?php if ($_SESSION['badlog'] == TRUE){echo "Login incorrecte"; $_SESSION['badlog'] = FALSE;}?>		
		</p>
		<p class="badlogin">
			<?php if ($_SESSION['nolog'] == TRUE){echo "Veuillez créez un compte."; $_SESSION['nolog'] = FALSE;}?>
		</p>
		<p class="badlogin">
			<?php if ($_SESSION['badpass'] == TRUE){echo "Password incorrecte"; $_SESSION['badpass'] = FALSE;}?>
		</p>
	</div>
</form>
<p class="text-center">
	<a class="create-acc" href="/users/create">Créer un compte</a>
</p>