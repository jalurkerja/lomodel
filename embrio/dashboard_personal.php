<?php include_once "dashboard_personal_action.php"; ?>
<?php if($__role!="2") exit(); ?>
<div class="row">
	<?php 
		$personal_profile = $db->fetch_all_data("personal_profiles",[],"user_id='".$__user_id."'")[0];
	?>
	<div class="container">
		<h2 class="well"><?=strtoupper(v("dashboard"));?></h2>
		<h3><?=$personal_profile["name"];?></h3>
	</div>
	<div class="col-sm-2 features wow fadeInRight animated">
		<img id="mainProfileImg" src="user_images/<?=$personal_profile["photo"];?>">
		<input name="change_photo" id="change_photo" value="<?=v("change_photo");?>" style="width:200px;" type="button" onclick="window.location='dashboard_personal_photoprofile.php';" class="btn_post">
		<br><br>
	</div>
	<div class="col-sm-9 fadeInRight animated">
		<div class="col-md-12 container">
			<ul class="col-sm-12 nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#profile">Profile</a></li>
				<li><a data-toggle="tab" href="#bookings">Bookings</a></li>
				<li onclick="loadMessages();">
					<a data-toggle="tab" href="#message"><?=v("message");?><span class="notification-counter" style="visibility:hidden;" id="notifMessageTabCount"></span></a>
				</li>
				<li><a data-toggle="tab" href="#invoices"><?=v("invoices");?></a></li>
			</ul>
			<br><br>
			<div class="col-sm-12 tab-content">
				<div id="profile" class="tab-pane fade in active">
					<?php include_once "dashboard_personal_profiles.php";?>
				</div><br>
				<div id="bookings" class="tab-pane fade"><?php include_once "dashboard_personal_bookings.php"; ?></div>
				<div id="message" class="tab-pane fade"><?php include_once "dashboard_messages.php"; ?></div>
				<div id="invoices" class="tab-pane fade"><?php include_once "dashboard_personal_invoices.php"; ?></div>
			</div>
		</div>
	</div>
</div>