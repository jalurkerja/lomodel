<br>
<div class="well col-sm-12">
	<?php 
		$agency_models = $db->fetch_all_data("agency_models",[],"agency_user_id='".$_GET["id"]."' AND join_status='2'","id DESC");
		if(count($agency_models) <= 0){
			echo "<span class='col-sm-12 well' style='color:red;'>".v("data_not_found")."</span>";
		} else {
			foreach($agency_models as $agency_model){
				$model_profile = $db->fetch_all_data("model_profiles",[],"user_id='".$agency_model["model_user_id"]."'")[0];
				$name = $model_profile["first_name"]." ".$model_profile["middle_name"]." ".$model_profile["last_name"];
				$location = $db->fetch_single_data("locations","name_".$__locale,["id" => $model_profile["location_id"]]);
		?>
			<div class="col-sm-3">
				<div class="thumbnail" style="margin:4px;cursor:pointer;" onclick="detailAgencyModel('<?=$_GET["id"];?>','<?=$agency_model["model_user_id"];?>','already_member');">
					<img style="cursor:pointer;margin-top:10px" class="img-responsive" src="user_images/<?=$model_profile["photo"];?>">
					<div><b><?=$name;?></b><p><?=$location;?></p></div>
				</div>
			</div>
		<?php } ?>
	<?php } ?>
</div>
<br><br>