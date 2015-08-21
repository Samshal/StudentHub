<?php
	$_O = "../";

	$_OUT = "../../";
	include_once($_O."../__Alloc/__Alloc.php");
	include_once($_O.__MODEL_FOLDER."/index.php");
	include_once($_O.__MISC_FOLDER."/Functions.php");

	class Login extends Model
	{
		private static $_usertype;

		public function __construct($user)
		{
			parent::__construct();
			self::$_usertype =  strtoupper($user);
		}

		private function getBrowser()
		{
			$user_agent = $_SERVER["HTTP_USER_AGENT"];
			$browser = "UNKNOWN";
			$array = array(
							'/msie/i'=>'Internet Explorer',
							'/firefox/i'=>'Firefox',
							'/safari/i'=>'Safari',
							'/chrome/i'=>'Chrome',
							'/opera/i'=>'Opera',
							'/opr/i'=>'Opera',
							'/netscape/i'=>'Netscape',
							'/maxthon/i'=>'Maxthon',
							'/konqueror/i'=>'Konqueror',
							'/mobile/i'=>'Handheld Browser'
						);
			foreach ($array as $key=>$value)
			{
				if (preg_match($key, $user_agent))
				{
					$browser = $value;
				}
			}
			return $browser;
		}


		private function getDevice()
		{
			$user_agent = $_SERVER["HTTP_USER_AGENT"];
			$device = "UNKNOWN";
			$array = array(
							'/windows nt 6.3/i'=>'Windows 8.1',
							'/windows nt 6.2/i'=>'Windows 8',
							'/windows nt 6.1/i'=>'Windows 7',
							'/windows nt 6.0/i'=>'Windows Vista',
							'/windows nt 5.2/i'=>'Windows Server 2003/ XP x64',
							'/windows nt 5.1/i'=>'Windows XP',
							'/windows nt 5.0/i'=>'Wndows 2000',
							'/windows me/i'=>'Windows ME',
							'/win98/i'=>'Windows 98',
							'/win95/i'=>'Windows 95',
							'/win16/i'=>'Windows 3.11',
							'/macintosh|mac os x/i'=>'Max OS X',
							'/mac_powerpc/i'=>'Mac OS 9',
							'/linux/i'=>'Linux',
							'/ubuntu/i'=>'Ubuntu',
							'/iphone/i'=>'iPhone',
							'/ipod/i'=>'iPod',
							'/ipad/i'=>'iPad',
							'/android/i'=>'Android',
							'/blackberry/i'=>'Blackberry',
							'/webos/i'=>'Mobile'
						);
			foreach ($array as $key=>$value)
			{
				if (preg_match($key, $user_agent))
				{
					$device = $value;
				}
			}
			return $device;
		}

		public function getUserType()
		{
			$query = self::Select('[General].[Relations]', array('RelationsID'), array('RelationDescription'=>"'".self::$_usertype."'"));
			return $query[0]["RelationsID"];
		}

		private function getIP()
		{
			$ip = "UNKNOWN";
			if (getenv("HTTP_CLIENT_IP"))
			{
				$ip = getenv("HTTP_CLIENT_IP");
			}
			else if (getenv("HTTP_X_FORWARDED_FOR")) {
				$ip = getenv("HTTP_X_FORWARDED_FOR");
			}
			else if (getenv("HTTP_X_FORWARDED")) {
				$ip = getenv("HTTP_X_FORWARDED");
			}
			else if (getenv("HTTP_FORWARDED_FOR")) {
				$ip = getenv("HTTP_FORWARDED_FOR");
			}
			else if (getenv("HTTP_FORWARDED")) {
				$ip = getenv("HTTP_FORWARDED");
			}
			else if (getenv("REMOTE_ADDR")) {
				$ip = getenv("REMOTE_ADDR");
			}

			return $ip;
		}
		private function isLoginValid($userid)
		{
			$usertype = self::getUserType();
			$query = self::Select("[Auth].[LoginMeta]", array("isLogin"), array("UserType"=>"$usertype", "UserID"=>"$userid", "isLogin"=>1));
			if (is_array($query))
			{
				if (count($query) > 0)
				{
					if ($query[0]["isLogin"] == 1)
					{
						return false;
					}
					else
					{
						return true;
					}
				}
				else
				{
					return true;
				}
			}
			else{
				return true;
			}
		}

		public function LogUser($userid, $username, $password)
		{
			if (!self::isLoginValid($userid))
			{
				return false;
			}
			$user = ucfirst(strtolower(self::$_usertype));
			$query = "SELECT PassWord FROM [Auth].[$user] WHERE $user = $userid AND UserName = '$username'";
			$result = self::Execute($query);
			if (!is_array($result))
			{
				//return username invalid
				return false;
			}
			else
			{
				//check if password is valid
				$password = hash("sha1", $password);
				/*echo $password;
				echo "<br/>".$result[0]["PassWord"] ;*/
				if ($result[0]["PassWord"] != $password)
				{
					//return password invalid
					return false;
				}
				else
				{
					//log user and record meta details
					$usertype = self::getUserType();
					$logindate = date("Y-m-d h:i:s a"); 
					$islogin = 1;
					$browserdetail = self::getBrowser();
					$devicedetail = self::getDevice();
					$loginip = self::getIP();
					$query = "INSERT INTO [Auth].[LoginMeta] (UserType, UserID, LoginDate, isLogin, BrowserDetail, DeviceDetail, LoginIP) ";
					$query .= "VALUES ($usertype, $userid, '$logindate', $islogin, '$browserdetail', '$devicedetail', '$loginip')";
					$result = self::Execute($query);
					if ($result == 1)
					{
						return true;
					}
					else
					{
						return false;
					}
				}

			}
		}

		public function UnLogUser($userid, $logoutreason)
		{
			$usertype = self::getUserType();
			$logoutdate = date("Y-m-d h:i:s a");
			$metaid = self::Select("[Auth].[LoginMeta]", array("*"), array("UserType"=>$usertype, "UserID"=>$userid, "isLogin"=>1))[0]["MetaID"];
			$query = self::UPDATE("[Auth].[LoginMeta]", array("UserType"=>$usertype, "LogoutDate"=>"'$logoutdate'", "isLogin"=>0, "LogoutReason"=>"'$logoutreason'"), array("MetaID"=>$metaid));
			if ($query)
			{
				return true;
			}
			else
			{
				return $query;
			}
		}
	}
?>