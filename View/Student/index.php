<?php
	require_once("../Shared/index.php");
	require_once("../Shared/app.php");
	require_once("_headers/includes.php");
	require_once("_headers/header.php");
	require_once("_headers/app-menu.php");
	require_once("_call.php");
	if (isset($_GET["page"]))
	{
		if (file_exists("page-parts/".$_GET["page"].".php"))
		{
			display($_GET["page"]);
		}
		else
		{
			display("404");
		}
	}
	else
	{
		display("dashboard");
	}
	require_once("_footer/footer.php");
?>