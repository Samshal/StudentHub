<?php
	SESSION_START();
	//require_once('../lib/Configs/php/QueryManager.php');
	$_O = "../";

	$_OUT = "../../";
	include_once($_O."../__Alloc/__Alloc.php");
	include_once($_O.__MODEL_FOLDER."/index.php");
	include_once($_O.__MISC_FOLDER."/Functions.php");

	$model = new Model();
	$name = $_SESSION["USERID"];
	$source = $_FILES["image"]["tmp_name"];
	$e = explode("/", $_FILES["image"]["type"]);
	if (isset($e[1]))
	{
		$ext = $e[1];
	}
	else
	{
		$ext = $e;
	}
	$target = "../../__TempFiles/__Uploads/Students/". $name.".".$ext;
	if(!move_uploaded_file($source, $target))
	{
		echo ("Your Picture Was Not Saved. Please Try Again");
	}
	else
	{
		$db = $name.".".$ext;
		$result = $model->NewProfile(array("PROFILEUSER"=>$_SESSION["USERID"], "PROFILEPICTURE"=>"'$db'"), "Student");
	}
?>