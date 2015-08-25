<?php
	SESSION_START();
	$_O = "../";

	$_OUT = "../../";
	include_once($_O."../__Alloc/__Alloc.php");
	include_once($_O.__MODEL_FOLDER."/index.php");
	include_once($_O.__MISC_FOLDER."/Functions.php");

	$model = new Model();

	$table = strtoupper($_POST["TABLE"]);
	$student = $_SESSION["USERID"];
	$column = $_POST["VALUE"];
	switch($table)
	{
		case "COURSE":
		{
			$result = $model->StudentCourse(array("STUDENT"=>$student, "COURSE"=>$column));
			break;
		}
		case "SEMESTER":
		{
			$result = $model->StudentSemester(array("STUDENT"=>$student, "SEMESTER"=>$column));
			break;
		}
		case "TAGLINE":
		{
			$result = $model->NewProfile(array("PROFILEUSER"=>$student, "PROFILETAGLINE"=>"'$column'"), "Student");
			break;
		}
		default:
		{
			echo 'Undefined Table';
		}
	}
	echo $result;
?>