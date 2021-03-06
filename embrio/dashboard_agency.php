<?php include_once "dashboard_agency_action.php"; ?>
<?php if($__role!="3") exit(); ?>
<div class="row">
	<?php 
		$agency_profile = $db->fetch_all_data("agency_profiles",[],"user_id='".$__user_id."'")[0];
	?>
	<div class="container">
		<h2 class="well"><?=strtoupper(v("dashboard"));?></h2>
		<h3><?=$agency_profile["name"];?></h3>
	</div>
	<div class="col-sm-2 features wow fadeInRight animated">
		<img id="mainProfileImg" src="user_images/<?=$agency_profile["photo"];?>">
		<input name="change_photo" id="change_photo" value="<?=v("change_photo");?>" style="width:200px;" type="button" onclick="window.location='dashboard_agency_photoprofile.php';" class="btn_post">
		<br><br>
	</div>
	<div class="col-sm-9 fadeInRight animated">
		<div class="col-md-12 container">
			<div style="width:100%;border-bottom:1px solid #ddd;position:relative;height:1px;top:42px;"></div>
			<ul class="col-sm-12 nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#profile">Profile</a></li>
				<li onclick="window.location='?tabActive=album'"><a data-toggle="tab" href="#album">Album</a></li>
				<li><a data-toggle="tab" href="#models">Models</a></li>
				<li><a data-toggle="tab" href="#jobs"><?=v("jobs");?></a></li>
				<li><a data-toggle="tab" href="#appliedJobs"><?=v("applied_jobs");?></a></li>
				
				<li><a data-toggle="tab" href="#bookings"><?=v("bookings");?></a></li>
				<li onclick="loadMessages();">
					<a data-toggle="tab" href="#message"><?=v("message");?><span class="notification-counter" style="visibility:hidden;" id="notifMessageTabCount"></span></a>
				</li>
				<li><a data-toggle="tab" href="#invoices"><?=v("invoices");?></a></li>
				<!--li><a data-toggle="tab" href="#tokens"><?=v("tokens");?></a></li-->
			</ul>
			<br><br>
			<div class="col-sm-12 tab-content">
				<div id="profile" class="tab-pane fade in active"><?php include_once "dashboard_agency_profile.php"; ?></div>
				<div id="album" class="tab-pane fade"><?php include_once "dashboard_agency_albums.php"; ?></div>
				<div id="models" class="tab-pane fade"><?php include_once "dashboard_agency_models.php"; ?></div>
				<div id="jobs" class="tab-pane fade"><?php include_once "dashboard_agency_jobs.php"; ?></div>
				<div id="appliedJobs" class="tab-pane fade"><?php include_once "dashboard_agency_applied_jobs.php"; ?></div>
				<div id="bookings" class="tab-pane fade"><?php include_once "dashboard_bookings.php"; ?></div>
				<div id="message" class="tab-pane fade"><?php include_once "dashboard_messages.php"; ?></div>
				<div id="invoices" class="tab-pane fade"><?php include_once "dashboard_invoices.php"; ?></div>
				<div id="tokens" class="tab-pane fade"><?php include_once "dashboard_tokens.php"; ?></div>
			</div>
		</div>
	</div>
</div>