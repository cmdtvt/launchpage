<?php include_once 'includes/db.php' ?>
<?php include_once 'includes/loggedIn.php' ?>

<?php

//Add new link to database when form is submitted to this page.
if (isset($_POST['link'])) {
	$dao_obj->createLink($_SESSION['id'],$_POST['link'],$_POST['displayname'],$_POST['color']);
	$_POST = array();
	header("Location: index.php");
}





?>


<!DOCTYPE html>
<html lang="en">
<?php include_once 'includes/header.php'?>
<body>
	<?php include_once 'includes/modal.php'?>
	<div class="container-fluid">

		<div class="row">
			<div class="col-10 col-sm-10 col-md-11 Timer"></div>
			<div class="col-2 col-sm-2 col-md-1" style="margin-top: 20px;">
				<img src="assets/gear.png" class="img-fluid settings-menu"  data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
			</div>
		</div>

		<div class="row">
			<div class="collapse offset-md-9 col-md-3" id="collapseExample" style="position:fixed;">
				<div class="card card-body">
					<div class="row">
						<div class="col-md-12">
							<h5>Settings: <?php if(isset($_SESSION['username'])){echo $_SESSION['username'];} ?></h5>
							<hr>
						</div>

						<div class="col-md-12">
							<a href="login.php">Login</a><br><br>
							<a href="logout.php">Logout</a><br><br>
							<a href="login.php?a=register">Register</a><br><br>
						</div>

						<div class="col-md-12">
							<hr>
							<h5>Admin</h5>
						</div>

						<div class="col-md-12">
							<a href="control.php">Controlpanel</a><br><br>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="row">
			<div class="offset-md-3 col-12 col-sm-12 col-md-6" style="margin-top: 10vh;">

				<form class="row">
					<div class="offset-2 offset-sm-2 offset-md-2 col-6 col-sm-6 col-md-8">
						<input type="text" class="form-control" placeholder="Search" id="search-target">
					</div>
					<div class="col-2 col-sm-2 col-md-2">
						<button class="btn btn-success btn-full" id="search" value="submit">Search</button>
					</div>
				</form>
				<!--
				<div class="row">
					<div class="offset-md-2 col-md-8">
						<div class="card card-body">
							<div class="row">
								<div class="col-2 col-sm-2 col-md-2 search-item">
									<div class="row">
										<div class="col-md-12">
											<input type="checkbox">
										</div>

										<div class="col-md-12 search-option">
											<span>Google</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				-->

				<?php include_once 'includes/links.php' ?>

			</div>
		</div>
	</div>
</body>
</html>
