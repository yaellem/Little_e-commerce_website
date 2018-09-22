<?php
function	index($filter = NULL, $type = NULL)
{
	if ($filter == "tag" && $type != NULL) {
		$articles = [];
		$all = select();
		foreach ($all as $key => $value) {
			$cat = unserialize($value["categorie"]);
			if (in_array($type, $cat)) {
				$articles[] = $value;
			}
		}
	} else if ($filter == "provenance" && $type != NULL) {
		$articles = select(["cond" => ["provenance" => $type]]);
	} else {
		$articles = select();
	}
	ob_start();
	require ROOT . DS . "html" . DS . "articles" . DS . "index.php";
	$content_for_layout = ob_get_clean();
	require ROOT . DS . "html" . DS . "layout" . DS . "default.php";
}

function	calcule_cart()
{
	$_SESSION["pricecart"] = 0;
	foreach ($_SESSION["cart"] as $key => $value) {
		$_SESSION["pricecart"] += $value["price"] * $value["count"];
	}
}

function	delete_all($id)
{
	if (!isset($_SESSION["cart"]))
		$_SESSION["cart"] = [];
	$cart = $_SESSION["cart"];
	foreach ($cart as $key => $value) {
		if ($value["id_article"] == $id && $value["count"] > 0)
		{
			unset($cart[$key]);
			$_SESSION["success"] = "Article supprime";
		}
	}
	if (count($_SESSION["cart"]) > 0) {
		$_SESSION["cart"] = $cart;
	}else{
		unset($_SESSION["cart"]);
	}
	header("Location: /");
	return(0);
}

function	remove($id)
{
	$success = false;
	if (!isset($_SESSION["cart"]))
		$_SESSION["cart"] = [];
	$cart = $_SESSION["cart"];
	foreach ($cart as $key => $value) {
		if ($value["id_article"] == $id && $value["count"] > 0)
		{
			$success = true;
			$cart[$key]["count"]--;
			if ($cart[$key]["count"] === 0) {
				unset($cart[$key]);
			}
			calcule_cart();
			$_SESSION["success"] = "Article enleve";
		}
	}
	if (!$success)
		$_SESSION["error"] = "Impossible d'enlever cet article.";
	if (count($_SESSION["cart"]) > 0) {
		$_SESSION["cart"] = $cart;
	}else{
		unset($_SESSION["cart"]);
	}
	header("Location: /");
}

function	add($id = NULL, $filter = NULL, $type = NULL)
{
	if ($id === NULL) {
		header("Location: /");
	}
	$article = selectfirst(["cond"	=> ["id" => intval($id)]]);
	if ($article === NULL)
	{
		$_SESSION["error"] = "ID inconnu";
		header("Location: /");
		return (0);
	}
	if (!isset($_SESSION["cart"]))
		$_SESSION["cart"] = [];
	$cart = $_SESSION["cart"];
	foreach ($cart as $key => $value) {
		if ($value["id_article"] == $id)
		{
			$cart[$key]["count"]++;
			$_SESSION["success"] = "Article ajoute";
			$_SESSION["cart"] = $cart;
			calcule_cart();
			header("Location: /articles/index/".$filter."/".$type);
			return(0);
		}
	}
	$cart[] = [
		"id_article"	=> $article["id"],
		"name"			=> $article["name"],
		"price"			=> $article["prix"],
		"count"			=> 1
	];
	$_SESSION["cart"] = $cart;
	calcule_cart();
	$_SESSION["success"] = "Article ajoute";
	header("Location: /articles/index/".$filter."/".$type);
	return(0);
}