<?php
	abstract class FileManager
	{
		function __construct()
		{
					
		}

		public static function FileReader($file)
		{
			if(!file_exists($file))
			{
				//throw an exception
			}
			else
			{
				$content = file_get_contents($file);
				return $content;
			}	
		}

		public function Replace($text, $toreplace, $replacement, $sensitive)
		{
			if ($sensitive)
			{
				$ctext = strtolower($toreplace);
			}
			else
			{
				$ctext = $toreplace;
			}
			$brokentext = explode($ctext, $text);
			$replaced = "";
			$counter = 0;
			foreach ($brokentext as $piece)
			{
				if ($counter != count($brokentext) - 1)
				{
					$replaced .= $piece.$replacement;
					$counter += 1;
				}
				else
				{
					if (strstr($brokentext[count($brokentext) - 1], $replacement))
					{
						$replaced .= $piece.$replacement;
					}
					else
					{
						$replaced .= $piece;
					}
				}
			}
			return $replaced;
		}

		public function Exists($file)
		{
			if (is_array($file))
			{
				foreach ($file as $f)
				if (file_exists($f))
				{
					continue;
				}
				else
				{
					return false;
				}
			}
			else
			{
				if (file_exists($file))
				{
					return true;
				}
				else
				{
					return false;
				}
			}
			return true;
		}
	}
?>