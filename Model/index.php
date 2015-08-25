<?php
	require_once($_O."..\__Alloc\__Alloc.php");
	require_once($_O.__DATABASE_DEPENDENCY."/QueryManager.php");
	class Model extends Query
	{
		protected function ArrayToQuery($string)
		{
			$query = "";
			$counter = 0;
			foreach ($string as $key=>$value)
			{
				if ($counter < count($string) - 1)
				{
					if ($value == "string")
					{
						if ($key == '')
						{
							$query .= "NULL, ";							
						}
						else
						{
							$query .= "'$key', ";
						}
					}
					else if ($value == "int")
					{
						if ($key == '')
						{
							$query .= "NULL, ";
						}
						else
						{
							$query .= "$key, ";
						}
					}
				}
				else
				{
					if ($value == "string")
					{
						if ($key == '')
						{
							$query .= "NULL)";
						}
						else
						{
							$query .= "'$key')";
						}
						
					}
					else if ($value == "int")
					{
						if ($key == '')
						{
							$query .= "NULL)";
						}
						else
						{
							$query .= "$key)";
						}
					}
				}
				$counter += 1;
			}
			return $query;
		}

		private function checktype($params, $type)
		{
			$type = strtolower($type);
			switch ($type)
			{
				case "array":
				{
					if (is_array($params))
					{
						return true;
					}
					else
					{
						return false;
					}
					break;
				}
				case "int":
				{
					if (is_int($params))
					{
						return true;
					}
					else
					{
						return false;
					}
					break;
				}
				case "string":
				{
					if (is_string($params))
					{
						return true;
					}
					else
					{
						return false;
					}
					break;
				}
				default:
				{
					//do nothing yet
				}
			}
		}

		public function currentDate()
		{

		}

		public function isProfileComplete($usertype, $userid)
		{
			if (is_int((int)$usertype) && is_int((int)$userid))
			{
				switch($usertype)
				{
					case 1:
					{
						$complete = self::Select("[Students].[Account]", array("Complete"), array("Student"=>$userid))[0]["Complete"];
						break;
					}
					default:
					{
						throw new \Exception("Invalid User Type Supplied");
					}
				}
				return $complete;
			}
		}

		public function completeProfile($usertype, $userid)
		{
			if (is_int((int)$usertype) && is_int((int)$userid))
			{
				switch($usertype)
				{
					case 1:
					{
						$complete = self::Update("[Students].[Account]", array("Complete"=>1), array("Student"=>$userid));
						break;
					}
					default:
					{
						throw new \Exception("Invalid User Type Supplied");
					}
				}
				return $complete;
			}
		}

		private function generateGuid()
		{
			$rand1 = rand(100, 100000);
			$rand2 = rand(-0.33, -333.333);

			$num = $rand1 * $rand2;

			return md5($num);
		}
		public function RegisterStudent($params)
		{
			if (!self::checktype($params, "array"))
			{
				//throw an exception
				exit();
			}
			$firstname = $params["FIRSTNAME"];
			$lastname = $params["LASTNAME"];
			$middlename = $params["MIDDLENAME"];
			$phone = $params["PHONENUMBER"];
			$email = $params["EMAIL"];
			$homeaddress = $params["HOMEADDRESS"];
			$dateofbirth = $params["DATEOFBIRTH"];
			$country = $params["COUNTRY"];
			$state = $params["STATE"];
			$gender = $params["GENDER"];
			$string = array($firstname=>"string", $lastname=>"string", $middlename=>"string",
							$phone=>"string", $email=>"string", $homeaddress=>"string", $dateofbirth=>"string",
							$country=>"string", $state=>"string", $gender=>"string"
						   );
			//print_r($string);
			if (is_array(self::Select("[Students].[Info]", array("*"), array("Email"=>"'$email'"))))
			{
				return false;
			}
			$query = "INSERT INTO [Students].[Info] VALUES(".self::ArrayToQuery($string);
				//echo $query;
			$result = self::Execute($query);
			if ($result == 1)
			{
				$studentid = (is_array(self::Select("[Students].[Info]", array("StudentID"), array("Email"=>"'$email'"))))?self::Select("[Students].[Info]", array("StudentID"), array("Email"=>"'$email'"))[0]["StudentID"]:NULL;
				$query1 = self::Execute("INSERT INTO [Students].[Profile] (Student) VALUES ($studentid)");
				$query2 = self::Execute("INSERT INTO [Students].[Account] (Student, Complete, DateJoined) VALUES ($studentid, 0, '".self::currentDate()."')");
				$query3 = self::Execute("INSERT INTO [Students].[Semester] (Student, Semester) VALUES ($studentid, NULL)");
				$query4 = self::Execute("INSERT INTO [Students].[Course] (Student, Course) VALUES ($studentid, NULL)");
				if (!$query1 || !$query2 || !$query3 || !$query4)
				{
					if (!$query1){ echo $query1; }
					if (!$query2){ echo $query2; }
					if (!$query3){ echo $query3; }
					if (!$query4){ echo $query4; }
					$query5 = self::Delete("[Students].[Info]", array("StudentID"=>$studentid));
					return false;		
				}
			}
			return $result;
		}

		public function RegisterFaculty($params)
		{
			if (!self::checktype($params, "array"))
			{
				//throw an exception
				exit();
			}
			$firstname = $params["FIRSTNAME"];
			$lastname = $params["LASTNAME"];
			$middlename = $params["MIDDLENAME"];
			$phone = $params["PHONENUMBER"];
			$email = $params["EMAIL"];
			$homeaddress = $params["HOMEADDRESS"];
			$dateofbirth = $params["DATEOFBIRTH"];
			$country = $params["COUNTRY"];
			$state = $params["STATE"];
			$gender = $params["GENDER"];
			$string = array($firstname=>"string", $lastname=>"string", $middlename=>"string",
							$phone=>"string", $email=>"string", $homeaddress=>"string", $dateofbirth=>"string",
							$country=>"string", $state=>"string", $gender=>"string"
						   );
			$query = "INSERT INTO [Faculties].[Info] VALUES(".self::ArrayToQuery($string);
			$result = self::Execute($query);
			return $result;
		}

		public function RegisterAdministrator($params)
		{
			if (!self::checktype($params, "array"))
			{
				//throw an exception
				exit();
			}
			$firstname = $params["FIRSTNAME"];
			$lastname = $params["LASTNAME"];
			$middlename = $params["MIDDLENAME"];
			$phone = $params["PHONENUMBER"];
			$email = $params["EMAIL"];
			$homeaddress = $params["HOMEADDRESS"];
			$dateofbirth = $params["DATEOFBIRTH"];
			$country = $params["COUNTRY"];
			$state = $params["STATE"];
			$gender = $params["GENDER"];
			$string = array($firstname=>"string", $lastname=>"string", $middlename=>"string",
							$phone=>"string", $email=>"string", $homeaddress=>"string", $dateofbirth=>"string",
							$country=>"string", $state=>"string", $gender=>"string"
						   );
			$query = "INSERT INTO [Administrators].[Info] VALUES(".self::ArrayToQuery($string);
			$result = self::Execute($query);
			return $result;
		}

		public function NewNote($params, $user)
		{
			if (!self::checktype($params, "array"))
			{
				//throw an exception
				exit();
			}
			if (!self::checktype($user, "string"))
			{
				//throw an exception
				exit();
			}
			$noteauthor = $params["NOTEUSER"];
			$notetitle = $params["NOTETITLE"];
			$notelocation = $params["NOTELOCATION"];
			$string = array($noteauthor=>"int", $notetitle=>"string", $notelocation=>"string");
			$noteuser = ucfirst(strtolower($user));
			if ($noteuser != "Student" && $noteuser != "Administrator" && $noteuser != "Faculty")
			{
				//throw an exception
				echo "here";
				exit();
			}
			switch ($noteuser)
			{
				case "Administrator":
				{
					$table = "[Administrators].[Note]";
					break;
				}
				case "Student":
				{
					$table = "[Students].[Note]";
					break;
				}
				case "Faculty":
				{
					$table = "[Faculties].[Note]";
					break;
				}
				default:
				{
					exit();
				}
			}
			$query = "INSERT INTO $table VALUES(".self::ArrayToQuery($string);
			$result = self::Execute($query);
			return $result;
		}

		public function NewProfile($params, $user)
		{
			if (!self::checktype($params, "array"))
			{
				//throw an exception
				exit();
			}
			if (!self::checktype($user, "string"))
			{
				//throw an exception
				exit();
			}
			
			$profileauthor = $params["PROFILEUSER"];
			if (isset($params["PROFILEPICTURE"]))
			{
				$picture = $params["PROFILEPICTURE"];
			}
			if (isset($params["PROFILETAGLINE"]))
			{
				$tagline = $params["PROFILETAGLINE"];
			}
			$profile = ucfirst(strtolower($user));
			if ($profile != "Student" && $profile != "Administrator" && $profile != "Faculty")
			{
				//throw an exception
				exit();
			}
			switch ($profile)
			{
				case "Administrator":
				{
					$table = "[Administrators].[Profile]";
					break;
				}
				case "Student":
				{
					$table = "[Students].[Profile]";
					break;
				}
				case "Faculty":
				{
					$table = "[Faculties].[Profile]";
					break;
				}
				default:
				{
					exit();
				}
			}
			if (isset($picture))
			{
				self::Update($table, array("Picture"=>$picture), array($profile=>$profileauthor));
			}
			if (isset($tagline))
			{
				self::Update($table, array("TagLine"=>$tagline), array($profile=>$profileauthor));
			}
			return 1;
		}
		protected function checkLogin($table, $username)
		{
			$query = self::Select($table, array("*"), array("UserName"=>"'$username'"));
			if (is_array($query))
			{
				if (count($query) > 0)
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
		public function NewLogin($params, $user)
		{
			if (!self::checktype($params, "array"))
			{
				//throw an exception
				exit();
			}
			if (!self::checktype($user, "string"))
			{
				//throw an exception
				exit();
			}
			$userid = $params["USERID"];
			$username = $params["USERNAME"];
			$password = hash("sha1", $params["PASSWORD"]);
			$string = array($userid=>"int", $username=>"string", $password=>"string");
			$profile = ucfirst(strtolower($user));
			if ($profile != "Student" && $profile != "Administrator" && $profile != "Faculty")
			{
				//throw an exception
				exit();
			}
			switch ($profile)
			{
				case "Administrator":
				{
					$table = "[Auth].[Administrator]";
					break;
				}
				case "Student":
				{
					$table = "[Auth].[Student]";
					break;
				}
				case "Faculty":
				{
					$table = "[Auth].[Faculty]";
					break;
				}
				default:
				{
					exit();
				}
			}
			if (self::checkLogin($table, $username))
			{
				$query = "INSERT INTO $table VALUES(".self::ArrayToQuery($string);
				$result = self::Execute($query);
				if ($result == 1)
				{
					return true;
				}	
			}
			else
			{
				return false;
			}
		}

		public function NewCourse($params)
		{
			if (!self::checktype($params, "array"))
			{
				//throw an exception
				exit();
			}
			$name = $params["COURSENAME"];
			$duration = $params["COURSEDURATION"];
			$description = $params["COURSEDESCRIPTION"];
			$string = array($name=>"string", $duration=>"int", $description=>"string");
			$query = "INSERT INTO [General].[Course] VALUES(".self::ArrayToQuery($string);
			$result = self::Execute($query);
			return $result;
		}

		public function NewSemester($params)
		{
			if (!self::checktype($params, "array"))
			{
				//throw an exception
				exit();
			}
			$name = $params["SEMESTERNAME"];
			$duration = $params["SEMESTERDURATION"];
			$string = array($name=>"string", $duration=>"int");
			$query = "INSERT INTO [General].[Semester] VALUES(".self::ArrayToQuery($string);
			$result = self::Execute($query);
			return $result;
		}

		public function NewSubject($params)
		{
			if (!self::checktype($params, "array"))
			{
				//throw an exception
				exit();
			}
			$name = $params["SUBJECTNAME"];
			$description = $params["SUBJECTDESCRIPTION"];
			$string = array($name=>"string", $description=>"string");
			$query = "INSERT INTO [General].[Subject] VALUES(".self::ArrayToQuery($string);
			$result = self::Execute($query);
			return $result;
		}

		public function AssignFaculty($params)
		{
			if (!self::checktype($params, "array"))
			{
				//throw an exception
				exit();
			}
			$faculty = $params["FACULTY"];
			$course = $params["COURSE"];
			$semester = $params["SEMESTER"];
			$subject = $params["SUBJECT"];
			$string = array($faculty=>"int", $course=>"int", $semester=>"int", $subject=>"int");
			$query = "INSERT INTO [Faculties].[Subject] VALUES (".self::ArrayToQuery($string);
			$result = self::Execute($query);
			return $result;
		}

		public function NewAnnouncement($params)
		{
			if (!self::checktype($params, "array"))
			{
				//throw an exception
				exit();
			}
			$from = $params["FROM"];
			$to = $params["TO"];
			$announcer = $params["ANNOUNCER"];
			$announcement = $params["ANNOUNCEMENT"];
			$string = array($from=>"int", $to=>"int", $announcer=>"int", $announcement=>"string");
			$query = "INSERT INTO [Shared].[Announcement] VALUES(".self::ArrayToQuery($string);
			$result = self::Execute($query);
			return $result;
		}

		public function NewMessage($params)
		{
			if (!self::checktype($params, "array"))
			{
				//throw an exception
				exit();
			}
			$fromtype = $params["FROMTYPE"];
			$totype = $params["TOTYPE"];
			$from = $params["FROM"];
			$to = $params["TO"];
			$guid = self::generateGuid();
			$content = $params["CONTENT"];
			//$string = array($fromtype=>"int", $totype=>"int", $from=>"int", $to=>"string", $guid=>"string");
			$query = "INSERT INTO [Shared].[Message] VALUES($fromtype, $totype, $from, '$to', '$guid')";
			$result = self::Execute($query);
			if ($result == 1)
			{
				$id = self::Select("[Shared].[Message]", array("MessageID"), array("GUID"=>"'$guid'"))[0]["MessageID"];
				//$string = array($id=>"int", $content=>"string", "NOW()"=>"int", "0"=>"int");
				$query = "INSERT INTO [Shared].[MessageContent] VALUES ($id, '$content', GETDATE(), 0)";
				$result = self::Execute($query);
				return $result;
			}
			else
			{
				//print_r($string);
				echo $query."<br/>";
				return $result;
			}
		}

		public function ShareNote($params)
		{
			if (!self::checktype($params, "array"))
			{
				//throw an exception
				exit();
			}
			$fromtype = $params["FROMTYPE"];
			$totype = $params["TOTYPE"];
			$from = $params["FROM"];
			$to = $params["TO"];
			$string = array($fromtype=>"int", $totype=>"int", $from=>"int", $to=>"int");
			$query = "INSERT INTO [Shared].[Note] VALUES(".self::ArrayToQuery($string);
			$result = self::Execute($query);
			return $result;
		}

		public function NewQuestion($params)
		{
			if (!self::checktype($params, "array"))
			{
				//throw an exception
				exit();
			}
			$askedby = $params["ASKEDBY"];
			$question = $params["QUESTION"];
			$string = array($askedby=>"int", $question=>"string");
			$query = "INSERT INTO [Shared].[QuestionForum] VALUES(".self::ArrayToQuery($string);
			$result = self::Execute($query);
			return $result;
		}

		public function NewAnswer($params)
		{
			if (!self::checktype($params, "array"))
			{
				//throw an exception
				exit();
			} 
			$question = $params["Question"];
			$answerbytype = $params["ANSWEREDBYTYPE"];
			$answeredby = $params["ANSWEREDBY"];
			$answer = $params["ANSWER"];
			$string = array($question=>"int", $answerbytype=>"int", $answeredby=>"int", $answer=>"string");
			$query = "INSERT INTO [Shared].[AnswerForum] VALUES(".self::ArrayToQuery($string);
			$result = self::Execute($query);
			return $result;
		}

		public function Courses($id = null)
		{
			if (!is_null($id))
			{
				$course = self::Select("[General].[Course]", array("*"), array("CourseID"=>$id));
			}
			else
			{
				$course = self::Select("[General].[Course]", array("*"), array());
			}
			return $course;
		}

		public function Semesters($id = null)
		{
			if (!is_null($id))
			{
				$semester = self::Select("[General].[Semester]", array("*"), array("SemesterID"=>$id));
			}
			else
			{
				$semester = self::Select("[General].[Semester]", array("*"), array());
			}
			return $semester;
		}

		public function StudentCourse($params)
		{
			if (!self::checktype($params, "array"))
			{
				//throw an exception
				exit();
			}
			$student = $params["STUDENT"];
			$course = $params["COURSE"];
			$result = self::Update("[Students].[Course]", array("Course"=>$course), array("Student"=>$student));
			return $result;
		}

		public function StudentSemester($params)
		{
			if (!self::checktype($params, "array"))
			{
				//throw an exception
				exit();
			}
			$student = $params["STUDENT"];
			$semester = $params["SEMESTER"];
			$string = array($student=>"int", $semester=>"int");
			$result = self::Update("[Students].[Semester]", array("Semester"=>$semester), array("Student"=>$student));
			return $result;
		}


		public function Update($table, $params, $id)
		{
			if (!self::checktype($table, "string"))
			{
				//throw an exception
				exit();
			}
			if (!self::checktype($id, "array"))
			{
				//throw an exception
				exit();
			}
			if (!self::checktype($params, "array"))
			{
				//throw an exception
				exit();
			}
			$query = "UPDATE $table SET ";
			$counter = 0;
			foreach ($params as $key=>$value)
			{
				if ($counter == count($params) - 1)
				{
					$query .= "$key=$value";
				}
				else
				{
					$query .= "$key=$value, ";
				}
				$counter += 1;
			}
			$counter = 0;
			foreach($id as $key=>$value)
			{
				if ($counter == 0)
				{
					$query .= " WHERE $key=$value";						
				}
				else if ($counter > 0)
				{
					$query .= " AND $key=$value";
				}
				$counter += 1;
			}
			$result = self::Execute($query);
			return $result;
		}

		public function Select($table, $params, $id)
		{
			if (!self::checktype($table, "string"))
			{
				//throw an exception
				exit();
			}
			if (!self::checktype($id, "array"))
			{
				//throw an exception
				exit();
			}
			if (!self::checktype($params, "array"))
			{
				//throw an exception
				exit();
			}
			$query = "SELECT ";
			$counter=0;
			foreach ($params as $key) {
				if ($counter == count($params) - 1)
				{
					$query .= "$key";
				}
				else
				{
					$query .= "$key, ";
				}
				$counter += 1;
			}
			$query .= " FROM $table";
			if (count($id) != 0)
			{
				$counter = 0;
				foreach($id as $key=>$value)
				{
					if ($counter == 0)
					{
						$query .= " WHERE $key=$value";						
					}
					else if ($counter > 0)
					{
						$query .= " AND $key=$value";
					}
					$counter += 1;
				}
			}
			$result = self::Execute($query);
			return $result;
		}

		public function Delete($table, $id)
		{
			if (!self::checktype($table, "string"))
			{
				//throw an exception
				exit();
			}
			if (!self::checktype($id, "array"))
			{
				//throw an exception
				exit();
			}
			$query = "DELETE FROM $table WHERE ";
			foreach ($id as $key => $value) {
				$query .= "$key = $value";
			}
			$result = self::Execute($query);
			return $result;
		}
	}
?>