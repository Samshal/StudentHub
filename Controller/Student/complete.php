<?php
	$_O = "../";

	$_OUT = "../../";
	include_once($_O."../__Alloc/__Alloc.php");
	include_once($_O.__MODEL_FOLDER."/index.php");

	$model = new Model();

	$complete = $model->isProfileComplete($_SESSION["USERTYPE"], $_SESSION["USERID"]);

	$model = null;
?>
