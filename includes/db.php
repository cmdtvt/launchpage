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

		//Just a test function to see that class loads fine.
		public function test() {
			echo "<br><br><b></b>Cha Cha i'm a test message!</b><br><br>";
		}

		//Run basic query and return it. (Not sanitized use just for testing)
		function fetch($sql) {
			$result = $this->connection -> query($sql);
			return mysqli_fetch_all($result);
		}

		//Get all links from user with user's ID number
		public function getLinks($id) {

			$stmt = $this->connection->prepare("SELECT id,link,displayname,color FROM links WHERE UserID = ?");
			$stmt->bind_param("i", $id); // Bind username varaible to sql statement above.
			$result = $stmt->execute(); //Run sql 
			$result = $stmt->get_result()->fetch_all(); //Get all links and store them into $results variable
			$stmt->close();
			return $result;
		}

		//Delete link from database
		public function deleteLink($id) {
			$stmt = $this->connection->prepare("DELETE FROM links WHERE id=?");
			$stmt->bind_param("s", $id); // Bind username varaible to sql statement above.
			$result = $stmt->execute(); //Run sql 
			$stmt->close();

		}

		//Check if username and password match and are found from db.
		public function checkLogin($username,$password) {
			$password = password_hash($password, PASSWORD_BCRYPT);
			$stmt = $this->connection->prepare("SELECT password,disabled FROM users WHERE username=?");
			$stmt->bind_param("s", $username); // Bind username varaible to sql statement above.
			$result = $stmt->execute(); //Run sql 
			$result = $stmt->get_result()->fetch_row(); //Get results but only the first row. (No need for more because there can be only one user with same name.)
			$stmt->close();
			
			//If user's password matches and account is not disabled return true.
			if ($password == $result[0] && $result[1] != "true") {
				return true;
			}
			return false;
		}

		//Check user's ID
		public function getUserId($username) {
			$stmt = $this->connection->prepare("SELECT ID FROM users WHERE username=?");
			$stmt->bind_param("s", $username); // Bind username varaible to sql statement above.
			$result = $stmt->execute(); //Run sql 
			$result = $stmt->get_result()->fetch_row(); //Get results but only the first row. (No need for more because there can be only one user with same name.)
			$stmt->close();

			return $result[0];
		}

		//Create new link to the database.
		public function createLink($id,$link,$linktext,$color) {

			$stmt = $this->connection->prepare("INSERT INTO links (UserID,link,color,displayname) VALUES (?,?,?,?);");
			if($stmt == false) {
				return false;
			}
			$stmt->bind_param("isss", $id,$link,$color,$linktext); // Bind username varaible to sql statement above.
			$stmt->execute(); //Run sql
			$stmt->close();
			return true;
		}

		//Create new account.
		public function createAccount($username,$password) {
			$password = password_hash($password, PASSWORD_BCRYPT);
			$found = $this->getUserId($username);
			if (!isset($found)) {
				$stmt = $this->connection->prepare("INSERT INTO users (username,password) VALUES (?,?);");
				$stmt->bind_param("ss", $username,$password); // Bind username varaible to sql statement above.
				$stmt->execute(); //Run sql
				$stmt->close();

			} else {
				echo "Username is taken";
				return false;
			}
			echo $found;
		}

	}


$dao_obj = new DAO("launchpage","","");
$dao_obj->createAccount("Testi","1234");
var_dump($dao_obj->checkLogin("Testi","1234"));
//var_dump($dao_obj->checkLogin("system","system"));


?>