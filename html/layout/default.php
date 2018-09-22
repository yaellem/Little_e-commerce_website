<!DOCTYPE html>
<html>
<head>
	<title>E-mmobilier Île-de-France</title>
	<link rel="stylesheet" type="text/css" href="/styles/style.css">
</head>
<body>
	<header>
		<p>E-mobilier, <br>À vous de choisir !</p>
		<nav class="top-nav">
			<ul>
				<?php if($_SESSION['connected'] == false): ?>
					<li><a href="/users/connection">Se log</a></li>
				<?php endif ?>
			</ul>
		</nav>
	</header>
	<div class="sidebar-left">
		<nav>
			<ul>
				<li>
					Provenance: 
					<ul class="submenu"><a href="/articles/index/provenance"></a>
						<li><a href="/articles/index/provenance/amerique">Amérique</a></li>
						<li><a href="/articles/index/provenance/chine">Chine</a></li>
						<li><a href="/articles/index/provenance/france">France</a></li>
						<li><a href="/articles/index/provenance/pole">Pôle.N</a></li>
					</ul>
				</li>
				<li>
					<?php global $category_content; ?>
					Catégories:
					<ul class = "submenu"><a href="/articles/index"></a>
						<?php foreach ($category_content as $key => $value): ?>
							<li><a href="/articles/index/tag/<?php echo $value["id"]; ?>"><?php echo ucfirst($value["categorie"]); ?></a></li>
						<?php endforeach ?>
					</ul>
				</li>
				
			</ul>
		</nav>
	</div>
	<div class="content_for_layout">
		<?php
			render_error();
			render_success();
			echo $content_for_layout;
		?>
 	</div>
	<div class="sidebar-right">
		<nav>
			<ul>
				<?php if($_SESSION['connected'] == true): ?>
					<li><a href="/users/moncompte">Compte</a></li>
					<li><a href="/users/mescommandes">Commandes</a></li>
					<li><a href="/users/deconnection">Se delog</a></li>
					<?php if ($_SESSION["user"]['droit'] == "admin"): ?>
						<li><a href="/admin">Admin</a></li>
					<?php endif ?>
				<?php endif ?>
			</ul>
		</nav>
		<?php if ($_SESSION["cart"]): ?>
		<div class="panier">
			<h3>Panier</h3>
			<ul>
				<?php foreach ($_SESSION["cart"] as $key => $value): ?>
					<li><?php echo $value["count"]; ?> - <?php echo $value['name']; ?><a href="/articles/add/<?php echo $value['id_article']; ?>"><img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDQyIDQyIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA0MiA0MjsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSIzMnB4IiBoZWlnaHQ9IjMycHgiPgo8cG9seWdvbiBwb2ludHM9IjQyLDIwIDIyLDIwIDIyLDAgMjAsMCAyMCwyMCAwLDIwIDAsMjIgMjAsMjIgMjAsNDIgMjIsNDIgMjIsMjIgNDIsMjIgIiBmaWxsPSIjMDAwMDAwIi8+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=" /></a><a href="/articles/remove/<?php echo $value['id_article']; ?>"><img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjMycHgiIGhlaWdodD0iMzJweCIgdmlld0JveD0iMCAwIDgzIDgzIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA4MyA4MzsiIHhtbDpzcGFjZT0icHJlc2VydmUiPgo8Zz4KCTxwYXRoIGQ9Ik04MSwzNi4xNjZIMmMtMS4xMDQsMC0yLDAuODk2LTIsMnY2LjY2OGMwLDEuMTA0LDAuODk2LDIsMiwyaDc5YzEuMTA0LDAsMi0wLjg5NiwyLTJ2LTYuNjY4ICAgQzgzLDM3LjA2Miw4Mi4xMDQsMzYuMTY2LDgxLDM2LjE2NnoiIGZpbGw9IiMwMDAwMDAiLz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K" /></a><a href="/articles/delete_all/<?php echo $value['id_article']; ?>"><img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDMxLjExMiAzMS4xMTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDMxLjExMiAzMS4xMTI7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iMzJweCIgaGVpZ2h0PSIzMnB4Ij4KPHBvbHlnb24gcG9pbnRzPSIzMS4xMTIsMS40MTQgMjkuNjk4LDAgMTUuNTU2LDE0LjE0MiAxLjQxNCwwIDAsMS40MTQgMTQuMTQyLDE1LjU1NiAwLDI5LjY5OCAxLjQxNCwzMS4xMTIgMTUuNTU2LDE2Ljk3ICAgMjkuNjk4LDMxLjExMiAzMS4xMTIsMjkuNjk4IDE2Ljk3LDE1LjU1NiAiIGZpbGw9IiMwMDAwMDAiLz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPC9zdmc+Cg==" /></a></li>					
				<?php endforeach ?>
			</ul>
			<p class="text-center">
				Prix : <?php echo $_SESSION["pricecart"]; ?>$<br>
				<a href="/panier/valider">Valider son panier</a>
			</p>
		</div>
		<?php endif ?>
	</div>
</body>
</html>