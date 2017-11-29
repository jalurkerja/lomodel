<?php include_once "dashboard_model_action.php"; ?>
<?php include_once "casting_action.php"; ?>
<?php if($__role!="5") exit(); ?>
<div class="row">
	<?php 
		$model_profile = $db->fetch_all_data("model_profiles",[],"user_id='".$__user_id."'")[0];
		$model = $db->fetch_all_data("model_files",[],"user_id='".$__user_id."'")[0];
	?>
	<div class="container">
		<h2 class="well">DASHBOARD</h2>
		<h3><?=$model_profile["first_name"];?> <?=$model_profile["middle_name"];?> <?=$model_profile["last_name"];?></h3>
	</div>
	<div class="col-sm-3 features wow fadeInRight animated">
		<img id="mainProfileImg" src="user_images/<?=$model["filename"];?>">
	</div>
	<div class="col-sm-9 fadeInRight animated">
		<div class="col-md-12 container">
			<ul class="col-sm-12 nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#profile">Profile</a></li>
				<li><a data-toggle="tab" href="#album">Album</a></li>
				<li><a data-toggle="tab" href="#appliedCastings">Applied Castings</a></li>
				<li><a data-toggle="tab" href="#bookings">Booking Requests</a></li>
				<li><a data-toggle="tab" href="#message"><?=v("message");?></a></li>
			</ul>
			<br><br>
			<div class="col-sm-12 tab-content">
				<div id="profile" class="tab-pane fade in active">
					<h3>Nationality : <b><?=$db->fetch_single_data("nationalities","name",["id" => $model_profile["nationality_id"]]);?></b></h3>
					<div style="width:590px;border-top:1px solid #888;"></div>
						<table class="tbl_detail">
							<tr><td>Hair</td><td>Eyes</td><td>Height<br>(cm)</td><td>Bust<br>(cm)</td><td>Waist<br>(cm)</td><td>Hips<br>(cm)</td><td>Shoe<br>(us)</td></tr>
							<tr><td style="height:10px;"></td></tr>
							<tr style="font-weight:bolder;">
								<td><?=$db->fetch_single_data("hair_colors","name",["id" => $model_profile["hair_color_id"]]);?></td>
								<td><?=$db->fetch_single_data("eye_colors","name",["id" => $model_profile["eye_colors_id"]]);?></td>
								<td><?=$model_profile["height"];?></td>
								<td><?=$model_profile["bust"];?></td>
								<td><?=$model_profile["waist"];?></td>
								<td><?=$model_profile["hips"];?></td>
								<td><?=$model_profile["shoe"];?></td>
							</tr>
						</table>
					<div style="width:590px;border-top:1px solid #888;"></div>
				</div><br>
				<div id="album" class="tab-pane fade">
					<?php
						$model_files = $db->fetch_all_data("model_files",[],"user_id = '".$__user_id."'");
						foreach($model_files as $model_file){
							?>
							<div class="col-sm-3 fadeInRight animated">
								<img class="img-responsive" height="400" src="user_images/<?=$model["filename"];?>">
							</div>
							<?php
						}
					?>
				</div>
				<div id="appliedCastings" class="tab-pane fade"><?php include_once "dashboard_model_appliedCastings.php"; ?></div>
				<div id="bookings" class="tab-pane fade"><?php include_once "dashboard_model_bookings.php"; ?></div>
				<div id="message" class="tab-pane fade"><?php include_once "dashboard_messages.php"; ?></div>
			</div>
		</div>
	</div>
</div>