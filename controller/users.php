<?php
function	pwdhash($pass)
{
	$salt = "chaine random de char";
	return hash("whirlpool", $pass . $salt);
}

function	autodel()
{
	if ($_SESSION["user"] == NULL) {
		header("Location: /");
		return(0);
	}
	if ($_SESSION["user"]["id"] === 1) {
		$_SESSION["error"] = "On touche pas a root.";
		header("Location: /");
		return(0);
	}
	$res = delete([
		"id"	=>	$_SESSION["user"]["id"]
	]);
	if ($res) {
		$_SESSION["success"] = "Compte supprime.";
		deconnection();
	} else {
		$_SESSION["error"] = "Une erreur sauvage est apparue.";
	}
	header("Location: /");
	return(0);
}

function	moncompte()
{
	if ($_SESSION["user"] == NULL) {
		header("Location: /");
		return(0);
	}
	$info = selectfirst([
		'cond'	=> ["id" => $_SESSION["user"]["id"]]
	]);
	if ($_POST) {
		if ($_POST["oldpass"] && $_POST["newpass"] && $_POST["renewpass"] && $_POST["newpass"] == $_POST["renewpass"]) {
			if ($info["passwd"] == pwdhash($_POST["oldpass"])){
				$_SESSION["success"] = "Mot de passe change.";
				update([
					"passwd"	=>	pwdhash($_POST["newpass"])	
				],[
					"id"		=>	$info["id"]
				]);
			}else{
				$_SESSION["error"] = "Mot de pass non concordant.";
			}
		}else{
			$_SESSION["error"] = "Formulaire non valide.";
		}
	}
	ob_start();
	require ROOT . DS . "html" . DS . "users" . DS . "moncompte.php";
	$content_for_layout = ob_get_clean();
	require ROOT . DS . "html" . DS . "layout" . DS . "default.php";
}

function	mescommandes()
{
	if ($_SESSION["user"] == NULL) {
		header("Location: /");
		return(0);
	}
	$commandes = select([
		"table" => "commande",
		'cond'	=> ["user_id" => $_SESSION["user"]["id"]]
	]);
	ob_start();
	require ROOT . DS . "html" . DS . "users" . DS . "mescommandes.php";
	$content_for_layout = ob_get_clean();
	require ROOT . DS . "html" . DS . "layout" . DS . "default.php";
}

function create()
{
	global $dblink;

	if ($_SESSION["connected"] === true) {
		header("Location: /");
		return(0);
	}
	if ($_POST)
	{
		if ($_POST["login"] && $_POST["passwd"]) {
			$users = select(["cond" => ["login" => $_POST["login"]]]);
			if (count($users) > 0)
				$_SESSION['sameuser'] = TRUE;
			else
			{
				$res = insert([
					"droit"		=> "user",
					"login"		=> $_POST["login"],
					"passwd"	=> pwdhash($_POST["passwd"]),
				]);
				if (!$res) {
					$_SESSION["error"] = "La database te renie";
					header("Location: /");
					return(0);
				}
				$_SESSION['connected'] = TRUE;
				$_SESSION['login'] = $_POST["login"];
				$_SESSION['droit'] = $users["droit"];
				$user = selectfirst([
					"cond"	=> ["login"	=> $_POST['login']]
				]);
				$user["passwd"] = NULL;
				$_SESSION['user'] = $user;
				$_SESSION["success"] = "Compte cree";
				header("Location: /articles");		
			}
		}
		$_SESSION["error"] = "Le formulaire n'est pas valide correctement.";
	}
	ob_start();
	require ROOT . DS . "html" . DS . "users" . DS . "create.php";
	$content_for_layout = ob_get_clean();
	require ROOT . DS . "html" . DS . "layout" . DS . "default.php";
}

function connection()
{
	if ($_SESSION["connected"] === true) {
		header("Location: /");
		return(0);
	}
	if ($_POST)
	{
		if ($_POST["login"] && $_POST["passwd"]) {
			$users = select(["cond" => ["login" => $_POST["login"]]]);
			if (count($users) == 1)
			{
				$users = $users[0];
				$nwpass = pwdhash($_POST["passwd"]);
				if ($users["passwd"] == $nwpass)
				{
					$users["passwd"] = NULL;
					$_SESSION['login'] = $_POST["login"];
					$_SESSION['connected'] = TRUE;
					$_SESSION['droit'] = $users["droit"];
					$_SESSION['user'] = $users;
					$_SESSION["success"] = "Compte creer";
					header("Location: /");
				}
				else
					$_SESSION["error"] = "Mauvais mot de passe.";
			}
			else
			{
				if (count($users) == 0)
					$_SESSION["error"] = "Utilisateur inexistant";
				else
					$_SESSION["error"] = "Mauvais login.";
			}
		}
	}
	ob_start();
	require ROOT . DS . "html" . DS . "users" . DS . "connection.php";
	$content_for_layout = ob_get_clean();
	require ROOT . DS . "html" . DS . "layout" . DS . "default.php";
}

function deconnection()
{
	if ($_SESSION["connected"] === false) {
		header("Location: /");
		return(0);
	}
	$_SESSION['connected'] = false;
	$_SESSION['login'] = NULL;
	$_SESSION['droit'] = NULL;
	$_SESSION['user'] = NULL;
	$_SESSION['sameuser'] = false;
	header("Location: /articles");
	ob_start();
	require ROOT . DS . "html" . DS . "users" . DS . "connection.php";
	$content_for_layout = ob_get_clean();
	require ROOT . DS . "html" . DS . "layout" . DS . "default.php";
}
?>