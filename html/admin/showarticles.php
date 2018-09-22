<div class="content">
	<table style="width: 70%; margin: auto; margin-top: 25vh; transform: translateY(-25%);	">
		<thead>
			<tr>
				<th>ID</th>
				<th>LOGIN</th>
				<th>INFO</th>
				<th>MODIFIER</th>
				<th>SUPPRIMER</th>
			</tr>
		</thead>
		<?php foreach ($users as $key => $value): ?>
			<tr>
				<td><?php echo $value["id"]; ?></td>
				<td><?php echo $value["login"]; ?></td>
				<td>info</td>
				<td>modifier</td>
				<td>supprimer</td>
			</tr>
		<?php endforeach ?>
	</table>
</div>