<?php

function	def_func()
{
	if (!($_SESSION != NULL && $_SESSION["connected"] && $_SESSION["droit"] == "admin")) {
		header("Location: /");
		return(0);
	}
}

function	index()
{
	indexusers();
}

function	commande_del($id = NULL)
{
	if ($id === NULL) {
		header("Location: /admin");
		return(0);
	}
	$res = delete(["id" => intval($id)], "commande");
	if ($res) {
		$_SESSION["success"] = "Commande supprime";
	} else {
		$_SESSION["error"] = "Erreur inconnu lors de la suppression";
	}
	header("Location: /admin");
	return(0);
}

function	commande_show($id = NULL)
{
	if ($id === NULL) {
		header("Location: /admin");
		return(0);
	}
	$cmd = selectfirst([
		"table"	=>	"commande",
		"cond"	=>	["id" => intval($id)]
	]);
	$cmd["commande"] = unserialize($cmd["commande"]);
	ob_start();
	include ROOT.DS."html".DS."admin".DS."commande_show.php";
	$content_for_layout = ob_get_clean();
	include ROOT.DS."html".DS."layout".DS."admin.php";
}

function	indexcommandes()
{
	$cmd = select(["table" => "commande"]);
	ob_start();
	include ROOT.DS."html".DS."admin".DS."indexcommandes.php";
	$content_for_layout = ob_get_clean();
	include ROOT.DS."html".DS."layout".DS."admin.php";
}

function	showusers()
{
	$users = select(["table" => "users"]);
	ob_start();
	include ROOT.DS."html".DS."admin".DS."showusers.php";
	$content_for_layout = ob_get_clean();
	include ROOT.DS."html".DS."layout".DS."admin.php";
}

/*
** Users
*/
function	user_modify($id = NULL)
{
	if ($id !== NULL) {
		if ($_POST) {
			if ($_POST["droit"])
			{
				$res = update(
					["droit" => $_POST["droit"]],
					["id" => intval($id)],
					"users"
				);
				if ($res)
					$_SESSION["success"] = "Utilisateur modifier";
				else
					$_SESSION["error"] = "Un probleme est survenu lors la modification.";
			} else {

			}
		}
		$user = select(["cond" => ["id" => intval($id)], "table" => "users"]);
		if (count($user) == 0)
			header("Location: /");
		$user = $user[0];
		ob_start();
		include ROOT.DS."html".DS."admin".DS."user_modify.php";
		$content_for_layout = ob_get_clean();
		include ROOT.DS."html".DS."layout".DS."admin.php";
	} else {
		header("Location: /");
	}
}

function	user_remove($id = NULL)
{
	if ($id !== NULL) {
		$res = delete(["id" => intval($id)], "users");
		if ($res)
			$_SESSION["success"] = "Utilisateur supprime";
		else
			$_SESSION["error"] = "Un probleme est survenu lors la suppression.";
		header("Location: /admin/showusers");
	} else {
		header("Location: /");
	}
}

function	user_search()
{
	if ($_POST && $_POST["name"]) {
		$users = select([
			"cond"	=> ['login' => $_POST["name"]],
			"table" => "users"
		]);
		if (count($users) == 0) {
			$_SESSION["error"] = "Utilisateur introuvable.";
		} else {
			$_SESSION["success"] = "Utilisateur trouve";
		}
	}
	ob_start();
	include ROOT.DS."html".DS."admin".DS."user_search.php";
	$content_for_layout = ob_get_clean();
	include ROOT.DS."html".DS."layout".DS."admin.php";
}

function	indexusers()
{
	ob_start();
	include ROOT.DS."html".DS."admin".DS."indexusers.php";
	$content_for_layout = ob_get_clean();
	include ROOT.DS."html".DS."layout".DS."admin.php";
}

/*
** Category
*/

