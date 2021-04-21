<?php
	include_once 'includes/db.php'; //Include file that has code for communicating with the database.

	//Lenght is the lenght of the string and $letters is allowed letters that are used in generation.
	function secure_string($lenght,$letters) {
		$letters = str_split($letters,1);
		$string = ""; //List for letters of secure string.
		$max = count($letters)-1; //max lenght for the random.

		//Add x amout of letters to $parts
		for ($i = 0; $i < $lenght; ++$i) {
			$string .= $letters[random_int(0, $max)]; //Add random letter to list
		}

		return $string; //Returning created string.
	}


	if(isset($_POST['username']) && isset($_POST['password'])) {
		//Check if username was found from database and password matched.
		$allow = $dao_obj->checkLogin($_POST['username'],$_POST['password']);
		if($allow){


			session_start();
			$_SESSION['username'] = $_POST['username'];
			$_SESSION['id'] = $dao_obj->getUserId($_POST['username']);
			echo "done!";
			header('Location:index.php');
		}
	}

	if(isset($_GET['a'])) {
		echo "<h5>Register</h5>";
	}
?>



<!DOCTYPE html>
<html lang="en">
<?php include_once 'includes/header.php' ?>
<body>
	<div class="container-fluid">
		<div class="row">
			<form method="post" action="login.php" class="offset-md-4 col-md-4 ">
				<div class="row box" style="margin-top:25vh;">
					<div class="col-md-12">
						<h4>Login</h4>
					</div>
					<div class="col-md-12">
						<input type="text" name="username" placeholder="username" class="form-control form-control-lg" value="cmdtvt">
					</div>

					<div class="col-md-12">
						<input type="password" name="password" placeholder="password" class="form-control form-control-lg" value="cookie">
					</div>

					<div class="col-md-12">
						<button type="submit" class="btn btn-success btn-full">Login</button>
					</div>
				</div>
			</form>
		</div>
	</div>	


</body>
</html>