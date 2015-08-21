<?php
	include_once("_login.php");
	SESSION_START();
	$username = $_POST["USERNAME"];
	$password = $_POST["PASSWORD"];
	$usertype = ucfirst(strtolower($_POST["USERTYPE"]));
	$db = new Model();
	$userid = $db->Select("[Auth].[$usertype]", array($usertype), array("UserName"=>"'$username'"))[0][$usertype];
	$db = null;


	$loginObj = new Login($usertype);
	if ($loginObj->LogUser($userid, $username, $password))
	{
		//we have a successful login
		if (isset($_POST["REMEMBER"]))
		{
			//create cookies for storing usertype and userid for 30 days   
			setcookie("USERTYPE", $loginObj->getUserType(), time()+(86400*30), "/");
			setcookie("USERID", $userid, time()+(86400*30), "/");
		}
		$_SESSION["USERTYPE"] = $loginObj->getUserType();
		$_SESSION["USERID"] = $userid;
		echo "1"; //or some other JSON Compatible message for Javascript alert;
	}
	else
	{
		//Invalid login (Work on an exception class to catch the thrown error/exception and append it to an array which would
		//be used here to explain what went wrong to the user);
		echo "0";
	}
	$loginObj = null;
?>