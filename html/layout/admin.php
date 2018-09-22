<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="/styles/admin.css">
</head>
<body>
	<div class="container">
		<div class="sidebar">
			<ul>
				<li><a href="/admin/indexusers">Utilisateurs</a></li>
				<li><a href="/admin/indexarticles">Articles</a></li>
				<li><a href="/admin/indexcommandes">Commandes</a></li>
			</ul>
		</div>
		<div class="content">
			<?php 
				echo $content_for_layout;
			?>
		</div>
	</div>
</body>
</html>