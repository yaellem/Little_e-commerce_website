<div class="form">
	<h2>Commandes #<?php echo $cmd["id"]; ?></h2>
	<table>
		<?php foreach ($cmd["commande"] as $key => $value): ?>
		<tr>
			<td><?php echo $value["count"]; ?></td>
			<td><?php echo $value["name"]; ?></td>
		</tr>				
		<?php endforeach ?>
	</table>
</div>