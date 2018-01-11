<?php 
	include_once "../common.php";
	$id = $_GET["id"];
	$applicants = $db->fetch_all_data("applied_jobs",[],"job_id = '$id' AND job_giver_user_id='$__user_id'","created_at DESC");
?>									
	<div class="row">
		<?php foreach($applicants as $applicant){ ?>
			<?php 
				$model_profile = $db->fetch_all_data("model_profiles",[],"user_id='".$applicant["user_id"]."'")[0];
				$model = $db->fetch_all_data("model_files",[],"user_id='".$applicant["user_id"]."'")[0];
				if($model_profile["photo"] == "" || !file_exists("../user_images/".$model_profile["photo"])) $model_profile["photo"] = "nophoto.png";
			?>
			<div class="col-sm-12" style="margin:4px;cursor:pointer;" onclick="window.open('model_details.php?user_id=<?=$model["user_id"];?>');">
				<div class="col-sm-3">
					<img style="margin-top:10px" width="100" src="user_images/<?=$model_profile["photo"];?>">
				</div>
				<div class="col-sm-9">
					<div><h3><?=$model_profile["first_name"];?> <?=$model_profile["middle_name"];?> <?=$model_profile["last_name"];?></h3></div>
					<b>Nationality : <?=$db->fetch_single_data("nationalities","name",["id" => $model_profile["nationality_id"]]);?></b>
					<div class="col-sm-12" style="border-top:1px solid #888;"></div>
						<table class="tbl_detail">
							<tr><td>Hair</td><td>Eyes</td><td>Height<br>(cm)</td><td>Waist<br>(cm)</td><td>Hips<br>(cm)</td><td>Shoe<br>(us)</td></tr>
							<tr><td style="height:10px;"></td></tr>
							<tr style="font-weight:bolder;">
								<td><?=$db->fetch_single_data("hair_colors","name",["id" => $model_profile["hair_color_id"]]);?></td>
								<td><?=$db->fetch_single_data("eye_colors","name",["id" => $model_profile["eye_colors_id"]]);?></td>
								<td><?=$model_profile["height"];?></td>
								<td><?=$model_profile["waist"];?></td>
								<td><?=$model_profile["hips"];?></td>
								<td><?=$model_profile["shoe"];?></td>
							</tr>
						</table>
					<div class="col-sm-12" style="border-top:1px solid #888;"></div>
				</div>
			</div>
			<div class="col-sm-12" style="padding-bottom:10px;border-bottom:1px solid #aaa;width:100%;"></div>
		<?php } ?>
	</div>