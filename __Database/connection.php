<?php
/****
*****@Author: Samuel Adeshina
*****@Date:	   2/27/2015, 1:37PM
*****@Description: This File Contains a
					Base Class For Establishing
					A connection with a database.
					In this Case, an MS SQL Server Database.
*****@Keywords: PDO, Databases, PHP
*****@Contact: samueladeshina73@gmail.com
****/

class Connection
{
		public $_database;
		public $_user;
		public $_password;
		public $server;
		public $driver;
		public $params;
		public $host;
	function __construct()
	{
		$config = parse_ini_file('connection.ini');
		$this->_database = $config["database"];
		$this->_user = $config['username'];
		$this->_password = $config['password'];
		$this->server = $config['servername'];
		$this->driver = $config['driver'];
		$this->params = array('Database' => $this->_database,
							  'UserName' => $this->_user,
							  'Password' => $this->_password,
							  'ServerName' => $this->server,
							  'Host' => $this->host);
		if ($this->driver == '' || !(is_array($this->params)))
		{
			//throw an error [unexpected parameters supplied or no parameter supplied at all]
			//In the meantime, this program outputs the above message but a valid error handler has
			//to be in place to catch this exception
			//return 'Unexpected parameters supplied or no parameter supplied at all';
			echo 'Unexpected parameters supplied or no parameter supplied at all';
		}
		else
		{
			switch ($this->driver)
			{
				case 'SQL Server':
				{
					self::SQLServer($this->params);
					break;
				}
				case 'MySQL':
				{
					self::MySQL($this->params);
					break;
				}
				case 'PgreSQL':
				{
					self::PgreSQL($this->params);
					break;
				}
				case 'SQLite':
				{
					self::SQLite($this->params);
					break;
				}
				default:
				{
					//Throw an error ['Database Driver Specified is not recognized, please suggest this driver to the author']
					//In the meantime, this program outputs the above message but a valid error handler has
					//to be in place to catch this exception
					//return 'Database Driver Specified is not recognized, please suggest this driver to the author';
					echo 'Database Driver Specified is not recognized, please suggest this driver to the author';
				}
			}
		}
	}
	public static function SQLServer($params)
	{
		$database = $params['Database'];
		$user = $params['UserName'];
		$pwd = $params['Password'];
		$driver = 'SQL Server';
		$server = $params['ServerName'];
		try
		{
			$connection = new PDO("odbc:Driver={$driver};Server=$server;Database=$database", $user, $pwd);
			return $connection;
		}
		catch (PDOException $e)
		{
			//return array('Error: '.$e->getMessage());
			echo 'Error: '.$e->getMessage();
			exit();
		}			
		finally
		{
			//Do something here. Save this connection meta details such
			//as time, date, and so on in a log file.
			//echo 'Connection Established';
		}
	}
	public function MySQL($params)
	{
		$database = $params['Database'];
		$user = $params['UserName'];
		$pwd = $params['Password'];
		$host = $params['Host'];
		try
		{
			$connection = new PDO("mysql:host=localhost;dbname=$database", $user, $pwd);
			return $connection;
		}
		catch (PDOException $e)
		{
			//return array('Error: '.$e->getMessage());
			echo 'Error: '.$e->getMessage();
			exit();
		}			
		finally
		{
			//Do something here. Save this connection meta details sush
			//as time, date, and so on in a log file.
			//echo 'Connection Established';
		}
	}
	public function Kill($connection)
	{
		if (!isset($connection) || $connection == '')
		{
			//Tell the user something. there is no supplied $connection variable
			//or the supplied value is invalid to what we are doing right now
			//This program is going to output [Invalid Parameter Supplied]
			echo 'Invalid Parameter Supplied';
		}
		else
		{
			$connection = NULL;
			//echo 'Connection Dead';
			//Then log the details of this operation. Time, Date and so on
			//Should be present in the log file.
		}
	}
}
?>