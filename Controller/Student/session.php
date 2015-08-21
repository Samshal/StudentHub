<?php
	$_O = "../";

	$_OUT = "../../";
	include_once($_O."../__Alloc/__Alloc.php");
	include_once($_O.__MODEL_FOLDER."/index.php");
	include_once($_O.__MISC_FOLDER."/Functions.php");

	$model = new Model();

	$_name = $model->Select("[Students].[Info]", array("FirstName", "MiddleName", "LastName"), array("StudentID"=>$_SESSION["USERID"]));
	
	DEFINE("FULLNAME", $_name[0]["FirstName"]." ".$_name[0]["MiddleName"]." ".$_name[0]["LastName"]);
	DEFINE("FIRSTNAME", $_name[0]["FirstName"]);
	DEFINE("LASTNAME", $_name[0]["LastName"]);



	$model = null;
?>