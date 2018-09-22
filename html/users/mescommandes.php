<div class="box">
	<h2>Mes commandes</h2>
	<?php if (count($commandes) == 0): ?>
		<div>
			<h3 class="full-row text-center">Aucun element dans la categorie</h3>
		</div>
	<?php else: ?>
	<?php foreach ($commandes as $key => $value): ?>
		<div style="padding: 20px;">
			<?php 
				$list = unserialize($value["commande"]);
				if (is_array($list)) {
					foreach ($list as $key => $value){
						echo "<p> - " . $value["name"] . " X " . $value["count"] . "</p>";
					}
				}
				echo "<p>Prix de la commande ".$value["price"]."<p>";
			?>
		</div>		
	<?php endforeach ?>
	<?php endif ?>
</div>