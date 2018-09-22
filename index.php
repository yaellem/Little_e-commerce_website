<?php
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', $_SERVER["DOCUMENT_ROOT"]);
$arr = split('/', strtolower(trim($_SERVER['REQUEST_URI'], '/')));
session_start();
include_once ROOT . DS . "database" . DS . "mysql.php";
include_once ROOT . DS . "render.php";
include_once ROOT . DS . "error.php";

if ($arr[0] == "") {
	$controller = "articles";
	$action = "index";
	$vars = [];
}else{
	$controller = array_shift($arr);
	if (count($arr) > 0)
		$action = array_shift($arr);
	else
		$action = "index";
	$vars = $arr;
}
if (($dblink = database_connect("127.0.0.1", "test", "test", "rush00")) == NULL)
	database_error();

$category_content = select(["table" => "categories"]);
if (!is_array($category_content)) {
	$category_content = [];
}

if (file_exists(ROOT . DS . "controller" . DS . $controller . ".php")) {
	include_once ROOT . DS . "controller" . DS . $controller . ".php";
	if (function_exists('def_func')) {
		def_func();
	}
	if (function_exists($action))
	{
		if (count($vars) == 0)
			$action();
		else
			call_user_func_array($action, $vars);
	}
} else {
	echo "fichier non trouve";
	exit();	
}
mysqli_close($dblink);
