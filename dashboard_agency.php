<?php include_once "dashboard_agency_action.php"; ?>
<?php if($__role!="3") exit(); ?>
<div class="row">
	<?php 
		$personal_profile = $db->fetch_all_data("personal_profiles",[],"user_id='".$__user_id."'")[0];
	?>
	<div class="container">
		<h2 class="well">DASHBOARD</h2>
		<h3><?=$personal_profile["name"];?></h3>
	</div>
	<div class="col-sm-3 fadeInRight animated">
		<img style="width:95%;" id="mainProfileImg" src="user_images/<?=$personal_profile["photo"];?>">
	</div>
	<div class="col-sm-9 fadeInRight animated">
		<div class="col-md-12 container">
			<ul class="col-sm-12 nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#profile">Profile</a></li>
				<li><a data-toggle="tab" href="#castings">Castings</a></li>
				<li><a data-toggle="tab" href="#post_a_casting">Post a Casting</a></li>
				<li><a data-toggle="tab" href="#bookings">Bookings</a></li>
			</ul>
			<br><br>
			<div class="col-sm-12 tab-content">
				<div id="profile" class="tab-pane fade in active">
					<div style="height:300px;"></div>
				</div>
				<div id="castings" class="tab-pane fade"><?php include_once "dashboard_agency_castings.php"; ?></div>
				<div id="post_a_casting" class="tab-pane fade"><?php include_once "dashboard_agency_post_a_casting.php"; ?></div>
				<div id="bookings" class="tab-pane fade"><?php include_once "dashboard_agency_bookings.php"; ?></div>
			</div>
		</div>
	</div>
</div>