<?php
	$_O = "../";

	$_OUT = "../../";
	include_once($_O."../__Alloc/__Alloc.php");
	include_once($_O.__MODEL_FOLDER."/index.php");
	include_once($_O.__MISC_FOLDER."/Functions.php");

	$model = new Model();

	if (isset($_GET["SEMESTER"]))
	{
		$semester = $model->Semesters($semester);
	}
	else
	{
		$semester = $model->Semesters();
	}
	print_r(json_encode($semester));/*
	$semester = json_encode($semester);
	echo $semester;*/
?>