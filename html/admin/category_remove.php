<div class="form">
	<h2>Retirer un tag</h2>
	<?php
		render_error();
		render_success();
	?>
	<table>
	<?php if (count($tag) == 0): ?>
		<p style="text-align: center;">Aucune categorie pour le moment. <a href="/admin/category_add">Ajoutez en</a></p>
	<?php endif ?>
	<?php foreach ($tags as $key => $value): ?>
		<tr>
			<td><?php echo $value["categorie"]; ?></td>
			<td><a href="/admin/category_remove/<?php echo $value["id"]; ?>">retirer</a></td>
		</tr>
	<?php endforeach ?>
	</table>
</div>