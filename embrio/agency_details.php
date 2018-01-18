<?php include_once "homepage_header.php"; ?>
<?php include_once "agency_details_action.php"; ?>
<?php include_once "casting_action.php"; ?>
<?php
	if($__user_id == $_GET["id"] && $__isloggedin){
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
			$agency_profile = $db->fetch_all_data("agency_profiles",[],"user_id='".$_GET["id"]."'")[0];
		?>
		
		<div class="container">
			<h1 class="well"><?=v("agency_details");?></h1>
		</div>
		<div class="col-sm-2 fadeInRight animated">
			<img id="mainProfileImg" src="user_images/<?=$agency_profile["photo"];?>">
		</div>
		
		<div class="col-sm-9 fadeInRight animated">
			<div class="col-md-12 container">
				<ul class="col-sm-12 nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#profile"><?=v("profile");?></a></li>
					<li><a data-toggle="tab" href="#albums"><?=v("albums");?></a></li>
					<li><a data-toggle="tab" href="#models"><?=v("models");?></a></li>
					<li><a data-toggle="tab" href="#jobs"><?=v("jobs");?></a></li>
					<li><a data-toggle="tab" href="#message"><?=v("message");?></a></li>
				</ul>
				<br><br>
				<div class="col-sm-12 tab-content">
					<div id="profile" class="tab-pane fade in active"><?php include_once "agency_details_profile.php"; ?></div>
					<div id="albums" class="tab-pane fade"><?php include_once "agency_details_albums.php"; ?></div>
					<div id="models" class="tab-pane fade"><?php include_once "agency_details_models.php"; ?></div>
					<div id="jobs" class="tab-pane fade"><?php include_once "agency_details_jobs.php"; ?></div>
					<div id="message" class="tab-pane fade"><?php include_once "details_messages.php"; ?></div>
				</div>
			</div>
		</div>
	</div>
	<br><br>
<?php include_once "main_container_end.php"; ?>
<?php include_once "footer.php"; ?>