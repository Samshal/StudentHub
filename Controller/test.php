<?php
	$_O = "";

	$_OUT = "../";
	include_once($_O."../__Alloc/__Alloc.php");
	include_once($_O.__MODEL_FOLDER."/index.php");
	include_once($_O.__MISC_FOLDER."/Functions.php");

	$model = new Model();

	$params = array("FROMTYPE"=>"1", "TOTYPE"=>"1", "FROM"=>"1", "TO"=>"{1, 2, 3}", "CONTENT"=>"Welcome To StudentHub");
	print_r($model->NewMessage($params));

	$model = null;
?>