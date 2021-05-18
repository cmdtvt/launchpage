<?php
	//Include file that has code for communicating with the database. $dao_obj is defined in this file.
	include_once 'includes/db.php'; 

	//If only username and password are set user wants to log in.
	if(isset($_POST['username']) && isset($_POST['password'])) {

		//Check if username was found from database and password is correct.
		$allow = $dao_obj->checkLogin($_POST['username'],$_POST['password']);

		//If username and password were correct store username and user's id to SESSION. (This is used to check if user is logged in)
		if($allow){
			session_start();
			$_SESSION['username'] = $_POST['username'];
			$_SESSION['id'] = $dao_obj->getUserId($_POST['username']);

			//Give user a cookie that can be used to authetificate user again without login even if he closes the browser. updateSecureString creates a "Secure" string that is saved to the database and also given to the user as a cookie. 
			setcookie("auth", $dao_obj->updateSecureString($_SESSION['id']), time()+3600);

			//Redirect back to front page after login.
			header('Location: index.php');
			die(); //This die is needed so the header below wont trigger accidentaly.
		}

		header('Location: login.php?info=Wrong username or password');
	}

	//If posted data has password1, password2 and username set user wants to register.
	if (isset($_POST['password1']) && isset($_POST['password2']) && isset($_POST['username'])) {

		//If given passwords match.
		if ($_POST['password1'] == $_POST['password2']) {
			$success = $dao_obj->createAccount($_POST['username'],$_POST['password1']);

			//If account creation was successfull log user straight in.
			if ($success) {
				session_start();
				$_SESSION['username'] = $_POST['username'];
				$_SESSION['id'] = $dao_obj->getUserId($_POST['username']);

				//Give user a cookie that can be used to authetificate user again without login even if he closes the browser. updateSecureString creates a "Secure" string that is saved to the database and also given to the user as a cookie. 
				setcookie("auth", $dao_obj->updateSecureString($_SESSION['id']), time()+3600);
				
				//Redirect back to front page after registering.
				header("Location: index.php");

				//Kill the PHP code so next header does not accidentaly trigger and move user to the wrong page.
				die();
			}
		}
		header("Location: login.php?a=register&info=Passwords did not match or username is taken.");
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



					<?php if (!isset($_GET['a'])) { //If user wants to register $_GET['a'] is defined. Else show login form.?>
					<div class="col-md-12">
						<h4>Login</h4>
					</div>

					<?php if (isset($_GET['info'])) { //Show login failed message ?>
						<div class="col-md-12 box bg-soft-red">
							<h5><?php echo $_GET['info']; ?></h5>
						</div>
					<?php } ?>

					<div class="col-md-12">
						<input type="text" required name="username" placeholder="username" class="form-control form-control-lg">
					</div>

					<div class="col-md-12">
						<input type="password" required name="password" placeholder="password" class="form-control form-control-lg">
					</div>

					<div class="col-md-12">
						<button type="submit" class="btn btn-success btn-full">Login</button>
					</div>

					<?php } else { ?>


					<div class="col-md-12">
						<h4>Register</h4>
					</div>

					<?php if (isset($_GET['info'])) { //Show register failed message.?>
						<div class="col-md-12 box bg-soft-red">
							<h5><?php echo $_GET['info']; ?></h5>
						</div>
					<?php } ?>

					<div class="col-md-12">
						<input type="text" required name="username" placeholder="username" class="form-control form-control-lg">
					</div>

					<div class="col-md-6">
						<input type="password" required name="password1" placeholder="password" class="form-control form-control-lg">
					</div>

					<div class="col-md-6">
						<input type="password" required name="password2" placeholder="Re-type password" class="form-control form-control-lg">
					</div>

					<div class="col-md-12">
						<button type="submit" class="btn btn-primary btn-full">Register</button>
					</div>
					<?php } ?>





				</div>
			</form>
		</div>
	</div>	

</body>
</html>
