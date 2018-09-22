<div class="form">
	<h2>Ajouter un article</h2>
	<?php
		render_error();
		render_success();
	?>
	<form class="article-form" method="POST" action="/admin/article_add">
		<label for="name">Nom de l'article</label><input type="text" required name="name">	
		<label for="desc">Description</label><input type="text" required name="desc">
		<label for="prix">Prix</label><input type="text" required name="prix">
		<label for="provenance">Provenance</label>
		<select type="text" name="provenance">
			<option value="amerique">Amerique</option>
			<option value="chine">Chine</option>
			<option value="france">France</option>
			<option value="pole">Pole Nord</option>
		</select>
		<label for="count">Quantite</label><input type="text" required name="count">
		<label for="img">Image</label><input type="text" required name="img">
		<label for="cat">Categorie</label>
		<?php if (count($cat) == 0 ): ?>
			<p>Pas de categorie</p>
		<?php else: ?>
			<select type="text" name="categorie[]" multiple="multiple">
			<?php foreach ($cat as $key => $value): ?>
				<option value="<?php echo $value["id"]; ?>">
					<?php echo $value["categorie"]; ?>
				</option>
			<?php endforeach ?>
			</select>
		<?php endif ?>
		<input type="submit" value="Ajouter">
	</form>
</div>