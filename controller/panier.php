<?php

function	valider()
{
	if ($_SESSION["connected"] == false)
	{
		$_SESSION["error"] = "Vous devez etre connecte pour valider votre panier.";
		header("Location: /");
		return(0);
	}
	if (count($_SESSION["cart"]) == 0)
	{
		$_SESSION["error"] = "Votre panier est vide.";
		header("Location: /");
		return(0);
	}
	$cart = serialize($_SESSION["cart"]);
	$res = insert([
		'commande'	=>	$cart,
		'price'		=>	$_SESSION["pricecart"],
		"user_id"	=>	$_SESSION["user"]['id'],
	], "commande");
	$_SESSION["cart"] = NULL;
	if ($res)
		$_SESSION["success"] = "Votre commande a bien ete enregistree.";
	else
		$_SESSION["error"] = "Un erreur est survenu lors de votre commande.";
	header("Location: /");
	return(0);
}