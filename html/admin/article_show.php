<div class="form">
	<h2>Les articles</h2>
	<?php
		render_error();
		render_success();
	?>
	<?php if (count($articles) == 0): ?>
		<p style="text-align: center;">Aucun article pour le moment. <a href="/admin/article_add">Ajoutez en</a></p>
	<?php endif ?>
	<table>
	<?php foreach ($articles as $key => $value): ?>
		<tr>
			<td><?php echo $value["name"]; ?></td>
			<td><a href="/admin/article_modify/<?php echo $value["id"]; ?>">modifier</a></td>
			<td><a href="/admin/article_remove/<?php echo $value["id"]; ?>">retirer</a></td>
		</tr>
	<?php endforeach ?>
	</table>
</div>