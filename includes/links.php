<div class="row link-wrapper" id="link-wrapper">
	<?php
		$id = 0;
		//Check if user is logged in and if so make $id he's id. Else id is 0 that means the default system user.
		if (isset($_SESSION['id'])) {
			$id = $dao_obj->getUserId($_SESSION['username']);
		}

		//Loop all links from the database and display them on the website.
		foreach ($dao_obj->getLinks($id) as $row) {
	?>
		
		<div class="col-6 col-sm-6 col-md-3">
			<a class="offset-1 offset-sm-1 offset-md-1 col-10 col-sm-10 col-md-10 item remove-style-link" href="<?php echo $row[1]; ?>">
				<div class="row">
					<div class="offset-md-1 col-md-10 bc">
						<p class="item-p" style="word-wrap: break-word;">
							<?php 
								//Remove https:// , http:// and www. From the string so it looks nicer.
								//echo str_replace(array('https://', 'http://','www.'),"",$row[0])
								echo $row['2'];
							?>
						</p>
					</div>
				</div>
			</a>
			<div class="offset-md-1 col-md-10">
				<div class="row">
					<div class="col-10 col-sm-10 col-md-10 linktext"><span><?php echo $row[1]; ?></span></div>
					<?php
					
					if (isset($_SESSION['username'])) {
					
					?>
					<div class="col-2 col-sm-2 col-md-2">
						<span class="icon-close" style="font-size:1em;" onclick="window.location.href='delete.php?id=<?php echo $row[0];?>';"></span>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
		
	
	<?php 
		//If it's not system user (user id: 0) show add new link button.
		} if($id != 0) {	
	?>

	<div class="col-6 col-sm-6 col-md-3">
		<a class="offset-1 offset-sm-1 offset-md-1 col-10 col-sm-10 col-md-10 item remove-style-link" href="#" id="addItem">
				<div class="row">
					<div class="offset-md-1 col-md-10 bc">
						<p class="item-p addItem" style="word-wrap: break-word;">+</p>
				</div>
			</div>
		</a>

		<div class="offset-md-1 col-md-10">
			<div class="row">
				<div class="col-12 col-sm-12 col-md-12 linktext"><span>Add new item</span></div>
			</div>
		</div>
	</div>



	<!--
		<div class="col-6 col-sm-6 col-md-3" id="addItem">
			<div class="offset-1 offset-sm-1 offset-md-1 col-10 col-sm-10 col-md-10 item">
				<div class="row">
					<div class="col-md-12 bc">
						<p class="addItem">+</p>
					</div>
		
					<div class="col-md-12 linktext">
						<span>Add page</span>
					</div>
				</div>
			</div>
		</div>
		-->
	<?php } ?>


</div>