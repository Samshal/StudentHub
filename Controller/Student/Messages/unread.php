<?php
	require_once("Messages.php");

	$user = $_SESSION["USERID"];
	$usertype = $_SESSION["USERTYPE"];


	$messages = new Messages();
	$unread = ($messages->Unread($user, $usertype))?$messages->Unread($user, $usertype):0;
	$_unread = ($unread == 0)?0:$unread;
	echo $_unread;
	$messages = null;
?>