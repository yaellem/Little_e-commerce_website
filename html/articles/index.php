<div class="box box-grid">
	<?php if (count($articles) == 0): ?>
		<div>
			<h3 class="full-row text-center">Aucun element dans la categorie</h3>
		</div>
	<?php else: ?>
		<?php foreach ($articles as $key => $value) { ?>
			<div>
				<img src="<?php echo $value["img"]; ?>" height="150px;" style="border:1px solid rgb(209, 206, 255);">
				<p class="desc">
					<?php echo "<b>".$value["name"]."</b>:".$value["desc"]; ?>
				</p>
				<p class="provenance">
					Provenance : <?php echo $value["provenance"] ?>	
				</p>
				<a class="addcart" href="/articles/add/<?php echo $value["id"] . "/" . $filter . "/" . $type; ?>">
					Ajouter au panier
				</a>
				<p class="right text-right bold white"><?php echo $value["prix"] . "$"; ?></p>
			</div>
		<?php }	?>
	<?php endif ?>
</div>