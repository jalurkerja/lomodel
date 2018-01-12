<?php include_once "dashboard_model_action.php"; ?>
<?php include_once "casting_action.php"; ?>
<?php if($__role!="5") exit(); ?>
<div class="row">
	<?php 
		$model_profile = $db->fetch_all_data("model_profiles",[],"user_id='".$__user_id."'")[0];
		$model = $db->fetch_all_data("model_files",[],"user_id='".$__user_id."'")[0];
	?>
	<div class="container">
		<h2 class="well"><?=strtoupper(v("dashboard"));?></h2>
		<h3><?=$model_profile["first_name"];?> <?=$model_profile["middle_name"];?> <?=$model_profile["last_name"];?></h3>
	</div>
	<div class="col-sm-2 features wow fadeInRight animated">
		<img id="mainProfileImg" src="user_images/<?=$model_profile["photo"];?>">
		<input name="change_photo" id="change_photo" value="<?=v("change_photo");?>" style="width:200px;" type="button" onclick="window.location='dashboard_model_photoprofile.php';" class="btn_post">
		<br><br>
	</div>
	<div class="col-sm-10 fadeInRight animated">
		<div class="col-md-12 container">
			<ul class="col-sm-12 nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#profile">Profile</a></li>
				<li onclick="window.location='?tabActive=album'"><a data-toggle="tab" href="#album">Album</a></li>
				<li><a data-toggle="tab" href="#appliedCastings"><?=v("applied_jobs");?></a></li>
				<li><a data-toggle="tab" href="#bookings"><?=v("bookings");?></a></li>
				<li><a data-toggle="tab" href="#joinOffers"><?=v("join_offers");?></a></li>
				<li onclick="loadMessages();">
					<a data-toggle="tab" href="#message"><?=v("message");?><span class="notification-counter" style="visibility:hidden;" id="notifMessageTabCount"></span></a>
				</li>
			</ul>
			<br><br>
			<div class="col-sm-12 tab-content">
				<div id="profile" class="tab-pane fade in active">
					<?php include_once "dashboard_model_profiles.php";?>
				</div><br>
				<div id="album" class="tab-pane fade"><?php include_once "dashboard_model_albums.php"; ?></div>
				<div id="appliedCastings" class="tab-pane fade"><?php include_once "dashboard_model_appliedCastings.php"; ?></div>
				<div id="bookings" class="tab-pane fade"><?php include_once "dashboard_model_bookings.php"; ?></div>
				<div id="joinOffers" class="tab-pane fade"><?php include_once "dashboard_model_join_offers.php"; ?></div>
				<div id="message" class="tab-pane fade"><?php include_once "dashboard_messages.php"; ?></div>
			</div>
		</div>
	</div>
</div>