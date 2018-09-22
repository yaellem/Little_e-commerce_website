<?php
function	render_error()
{
	if ($_SESSION && $_SESSION["error"])
	{
		echo "<p class='bold text-center error'>".$_SESSION["error"]."</p>";
		$_SESSION["error"] = NULL;
	}
}

function	render_success()
{
	if ($_SESSION && $_SESSION["success"])
	{
		echo "<p class='bold text-center success'>".$_SESSION["success"]."</p>";
		$_SESSION["success"] = NULL;
	}
}