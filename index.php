<?php include_once 'includes/db.php' ?>
<?php include_once 'includes/loggedIn.php' ?>

<?php


//Check if user wants to update old link or create a new one. If id-holder has value it means user wants to edit old link. If not and POST['link'] is set it means user wants to make a new link.
if(!empty($_POST['id-holder'])) {
	if($settings['debug']) { echo "Link update was issued!<br><br>";} //Debug message 

	$dao_obj->updateLink($_POST['id-holder'],$_POST['link'],$_POST['displayname'],$_POST['color']);
	header("Location: index.php"); //This redirect is because i want to empty the sent POST data.

} else if (isset($_POST['link'])) { //Add new link to database when form is submitted to this page.
	$dao_obj->createLink($_SESSION['id'],$_POST['link'],$_POST['displayname'],$_POST['color']);
	header("Location: index.php"); //This redirect is because i want to empty the sent POST data.
}

if ($settings['debug']) {var_dump($_COOKIE);} //Debug message 

?>


<!DOCTYPE html>
<html lang="en">
<?php include_once 'includes/header.php'?>
<body>
	<?php include_once 'includes/modal.php'?>
	<div class="container-fluid">

		<div class="row">
			<div class="col-10 col-sm-10 col-md-11 Timer">00|00</div> <!-- Pre set this to 00|00 so the page does not spazz out when javascript updates the clock -->
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
							<?php 
							//If username is set meaning user is logged in show right buttons in the dropdown menu.
							if(!isset($_SESSION['username'])){	
							?>
							<a href="login.php">Login</a><br><br>
							<?php } else { ?>
							<a href="logout.php">Logout</a><br><br>
							<?php } ?>
							<a href="login.php?a=register">Register</a><br><br>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="row">
			<div class="offset-md-3 col-12 col-sm-12 col-md-6" style="margin-top: 10vh;">

				<div class="row">
					<?php 
					//If user is not logged in show the whitebox that has a welcome message.
					if(!isset($_SESSION['username'])){?>
					<div class="offset-md-2 col-md-8 box">
						<h5>Welcome</h5>
						<p><a href="login.php">Login</a> or <a href="login.php?a=Register">Create Account</a> to get all benefits from the Launchpage and get started!</p>
					</div>
					<?php } ?>
					<div class="offset-0 offset-sm-0 offset-md-2 col-12 col-sm-12 col-md-8">
						<input type="text" class="form-control form-control-lg" placeholder="Search" id="search-target">
					</div>
					<div class="col-12 col-sm-12 col-md-2">
						<button class="btn btn-success btn-full" id="search" value="submit" style="margin-top:30px;">Search</button>
					</div>

				</div>

				<?php 
				//Include file that has all the users links.
				include_once 'includes/links.php' ?>

			</div>
		</div>
	</div>
</body>
</html>
