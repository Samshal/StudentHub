<?php
	require_once($_OUT."__Alloc/__Alloc.php");
	require_once($_OUT."__Database/QueryManager.php");
	abstract class Misc extends Query
	{
		public function getUserType($id, $type)
		{
			if ($type)
			{
				$query = "SELECT RelationDescription FROM [General].[Relations] WHERE RelationsID = $id";
				$result = self::Execute($query);
				return $result[0]["RelationDescription"];
			}
			else
			{
				$query = "SELECT RelationsID FROM [General].[Relations] WHERE RelationDescription = '$id'";
				$result = self::Execute($query);
				return $result[0]["RelationsID"];
			}
		}
	}
?>