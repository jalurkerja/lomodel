<?php include_once "homepage_header.php"; ?>
<?php include_once "model_details_action.php"; ?>
<?php
	if($__user_id == $_GET["user_id"] && $__isloggedin){
		?> <script> window.location="dashboard.php"; </script> <?php
		exit();
	}
?>
<?php include_once "main_container.php"; ?>
	<script>
		$(document).ready(function(){
			$('[data-toggle="popover"]').popover({
				trigger : 'hover',
				html : true
			});
		});
	</script>
	<style>
		.tbl_detail td{
			padding-right:30px;
			text-align:center;
		}
	</style>
	<div class="row">
		<?php 
			$model_profile = $db->fetch_all_data("model_profiles",[],"user_id='".$_GET["user_id"]."'")[0];
		?>
		
		<div class="container">
			<h1 class="well"><?=$model_profile["first_name"];?> <?=$model_profile["middle_name"];?> <?=$model_profile["last_name"];?> </h1>
		</div>
		<div class="col-sm-2 fadeInRight animated">
			<img id="mainProfileImg" src="user_images/<?=$model_profile["photo"];?>">
		</div>
		
		<div class="col-sm-9 fadeInRight animated">
			<div class="col-md-12 container">
				<ul class="col-sm-12 nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#profile"><?=v("profile");?></a></li>
					<li><a data-toggle="tab" href="#albums"><?=v("albums");?></a></li>
					<li><a data-toggle="tab" href="#bookings"><?=v("bookings");?></a></li>
					<li><a data-toggle="tab" href="#message"><?=v("message");?></a></li>
				</ul>
				<br><br>
				<div class="col-sm-12 tab-content">
					<div id="profile" class="tab-pane fade in active"><?php include_once "model_details_profile.php"; ?></div>
					<div id="albums" class="tab-pane fade"><?php include_once "model_details_albums.php"; ?></div>
					<div id="bookings" class="tab-pane fade"><?php include_once "model_details_bookings.php"; ?></div>
					<div id="message" class="tab-pane fade"><?php include_once "details_messages.php"; ?></div>
				</div>
			</div>
		</div>
	</div>
	<br><br>
<?php include_once "main_container_end.php"; ?>
<?php include_once "footer.php"; ?>