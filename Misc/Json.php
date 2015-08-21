<?php
	abstract class Json
	{
		private static $returned;
		public function __construct($param, $data)
		{
			if (is_string($param))
			{
				$param = strtolower($param);
			}
			switch ($param)
			{
				case 1: case "encode":
				{
					self::$returned = self::encode($data);
					break;
				}
				case 0: case "decode":
				{
					self::$returned = self::decode($data);
					break;
				}
				default:
				{
					//throw an exception
				}
			}
		}

		private function encode($param)
		{
			if (is_array($param))
			{
				return json_encode($param);
			}
			else
			{
				return $param;
			}
		}

		private function decode($param)
		{
			return json_decode($param);
		}

		public static function json()
		{
			return self::$returned;
		}
	}
?>