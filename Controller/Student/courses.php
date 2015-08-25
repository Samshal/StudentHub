<?php
	$_O = "../";

	$_OUT = "../../";
	include_once($_O."../__Alloc/__Alloc.php");
	include_once($_O.__MODEL_FOLDER."/index.php");
	include_once($_O.__MISC_FOLDER."/Functions.php");

	$model = new Model();

	if (isset($_GET["COURSE"]))
	{
		$course = $model->Courses($course);
	}
	else
	{
		$course = $model->Courses();
	}
	print_r(json_encode($course));/*
	$course = json_encode($course);
	echo $course;*/
?>