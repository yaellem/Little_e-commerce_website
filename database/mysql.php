<?php
function database_connect($host, $user, $pass, $db)
{
	if (($mysqli = mysqli_connect($host, $user, $pass, $db)))
		return $mysqli;
	else
		return NULL;
}

/*
UPDATE `users` SET `id`=[value-1],`droit`=[value-2],`login`=[value-3],`passwd`=[value-4],`last_log`=[value-5],`inscription`=[value-6] WHERE 1
*/

function	update($col, $where, $table = NULL)
{
	global $controller;
	global $action;
	global $dblink;

	$str = "";
	if ($table == NULL)
		$str = "UPDATE `" . $controller . "` SET ";
	else
		$str = "UPDATE `" . $table . "` SET";
	$type = "";
	foreach ($col as $key => $value) {
		$str .= "`$key`=?";
		if (is_string($value))
			$type .= "s";
		if (is_numeric($value))
			$type .= "i";
		if (next($col)==true) $str .= ", ";
	}
	$str .= " WHERE ";
	foreach ($where as $key => $value) {
		$str .= "`$key`=?";
		if (is_string($value))
			$type .= "s";
		if (is_numeric($value))
			$type .= "i";
		if (next($where)==true) $str .= " AND ";
	}
	$str .= ";";
	if (($req = mysqli_prepare($dblink, $str)) === false)
		exit("Fail to exec req database $str");
	$new = $col + $where;
	mysqli_stmt_bind_param($req, $type, ...array_values($new));
	$ret = mysqli_stmt_execute($req);
	mysqli_stmt_close($req);
	return ($ret);
}

/*
INSERT INTO `articles` (`id`, `name`, `desc`, `prix`, `matiere`, `provenance`, `dispo`, `img`, `categorie`) VALUES (NULL, 'jeremy', 'tabouret de 42', '1', 'jeremy', 'chine', '1', '', 'mobilier humain');
*/

function insert($arr, $table = NULL)
{
	global $controller;
	global $action;
	global $dblink;

	$str = "";
	if ($table == NULL)
		$str = "INSERT INTO `" . $controller . "` (";
	else
		$str = "INSERT INTO `" . $table . "` (";
	$cpy = $arr;
	foreach ($arr as $key => $value) {
		$arr[$key] = "`".$key."` ";
	}
	$str .= implode(',', $arr) . ") VALUES (";
	for ($i=0; $i < count($arr) - 1; $i++) { 
		$str .= "?, ";
	}
	$str .= "?);";
	if (($req = mysqli_prepare($dblink, $str)) === false)
		exit("Fail to exec req database $str");
	$type = "";
	foreach ($cpy as $key => $value) {
		if (is_string($value))
			$type .= "s";
		if (is_numeric($value))
			$type .= "i";
	}
	mysqli_stmt_bind_param($req, $type, ...array_values($cpy));
	$ret = mysqli_stmt_execute($req);
	mysqli_stmt_close($req);
	return ($ret);
}

function	delete($arr, $table = NULL){
	global $controller;
	global $action;
	global $dblink;

	$str = "";
	if ($table == NULL)
		$str = "DELETE FROM `" . $controller . "` WHERE ";
	else
		$str = "DELETE FROM `" . $table . "` WHERE ";
	foreach ($arr as $key => $value) {
		$str .= $key."=?";
		if (next($arr)==true) $str .= " AND ";
	}
	$type = "";
	foreach ($arr as $key => $value) {
		if (is_string($value))
			$type .= "s";
		if (is_numeric($value))
			$type .= "i";
	}
	$str .= ";";
	if (($req = mysqli_prepare($dblink, $str)) === false)
		exit("Fail to exec req database $str");
	mysqli_stmt_bind_param($req, $type, ...array_values($arr));
	$ret =mysqli_stmt_execute($req);
	mysqli_stmt_close($req);
	return ($ret);
}

function	selectfirst($arr = NULL)
{
	return (select($arr)[0]);
}

function select($arr = NULL)
{
	global $controller;
	global $action;
	global $dblink;

	$str = "SELECT ";
	if (isset($arr["champs"])) {
		if (is_array($arr["champs"])) {
			$str .= implode(',', $arr["champs"]);
		} else {
			$str .= $arr["champs"];
		}		
	} else{
		$str .= "*";
	}
	if (isset($arr["table"]))
		$str .= ' FROM ' . $arr["table"];
	else
		$str .= ' FROM ' . $controller;
	if (isset($arr["cond"])) {
		$str .= " WHERE ";
		$cond = $arr["cond"];
		foreach ($cond as $key => $value) {
			$str .= "$key=?";
			if (next($cond)==true) $str .= " AND ";
		}
	}
	$str .= ";";
	if (($req = mysqli_prepare($dblink, $str)) === false)
		exit("Fail to exec req database $str");
	if (isset($arr["cond"])) {
		$str .= " WHERE ";
		$type = "";
		foreach ($arr["cond"] as $key => $value) {
			if (is_string($value)) {
				$type .= "s";
			}
			if (is_numeric($value)) {
				$type .= "i";
			}
		}
		mysqli_stmt_bind_param($req, $type, ...array_values($arr["cond"]));
	}
	$ret = [];
	if (mysqli_stmt_execute($req) == true)
	{
		$res = mysqli_stmt_get_result($req);
		while (($row = mysqli_fetch_assoc($res))) {
			$ret[] = $row;
		}
	}
	mysqli_stmt_close($req);
	return ($ret);
}