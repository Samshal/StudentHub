<?php
	SESSION_START();
	$_O = "../../";

	$_OUT = "../../../";
	include_once($_O."../__Alloc/__Alloc.php");
	include_once($_O.__MODEL_FOLDER."/index.php");
	include_once($_O.__MISC_FOLDER."/Functions.php");

	$model = new Model();

	class Messages extends Model
	{
		private function Query($user, $usertype)
		{
			$query = "SELECT m.MessageFromType as MFT, m.MessageFROM as MF, m.MessageToArray as MTA, c.Seen as Seen FROM [Shared].[Message] m ";
			$query .="JOIN [Shared].[MessageContent] c ON m.MessageID = c.Message WHERE m.MessageToType=$usertype";
			$result = self::Execute($query);
			if (is_array($result))
			{
				return $result;
			}
			else
			{
				return false;
			}
		}

		private function Extract($user, $usertype)
		{
			if (self::Query($user, $usertype))
			{
				$query = self::Query($user, $usertype);
			}
			else
			{
				$query = array();
			}
			if (count($query) > 0)
			{
				foreach ($query as $value) {
					$sentto = $value["MTA"];
					$sentto = substr($sentto, 1, -1);
					$explodes = explode(",", $sentto);
					if (in_array($user, $explodes))
					{
						$result[] = array("MFT"=>$value["MFT"], "MF"=>$value["MF"], "Seen"=>$value["Seen"]);
					}
					else
					{
						$result = array();
					}
				}
				return $result;
			}
			else
			{
				return false;
			}
		}

		public function Unread($user, $usertype)
		{
			$counter = 0;
			if (self::Extract($user, $usertype))
			{
				$query = self::Extract($user, $usertype);
			}
			else
			{
				$query = array();
			}
			if (count($query) < 1)
			{
				return 0;
			}
			else
			{
				foreach ($query as $value) {
					if ($value["Seen"] == 0)
					{
						$counter += 1;
					}
				}
				return $counter;
			}
		}
	}
	
?>