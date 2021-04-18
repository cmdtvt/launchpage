<?php
	include_once 'includes/db.php';
	if(isset($_POST['username']) && isset($_POST['password'])) {
		$allow = $dao_obj->checkLogin($_POST['username'],$_POST['password']);
		if($allow){
			header('Location:index.php');
		}
	}


	/*
	if (isset($_POST['username'])) {
		if ($_POST['password'] == "apple") {
			session_start();
			$_SESSION['username'] = $_POST['username'];
			$_SESSION['id'] = 1;
			header("Location: index.php");
		}
	}
	*/

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
			<form method="post" action="login.php" class="offset-md-4 col-md-4">
				<div class="row">
					<div class="col-md-12">
						<h4>Login</h4>
					</div>
					<div class="col-md-12">
						<input type="text" name="username" placeholder="username" class="form-control">
					</div>

					<div class="col-md-12">
						<input type="password" name="password" placeholder="password" class="form-control">
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