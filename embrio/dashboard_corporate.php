<?php include_once "dashboard_agency_action.php"; ?>
<?php include_once "casting_action.php"; ?>
<?php if($__role!="4") exit(); ?>
<div class="row">
	<?php 
		$corporate_profile = $db->fetch_all_data("corporate_profiles",[],"user_id='".$__user_id."'")[0];
	?>
	<div class="container">
		<h2 class="well"><?=strtoupper(v("dashboard"));?></h2>
		<h3><?=$corporate_profile["name"];?></h3>
	</div>
	<div class="col-sm-2 features wow fadeInRight animated">
		<img id="mainProfileImg" src="user_images/<?=$corporate_profile["logo"];?>">
		<input name="change_logo" id="change_logo" value="<?=v("change_logo");?>" style="width:200px;" type="button" onclick="window.location='dashboard_corporate_photoprofile.php';" class="btn_post">
		<br><br>
	</div>
	<div class="col-sm-10 fadeInRight animated">
		<div class="col-md-12 container">
			<ul class="col-sm-12 nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#profile">Profile</a></li>
				<li onclick="window.location='?tabActive=gallery'"><a data-toggle="tab" href="#gallery"><?=v("gallery");?></a></li>
				<li><a data-toggle="tab" href="#jobs"><?=v("jobs");?></a></li>
				<li><a data-toggle="tab" href="#bookings">Booking Requests</a></li>
				<li onclick="loadMessages();">
					<a data-toggle="tab" href="#message"><?=v("message");?><span class="notification-counter" style="visibility:hidden;" id="notifMessageTabCount"></span></a>
				</li>
				<li><a data-toggle="tab" href="#invoices"><?=v("invoices");?></a></li>
				<li><a data-toggle="tab" href="#tokens"><?=v("tokens");?></a></li>
			</ul>
			<br><br>
			<div class="col-sm-12 tab-content">
				<div id="profile" class="tab-pane fade in active">
					<?php include_once "dashboard_corporate_profiles.php";?>
				</div><br>
				<div id="gallery" class="tab-pane fade"><?php include_once "dashboard_corporate_gallery.php"; ?></div>
				<div id="jobs" class="tab-pane fade"><?php include_once "dashboard_corporate_jobs.php"; ?></div>
				<div id="bookings" class="tab-pane fade"><?php include_once "dashboard_bookings.php"; ?></div>
				<div id="message" class="tab-pane fade"><?php include_once "dashboard_messages.php"; ?></div>
				<div id="invoices" class="tab-pane fade"><?php include_once "dashboard_invoices.php"; ?></div>
				<div id="tokens" class="tab-pane fade"><?php include_once "dashboard_tokens.php"; ?></div>
			</div>
		</div>
	</div>
</div>