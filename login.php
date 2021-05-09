<?php
	include_once 'includes/db.php'; //Include file that has code for communicating with the database.
	if(isset($_POST['username']) && isset($_POST['password'])) {
		//Check if username was found from database and password matched.
		$allow = $dao_obj->checkLogin($_POST['username'],$_POST['password']);
		if($allow){

			session_start();
			$_SESSION['username'] = $_POST['username'];
			$_SESSION['id'] = $dao_obj->getUserId($_POST['username']);
			
			header('Location: index.php');
		}
	}

	if (isset($_POST['password1']) && isset($_POST['password2']) && isset($_POST['username'])) {
		if ($_POST['password1'] == $_POST['password2']) {
			$dao_obj->createAccount($_POST['username1'],$_POST['password']);
		}
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



					<?php if (!isset($_GET['a'])) {?>
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



					<?php } else { ?>



					<div class="col-md-12">
						<h4>Register</h4>
					</div>

					<div class="col-md-12">
						<input type="text" name="username" placeholder="username" class="form-control form-control-lg">
					</div>

					<div class="col-md-6">
						<input type="password" name="password1" placeholder="password" class="form-control form-control-lg">
					</div>

					<div class="col-md-6">
						<input type="password" name="password2" placeholder="Re-type password" class="form-control form-control-lg">
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