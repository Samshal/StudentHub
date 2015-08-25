<?php
	SESSION_START();

	if (!isset($_SESSION["USERTYPE"]) && !isset($_SESSION["USERID"]))
	{
		header("Location: _login/login.php");
	}
	else
	{
		include_once("../".__CONTROLLER_FOLDER."/Student/complete.php");
		if (!$complete)
		{
			header("Location: complete.php");
		}
		else
		{
			unset($complete);
			require_once("../".__CONTROLLER_FOLDER."/Student/session.php");
		}
	}
?>