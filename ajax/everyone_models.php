<?php include_once "../common.php"; ?>
	<div class="row">
		<table width="100%"><tr><td align="center"><h2>Models</h2></td></tr></table>
		<div class="col-md-12">
		<ul id="waterfall">
		<?php
			$whereclause = "";
			if($_GET["category"]!="") $whereclause = "user_id IN (SELECT user_id FROM model_profiles WHERE model_category_ids LIKE '%|".$_GET["category"]."|%')";
			else $whereclause = "1=1 ORDER BY RAND()";
			$models = $db->fetch_all_data("model_files",[],$whereclause,"","10");
			$ii = -1;
			foreach($models as $model){
				$ii++;
				$model_profile = $db->fetch_all_data("model_profiles",[],"user_id = '".$model["user_id"]."'")[0];
				$name = $model_profile["first_name"]." ".$model_profile["middle_name"]." ".$model_profile["last_name"];
				$location = $db->fetch_single_data("locations","name_".$__locale,["id" => $model_profile["location_id"]]);
				$nationality = $db->fetch_single_data("nationalities","name",["id" => $model_profile["nationality_id"]]);
				$hair_color = $db->fetch_single_data("hair_colors","name",["id" => $model_profile["hair_color_id"]]);
				$eye_color = $db->fetch_single_data("eye_colors","name",["id" => $model_profile["eye_colors_id"]]);
				$categories = "";
				$model_category_ids = pipetoarray($model_profile["model_category_ids"]);
				foreach($model_category_ids as $model_category_id){ $categories .= $db->fetch_single_data("model_categories","name",["id" => $model_category_id]).","; }
				$categories = substr($categories,0,-1);
		?>
			<li>
				<div class="thumbnail" style="margin:4px;cursor:pointer;" onclick="window.location='model_details.php?user_id=<?=$model["user_id"];?>';">
					<img style="max-width: 200px;" src="user_images/<?=$model["filename"];?>">
					<div><b><?=$name;?></b><p><?=$location;?></p></div>
				</div>
			</li>
		<?php } ?>
		</ul>
		</div>
		<?=$f->input("model_more","More","type='button' style='width:100%;' onclick=\"window.location='models.php';\"","btn btn-lg btn-info");?>
	</div>
	<script>
		$(document).ready(function ()
        {
            $('#waterfall').NewWaterfall({width: 220});
        });
	</script>