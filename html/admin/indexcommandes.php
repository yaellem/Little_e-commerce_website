<div class="form">
	<h2>Liste des commandes</h2>
	<?php if (count($cmd) == 0): ?>
		<p>
			Il n'y a aucune commande dans la table;
		</p>
	<?php else: ?>
	<table>
	<?php foreach ($cmd as $key => $value): ?>
		<tr>
			<td><?php echo $value["id"]; ?></td>
			<td><a href="/admin/commande_show/<?php echo $value["id"]; ?>">VOIR</a></td>
			<td><a href="/admin/commande_del/<?php echo $value["id"]; ?>">SUPPRIMER</a></td>
		</tr>	
	<?php endforeach ?>
	</table>
	<?php endif ?>
</div>