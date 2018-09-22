<div class="form">
	<h2>Ajouter une category</h2>
	<?php
		render_error();
		render_success();
	?>
	<form class="article-form" method="POST" action="/admin/category_add">
		<label for="name">Nom </label><input type="text" name="name">	
		<input type="submit" value="Ajouter">
	</form>
</div>