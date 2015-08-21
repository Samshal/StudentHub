<?php
	$_OUT = "../";
	require_once("..\__Alloc\__Alloc.php");
	require_once(__MISC_FOLDER."\Functions.php");
	require_once(__DATABASE_DEPENDENCY."\QueryManager.php");
	$databasename = "StudentHub";
	if (!$file->Exists(__TEMPFILES_FOLDER."\Relationships.sql"))
	{
		die("The Setup Files Have Been Compromised");
	}
	$relationship = $file->Replace(
										file_get_contents(__TEMPFILES_FOLDER."\Relationships.sql"),
										"[DATABASE_PLACEHOLDER]", $databasename, false
								   );
	$relationships = explode("GO", $relationship);
	foreach ($relationships as $query)
	{
		$result = $connection->Execute($query);
		if ($result != 1)
		{
			die($result);
		}
	}
	echo "Database Setup Complete";
?>