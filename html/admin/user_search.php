<div class="form">
	<h2>Rechercher un utilisateur</h2>
	<?php
		render_error();
		render_success();
	?>
	<form class="article-form" method="POST" action="/admin/user_search">
		<label for="name">Nom </label><input type="text" name="name" >
		<input type="submit" value="Rechercher">
	</form>
	<?php
	if (isset($users)) { ?>
		<ul >
			<?php foreach ($users as $key => $value): ?>
				<li style="display: grid; grid-template-columns: 1fr 2fr 2fr 2fr 2fr; text-align: center;">
					<p class="text-center;"><?php echo $value["id"]; ?></p>
					<p><?php echo $value["login"]; ?></p>
					<p><a href="">Commandes</a></p>
					<p><a href="/admin/user_modify/<?php echo $value["id"]; ?>">Modifier</a></p>
					<p><a href="/admin/user_remove/<?php echo $value["id"]; ?>">Supprimer</a></p>
				</li>
			<?php endforeach ?>
		</ul>
	<?php
	}
	?>
</div>