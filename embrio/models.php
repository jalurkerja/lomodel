<?php include_once "homepage_header.php"; ?>
<?php include_once "main_container.php"; ?>
	<div class="row">
		<div class="col-md-12" id="modelSearchArea">
			<div class="container">
				<form method="GET">
					<h2>Model Search</h2>
					<div class="col-sm-3 fadeInRight animated">
						<div class="form-group">
							<?php 
								$nationalities = $db->fetch_select_data("nationalities","id","name");
								$nationalities[""] = "--All Nationalities--";
								ksort($nationalities);
								$locations = $db->fetch_select_data("locations","id","name_".$__locale,["location_id" => "0","province_id" => "0:>"]);
								$locations[""] = "--All Locations--";
								ksort($locations);
								$model_categories = $db->fetch_select_data("model_categories","id","name_".$__locale);
								$model_categories[""] = "--All Category--";
								ksort($model_categories);
								$eye_colors = $db->fetch_select_data("eye_colors","id","name");
								$eye_colors[""] = "--All Eye Colors--";
								ksort($eye_colors);
								$hair_colors = $db->fetch_select_data("hair_colors","id","name");
								$hair_colors[""] = "--All Eye Colors--";
								ksort($hair_colors);
							?>
							<?=$f->select("filter_gender",["" => "--All Gender--","1" => "Male","2" => "Female"],$_GET["filter_gender"],"style='padding-bottom:10px;'","form-control");?><br>
							<?=$f->select("filter_nationality",$nationalities,$_GET["filter_nationality"],"","form-control");?><br>
							<?=$f->select("filter_location",$locations,$_GET["filter_location"],"","form-control");?><br>
							<?=$f->select("filter_model_category",$model_categories,$_GET["filter_model_category"],"","form-control");?><br>
						</div>
					</div>
					<div class="col-sm-3 fadeInRight animated">
						<div class="form-group">
							<label>Age : </label>
							<b>17&nbsp;&nbsp;</b><input id="filter_age" name="filter_age" style="width:150px;" type="text" class="span2" value="" data-slider-min="17" data-slider-max="70" data-slider-step="1" data-slider-value="[18,30]"/><b>&nbsp;&nbsp;70</b><br>
							
							<label>Height (cm) : </label>
							<b>150&nbsp;</b><input id="filter_height" name="filter_height" style="width:150px;" type="text" class="span2" value="" data-slider-min="150" data-slider-max="250" data-slider-step="1" data-slider-value="[170,185]"/><b>&nbsp;250</b><br>
							
							<label>Bust (cm) : </label>
							<b>65&nbsp;</b><input id="filter_bust" name="filter_bust" style="width:150px;" type="text" class="span2" value="" data-slider-min="65" data-slider-max="150" data-slider-step="1" data-slider-value="[90,130]"/><b>&nbsp;150</b><br>
							
						</div>
					</div>
					<div class="col-sm-3 fadeInRight animated">
						<div class="form-group">
							<label>Waist (cm) : </label>
							<b>50&nbsp;</b><input id="filter_waist" name="filter_waist" style="width:150px;" type="text" class="span2" value="" data-slider-min="50" data-slider-max="110" data-slider-step="1" data-slider-value="[70,90]"/><b>&nbsp;110</b><br>
							
							<label>Hips (cm) : </label>
							<b>65&nbsp;</b><input id="filter_hips" name="filter_hips" style="width:150px;" type="text" class="span2" value="" data-slider-min="65" data-slider-max="150" data-slider-step="1" data-slider-value="[90,130]"/><b>&nbsp;150</b><br>
							
							<label>Shoe (EU) : </label>
							<b>36&nbsp;</b><input id="filter_shoe" name="filter_shoe" style="width:150px;" type="text" class="span2" value="" data-slider-min="36" data-slider-max="49" data-slider-step="1" data-slider-value="[38,45]"/><b>&nbsp;49</b><br>
							
							<script> 
								$("#filter_age").slider({}); 
								$("#filter_height").slider({}); 
								$("#filter_bust").slider({}); 
								$("#filter_waist").slider({}); 
								$("#filter_hips").slider({}); 
								$("#filter_shoe").slider({}); 
							</script>
						</div>
					</div>
					<div class="col-sm-3 fadeInRight animated">
						<div class="form-group">
							<?=$f->select("filter_eye_color",$eye_colors,$_GET["filter_eye_color"],"","form-control");?><br>
							<?=$f->select("filter_hair_color",$hair_colors,$_GET["filter_hair_color"],"","form-control");?><br>
							<div style="height:30px;"></div>
							<?=$f->input("filter_search","Search","type='submit' style='width:100%;'","btn btn-lg btn-info");?>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="col-md-12">
		<ul id="waterfall">
		<?php
			    // [filter_gender] => 
				// [filter_nationality] => 
				// [filter_location] => 
				// [filter_model_category] => 
				// [filter_age] => 18,30
				// [filter_height] => 170,185
				// [filter_bust] => 90,130
				// [filter_waist] => 70,90
				// [filter_hips] => 90,130
				// [filter_shoe] => 38,45
				// [filter_eye_color] => 
				// [filter_hair_color] => 
				// [filter_search] => Search
			$whereclause = "";
			if($_GET["filter_location"]!="") $whereclause .= "user_id IN (SELECT user_id FROM model_profiles WHERE location_id ='".$_GET["filter_location"]."') AND ";
			if($_GET["filter_nationality"]!="") $whereclause .= "user_id IN (SELECT user_id FROM model_profiles WHERE nationality_id ='".$_GET["filter_nationality"]."') AND ";
			if($_GET["filter_model_category"]!="") $whereclause .= "user_id IN (SELECT user_id FROM model_profiles WHERE model_category_ids LIKE '%|".$_GET["filter_model_category"]."|%') AND ";
			$heights = explode(",",$_GET["filter_height"]);
			if($_GET["filter_height"]!="") $whereclause .= "user_id IN (SELECT user_id FROM model_profiles WHERE height >= '".$heights[0]."' AND height <= '".$heights[1]."') AND ";
			
			$busts = explode(",",$_GET["filter_bust"]);
			if($_GET["filter_bust"]!="") $whereclause .= "user_id IN (SELECT user_id FROM model_profiles WHERE bust >= '".$busts[0]."' AND bust <= '".$busts[1]."') AND ";
			if($whereclause != "") $whereclause = substr($whereclause,0,-4);
			
			
			$models = $db->fetch_all_data("model_files",[],$whereclause,"","30");
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
	</div>
	<script>
		$(document).ready(function ()
        {
            $('#waterfall').NewWaterfall({width: 220});
        });
	</script>
<?php include_once "main_container_end.php"; ?>
<?php include_once "footer.php"; ?>