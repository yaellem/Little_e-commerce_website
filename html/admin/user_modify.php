<div class="form">
	<h2>Modifier un utilisateur</h2>
	<?php
		render_error();
		render_success();
	?>
	<form class="article-form" method="POST" action="/admin/user_modify/<?php echo $user["id"]; ?>">
		<label for="name">Nom </label><input type="text" name="name" disabled="" value="<?php echo $user["login"]; ?>">
		<label for="droit">Droits</label>
		<select name="droit">
			<option value="user" <?php if ($user["droit"] == "user") { echo "selected"; }; ?>>Users</option>
			<option value="admin" <?php if ($user["droit"] == "admin") { echo "selected"; }; ?>>Admin</option>
		</select>
		<input type="submit" value="Valider">
	</form>
</div>