<?php
	$_O = "../";

	$_OUT = "../../";
	include_once($_O."../__Alloc/__Alloc.php");
	include_once($_O.__MODEL_FOLDER."/index.php");
	include_once($_O.__MISC_FOLDER."/Functions.php");

	$model = new Model();

	$_name = $model->Select("[Students].[Info]", array("*"), array("StudentID"=>$_SESSION["USERID"]));
	$_profile = $model->Select("[Students].[Profile]", array("*"), array("Student"=>$_SESSION["USERID"]));
	$courseid = $model->Select("[Students].[Course]", array("Course"), array("Student"=>$_SESSION["USERID"]))[0]["Course"];
	$semesterid = $model->Select("[Students].[Semester]", array("Semester"), array("Student"=>$_SESSION["USERID"]))[0]["Semester"];
	$_semester = $model->Select("[General].[Semester]", array("*"), array("SemesterID"=>$semesterid));
	$_course = $model->Select("[General].[Course]", array("*"), array("CourseID"=>$courseid));
	
	DEFINE("FULLNAME", $_name[0]["FirstName"]." ".$_name[0]["MiddleName"]." ".$_name[0]["LastName"]);
	DEFINE("FIRSTNAME", $_name[0]["FirstName"]);
	DEFINE("LASTNAME", $_name[0]["LastName"]);
	DEFINE("MIDDLENAME", $_name[0]["MiddleName"]);
	if (isset($_profile[0]["Picture"]))
	{
		DEFINE("IMAGESRC", $_profile[0]["Picture"]);
	}
	if (isset($_profile[0]["TagLine"]))
	{ 
		DEFINE("TAGLINE", $_profile[0]["TagLine"]);
	}
	if (isset($_course[0]["CourseName"]))
	{
		DEFINE("COURSENAME", $_course[0]["CourseName"]);
		DEFINE("COURSEDURATION", $_course[0]["CourseDuration"]);
	}
	if (isset($_semester[0]["SemesterName"]))
	{
		DEFINE("SEMESTERNAME", $_semester[0]["SemesterName"]);
	}

	$model = null;
?>
