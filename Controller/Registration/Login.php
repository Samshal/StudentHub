<?php
	SESSION_START();
	$_O = "../";

	$_OUT = "../../";
	include_once($_O."../__Alloc/__Alloc.php");
	include_once($_O.__MODEL_FOLDER."/index.php");
	include_once($_O.__MISC_FOLDER."/Functions.php");

	//print_r($_SESSION);
	$email = $_SESSION["user"];
	$model = New Model();
	$query = $model->Select("[Students].[Info]", array("StudentID"), array("Email"=>"'$email'"));
	//echo $query;
	$userid = $query[0]["StudentID"];

//print_r($_POST);
	$username = $_POST["USERNAME"];
	$password = $_POST["PASSWORD"];

	$params = array("USERID"=>$userid, "USERNAME"=>$username, "PASSWORD"=>$password);

	$login = $model->NewLogin($params, "Student");

	if ($login)
	{
		echo 1;
		unset($_SESSION['user']);
	}
	else
	{
		echo 0;
		$query = $model->Delete("[Students].[Info]", array("Email"=>$_SESSION["user"]));
		unset($_SESSION['user']);
	}
	$email = null;
	$model = null;
?>