<head>
	<title>
		Start Page | 
		
		<?php 
			//If user is logged in ($_SESSION['username'] is defined) show user's name in website title.
			//If not just show Welcome text in its place.
			if(isset($_SESSION['username'])) {
				echo $_SESSION['username']; 
			} else {
				echo "Welcome!";
			}
		?>
	</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

 	<!-- Bootstrap CSS -->
 	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="tcss.css">
    <link rel="stylesheet" type="text/css" href="style1.css">
    <script src="script.js"></script>
</head>
