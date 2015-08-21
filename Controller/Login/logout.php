<?php
	SESSION_START();
	include_once("_login.php");

	$userid = $_SESSION["USERID"];
	$reason = $_GET["LOGOUTREASON"];
	$usertype = $_GET["USERTYPE"];
	$usertype = ucfirst(strtolower($usertype));


	$loginObj = new Login($usertype);
	if ($loginObj->UnLogUser($userid, $reason))
	{
		//we have a successful login
		echo "Logout Successful"; //or some other JSON Compatible message for Javascript alert;
		if (isset($_COOKIE["USERTYPE"]) || isset($_COOKIE["USERID"]))
		{
			setcookie("USERTYPE", "", 1, "/");
			setcookie("USERID", "", 1, "/");
		}
		unset($_SESSION["USERID"]);
		unset($_SESSION["USERTYPE"]);
		header("Location: ../../index.php");
	}
	else
	{
		//Invalid login (Work on an exception class to catch the thrown error/exception and append it to an array which would
		//be used here to explain what went wrong to the user);
		echo "An Error Occurred. Please Try Again";
	}
	$loginObj = null;
?>