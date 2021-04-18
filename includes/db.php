<?php

	//This class connects to the database and it's functions can be used for comunicating with database. This is done so database code can be easily switched to run some other type like PDO...
	
	class DAO {
		function __construct($db_database,$db_username,$db_password) {
			//Check that database exsists and it has a setting table. This does not mean the database is valid but it works as small safety check.
			try {
				$this->connection = new mysqli("localhost",$db_username,$db_password,$db_database);
			} catch (Exception $e) {
				echo "Database could not connect";
				var_dump($e);
				die();
			}
		}

		public function test() {
			echo "Test";
		}

		//Run basic query and return it. (Not sanitized use just for testing)
		function fetch($sql) {
			$result = $this->connection -> query($sql);
			return mysqli_fetch_all($result);
		}

		//Get all links from user with user's ID
		public function getLinks($id) {
			//$sql = "SELECT link FROM links WHERE UserID=1";

			$stmt = $this->connection->prepare("SELECT link,displayname,color FROM links WHERE UserID = ?");
			$stmt->bind_param("i", $id);
			$result = $stmt->execute();
			$result = $stmt->get_result()->fetch_all();
			$stmt->close();
			
			return $result;
		}

		//Check if username and password match and are found from db.
		function checkLogin($username,$password) {


			$stmt = $this->connection->prepare("SELECT password FROM users WHERE username=?");
			$stmt->bind_param("s", $username);
			$result = $stmt->execute();
			$result = $stmt->get_result()->fetch_all();
			$stmt->close();


			if ($username == "cmdtvt" && $password == "apple") {
				return true;
			}
			return false;
			die();
		}

	}


$dao_obj = new DAO("database","username","password");



?>