<?php
define("_PAGE", "page-parts\\");
function display($param)
{
	$param = strtolower($param);
	switch ($param)
	{
		case "navbar":
		{
			include(_PAGE."navbar.php");
			break;
		}

		case "jumbotron":
		{
			include(_PAGE."jumbotron.php");
			break;
		}

		case "tips":
		{
			include(_PAGE."tips.php");
			break;
		}

		case "foot":
		{
			include(_PAGE."foot.php");
			break;
		}
	}
}