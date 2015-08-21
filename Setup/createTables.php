<?php
	$_OUT = "../";
	require_once("..\__Alloc\__Alloc.php");
	require_once(__MISC_FOLDER."\Functions.php");
	require_once(__DATABASE_DEPENDENCY."\QueryManager.php");
	$databasename = "StudentHub";
	if (!$file->Exists(array(
						__TEMPFILES_FOLDER."\CreateSchema.sql",
						__TEMPFILES_FOLDER."\Students.sql",
						__TEMPFILES_FOLDER."\Faculties.sql",
						__TEMPFILES_FOLDER."\Administrator.sql",
						__TEMPFILES_FOLDER."\General.sql",
						__TEMPFILES_FOLDER."\Shared.sql",
						__TEMPFILES_FOLDER."\Auth.sql"
						  )
					 )
				)
	{
		die("The Setup Files Have Been Compromised");
	}
	$schemas = $file->Replace(
								file_get_contents(__TEMPFILES_FOLDER."\CreateSchema.sql"),
								"[DATABASE_PLACEHOLDER]", $databasename, false
							  );
	$students = $file->Replace(
								file_get_contents(__TEMPFILES_FOLDER."\Students.sql"),
								"[DATABASE_PLACEHOLDER]", $databasename, false
							  );
	$faculties = $file->Replace(
								file_get_contents(__TEMPFILES_FOLDER."\Faculties.sql"),
								"[DATABASE_PLACEHOLDER]", $databasename, false
							  );
	$administrator = $file->Replace(
									file_get_contents(__TEMPFILES_FOLDER."\Administrator.sql"),
									"[DATABASE_PLACEHOLDER]", $databasename, false
								  );
	$general = $file->Replace(
							file_get_contents(__TEMPFILES_FOLDER."\General.sql"),
							"[DATABASE_PLACEHOLDER]", $databasename, false
						  );
	$shared = $file->Replace(
							file_get_contents(__TEMPFILES_FOLDER."\Shared.sql"),
							"[DATABASE_PLACEHOLDER]", $databasename, false
						  );
	$auth = $file->Replace(
							file_get_contents(__TEMPFILES_FOLDER."\Auth.sql"),
							"[DATABASE_PLACEHOLDER]", $databasename, false
						  );
	$tables = array($schemas, $students, $faculties, $administrator, $general, $shared, $auth);

	foreach ($tables as $table)
	{
		$_table = explode("GO", $table);
		foreach ($_table as $_query)
		{
			$query = $connection->Execute($_query);
			if ($query != 1)
			{
				echo($query);
			}
		}
	}
	echo "Done, Tables Created Successfully";
	header("Location: createRelationships.php");
?>