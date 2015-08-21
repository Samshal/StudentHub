<?php
	$_OUT = "../";
	require_once("..\__Alloc\__Alloc.php");
	require_once(__MISC_FOLDER."\Functions.php");
	$databasename = "StudentHub";
	$driver = "SQL Server";
	$username = "sa";
	$password = "samshal";
	$server = "SAMSHAL\PHPINSTANCE";
	mkdir("c:\\".$databasename);
	try
	{
		$tempconn = new PDO("odbc:Driver={$driver};Server=$server;", $username, $password);
		$query = $file->Replace(
										file_get_contents(__TEMPFILES_FOLDER."\CreateDatabase.sql"),
										"[DATABASE_PLACEHOLDER]", $databasename, false
									);
		$queries = explode("GO", $query);
		foreach ($queries as $query) {
			$query_to_execute = $tempconn->query($query);
			if (!$query_to_execute)
			{
				$errorMsg = $tempconn->errorInfo();
				die ('An Error occured: '.$errorMsg[2]);
			}
			else
			{
				continue;
			}
		}
		$tempconn = null;
		header("Location: createTables.php");
	}
	catch (PDOException $e)
	{
		//return array('Error: '.$e->getMessage());
		echo 'Error: '.$e->getMessage();
		exit();
	}			
?>