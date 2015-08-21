<?php
	SESSION_START();

	if (!isset($_SESSION["USERTYPE"]) && !isset($_SESSION["USERID"]))
	{
		header("Location: _login/login.php");
	}
	else
	{
		require_once("../".__CONTROLLER_FOLDER."/Student/session.php");
	}
?>