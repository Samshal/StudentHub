<?php
	require_once("FileManager.php");
	require_once("Json.php");
	require_once("Misc.php");
	class File extends FileManager{ }
	class Encoder extends Json{ }
	class AppFunction extends Misc{ }
	if ($_SERVER["SCRIPT_NAME"] != "/MyPhp/StudentHub/Setup/index.php" && $_SERVER["SCRIPT_NAME"] != "/MyPhp/StudentHub/setup/index.php")
	{
		$connection = new Query();		
	}
	$file = new File();
?>