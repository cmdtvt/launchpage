<?php
	//Basicly make db.php able to include settings.php from anywhere in the project.
	require_once dirname(__FILE__).'/settings.php';
	if ($settings['debug']) {echo "<br><br>".dirname(__FILE__)."<br><br>";}
	
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
		public function deleteLink($owner,$id) {
			$stmt = $this->connection->prepare("DELETE FROM links WHERE id=? AND UserID=?");
			$stmt->bind_param("ii", $id,$owner); // Bind username varaible to sql statement above.
			$result = $stmt->execute(); //Run sql 
			$stmt->close();

		}

		//Check if username and password match and are found from db.
		public function checkLogin($username,$password) {

			$stmt = $this->connection->prepare("SELECT password,disabled FROM users WHERE username=?");
			$stmt->bind_param("s", $username); // Bind username varaible to sql statement above.
			$result = $stmt->execute(); //Run sql 
			$result = $stmt->get_result()->fetch_row(); //Get results but only the first row. (No need for more because there can be only one user with same name.)
			$stmt->close();
			
			//If user's password matches and account is not disabled return true.
			if (password_verify($password,$result[0]) && $result[1] != "true") {
				return true;
			}
			return false;
		}

		/*
		This is to create a secure string that is stored in database and in user's device as cookie.
		This might not be the best implementation but it works for this school project. When users comes back to the site this string can be used to authentificate the login.
		*/
		public function updateSecureString($id) {

			$lenght = 30;
			$letters = "ABCDeFGHIJKLMNOPQRSTUVXYZO123456789abcdefghijklmnopqrstuvxyzo";
			$letters = str_split($letters,1);
			$string = ""; //List for letters of secure string.
			$max = count($letters)-1; //max lenght for the random.

			//Add x amout of letters to $parts
			for ($i = 0; $i < $lenght; ++$i) {
				$string .= $letters[random_int(0, $max)]; //Add random letter to list
			}

			$stmt = $this->connection->prepare("UPDATE users SET auth=? WHERE id=?");
			$stmt->bind_param("si",$string,$id); // Bind username varaible to sql statement above.
			$result = $stmt->execute(); //Run sql
			$stmt->close();

			return $string;
		}

		public function checkAuth($auth) {
			$stmt = $this->connection->prepare("SELECT ID,username FROM users WHERE auth=?");
			$stmt->bind_param("s", $auth); // Bind username varaible to sql statement above.
			$result = $stmt->execute(); //Run sql
			$result = $stmt->get_result()->fetch_row(); //Get results but only the first row. (No need for more because there can be only one user with same name.)
			$stmt->close();

			//var_dump($result[0]);
			return $result;
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

		//Create new link to the database. return false if failed true if successful.
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

		public function updateLink($id,$link,$linktext,$color) {"UPDATE users SET auth=? WHERE id=?";
			$stmt = $this->connection->prepare("UPDATE links SET link=?,color=?,displayname=? WHERE id=?;");
			if($stmt == false) {
				return false;
			}
			$stmt->bind_param("sssi", $link,$color,$linktext,$id); // Bind username varaible to sql statement above.
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

				return true;
			}

			return false;

		}

	}


$dao_obj = new DAO($db_name,$db_user,$db_password);
//$dao_obj->createAccount("Testi","1234");
//var_dump($dao_obj->checkLogin("cmdtvt","cookie"));
//echo password_hash("cookie",PASSWORD_DEFAULT);

//var_dump($dao_obj->checkLogin("system","system"));


?>