function	category_add()
{
	if ($_POST && $_POST["name"]){
		$tag = select(["table" => "categories", "cond" => ["categorie" => $_POST["name"]]]);
		if (count($tag) > 0) {
			$_SESSION["error"] = "La categorie existe deja";
		} else {
			$res = insert([
				"categorie"				=>	$_POST["name"]
			], "categories");
			if ($res)
				$_SESSION["success"] = "Categorie ajoute";
			else
				$_SESSION["error"] = "Un probleme est survenu lors de l'ajout du tag";
		}
	}
	ob_start();
	include ROOT.DS."html".DS."admin".DS."category_add.php";
	$content_for_layout = ob_get_clean();
	include ROOT.DS."html".DS."layout".DS."admin.php";
}

function	category_remove($id = NULL)
{
	if ($id !== NULL) {
		delete(["id" => intval($id)], "categories");
	}
	$tags = select(["table" => 'categories']);
	ob_start();
	include ROOT.DS."html".DS."admin".DS."category_remove.php";
	$content_for_layout = ob_get_clean();
	include ROOT.DS."html".DS."layout".DS."admin.php";
}

/*
** Articles
*/
function	showarticles()
{
	$users = select(["table" => "articles"]);
	ob_start();
	include ROOT.DS."html".DS."admin".DS."showarticles.php";
	$content_for_layout = ob_get_clean();
	include ROOT.DS."html".DS."layout".DS."admin.php";
}

function	indexarticles()
{
	ob_start();
	include ROOT.DS."html".DS."admin".DS."indexarticles.php";
	$content_for_layout = ob_get_clean();
	include ROOT.DS."html".DS."layout".DS."admin.php";
}

function	article_remove($id = NULL)
{
	if ($id !== NULL) {
		$res = delete(["id" => intval($id)], "articles");
		if ($res)
			$_SESSION["success"] = "Article supprime";
		else
			$_SESSION["error"] = "Un probleme est survenu lors la suppression.";
		header("Location: /admin/article_show");
	} else {
		header("Location: /");
	}
}

function	article_show($id = NULL)
{
	if ($id !== NULL) {
		delete(["id" => intval($id)], "articles");
	}
	$articles = select(["table" => 'articles']);
	ob_start();
	include ROOT.DS."html".DS."admin".DS."article_show.php";
	$content_for_layout = ob_get_clean();
	include ROOT.DS."html".DS."layout".DS."admin.php";
}

function	article_modify($id = NULL)
{
	if ($id === NULL) {
		header("Location: /admin");
		return(0);
	}
	$cat = select(["table"	=> "categories"]);
	$article = select(["cond" => ["id" => intval($id)], "table" => 'articles']);
	if (count($article) > 0)
		$article = $article[0];
	ob_start();
	include ROOT.DS."html".DS."admin".DS."article_modify.php";
	$content_for_layout = ob_get_clean();
	include ROOT.DS."html".DS."layout".DS."admin.php";
}

function	article_add()
{
	if ($_POST) {
		if (!$_POST["name"] || !$_POST["desc"] || !$_POST["prix"] || !$_POST["provenance"]) {
			$_SESSION["error"] = "Veuillez remplir le formulaire en entier";
		} else {
			$res = insert([
				"name"				=>	$_POST["name"],
				"desc"				=>	$_POST["desc"],
				"prix"				=>	intval($_POST["prix"]),
				"provenance"		=>	$_POST["provenance"],
				"dispo"				=>	intval($_POST["count"]),
				"img"				=>	$_POST["img"],
				"categorie"			=>	serialize($_POST["categorie"])
			], "articles");
			if ($res)
				$_SESSION["success"] = "Article ajoute";
			else
				$_SESSION["error"] = "Un probleme est survenu lors de l'ajout de l'article";
		}
	}
	$cat = select([
		"table"	=> "categories"
	]);
	ob_start();
	include ROOT.DS."html".DS."admin".DS."article_add.php";
	$content_for_layout = ob_get_clean();
	include ROOT.DS."html".DS."layout".DS."admin.php";
}