<?php
	$_login = "View/Login/";
	$_OUT = "";
	require_once("Misc/Functions.php");
	if (isset($_COOKIE["USERTYPE"]) && (isset($_COOKIE["USERID"])))
	{
		//we have an already logged in user, verify authenticity
		$_SESSION["USERTYPE"] = $_COOKIE["USERTYPE"];
		$_SESSION["USERID"] = $_COOKIE["USERID"];
		$get = new AppFunction();
		$usertypestring = ucfirst(strtolower($get->getUserType($_COOKIE["USERTYPE"], true)));
		$get = null;
		header("Location: View/".$usertypestring);
	}
	else
	{
		header("Location: $_login");
	}
?> 