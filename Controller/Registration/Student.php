<?php
	SESSION_START();
	$_O = "../";

	$_OUT = "../../";
	include_once($_O."../__Alloc/__Alloc.php");
	include_once($_O.__MODEL_FOLDER."/index.php");
	include_once($_O.__MISC_FOLDER."/Functions.php");

	$firstname = $_POST["FIRSTNAME"];
	$lastname = $_POST["LASTNAME"];
	$middlename = $_POST["MIDDLENAME"];
	$phone = $_POST["PHONENUMBER"];
	$email = $_POST["EMAIL"];
	$homeaddress = $_POST["HOMEADDRESS"];
	$dateofbirth = $_POST["DATEOFBIRTH"];
	$country = $_POST["COUNTRY"];
	$state = $_POST["STATE"];
	$gender = $_POST["GENDER"];

	$_SESSION["user"] = $email;

	$params = array("FIRSTNAME"=>$firstname, "LASTNAME"=>$lastname, "MIDDLENAME"=>$middlename,
					 "PHONENUMBER"=>$phone, "EMAIL"=>$email, "HOMEADDRESS"=> $homeaddress,
					 "DATEOFBIRTH"=>$dateofbirth, "COUNTRY"=>$country, "STATE"=>$state,
				 	 "GENDER"=>$gender);
	//print_r($params);
	$reg = new Model();
	$result = $reg->RegisterStudent($params);
	echo $result;

	$reg = null;
?>