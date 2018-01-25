<?php include_once "homepage_header.php"; ?>
<?php include_once "main_container.php"; ?>
<?php
	if($_GET["filter_search"] == "Search" && isset($_GET["filter_location"])){
		$cap_advanced_search = v("hide_advanced_search");
		$filter_area_style = "display:block;";
	} else {
		$cap_advanced_search = v("show_advanced_search");
		$filter_area_style = "display:none;";
	}
	$whereclause = "SELECT id FROM a_users WHERE role='5' AND verified = '1' AND ";
	if($_GET["filter_gender"]!="") $whereclause .= "gender_id ='".$_GET["filter_gender"]."' AND ";
	if($_GET["filter_nationality"]!="") $whereclause .= "nationality_id ='".$_GET["filter_nationality"]."' AND ";
	if($_GET["filter_location"]!="") $whereclause .= "location_id IN (SELECT id FROM locations WHERE province_id IN (SELECT province_id FROM locations WHERE id = '".$_GET["filter_location"]."')) AND ";
	if($_GET["filter_model_category"]!="") $whereclause .= "model_category_ids = '".$_GET["filter_model_category"]."' AND ";
	if($_GET["filter_age"]!=""){
		$ages = explode(",",$_GET["filter_age"]);
		$whereclause .= "DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(birth_at)), '%Y')+0 BETWEEN '".$ages[0]."' AND '".$ages[1]."' AND ";
	}
	if($_GET["filter_height"]!=""){
		$heights = explode(",",$_GET["filter_height"]);
		$whereclause .= "height BETWEEN '".$heights[0]."' AND '".$heights[1]."' AND ";
	}
	if($_GET["filter_chest"]!=""){
		$chests = explode(",",$_GET["filter_chest"]);
		$whereclause .= "chest BETWEEN '".$chests[0]."' AND '".$chests[1]."' AND ";
	}
	if($_GET["filter_waist"]!=""){
		$waists = explode(",",$_GET["filter_waist"]);
		$whereclause .= "waist BETWEEN '".$waists[0]."' AND '".$waists[1]."' AND ";
	}
	if($_GET["filter_hips"]!=""){
		$hips = explode(",",$_GET["filter_hips"]);
		$whereclause .= "hips BETWEEN '".$hips[0]."' AND '".$hips[1]."' AND ";
	}
	if($_GET["filter_shoe"]!=""){
		$shoes = explode(",",$_GET["filter_shoe"]);
		$whereclause .= "shoe BETWEEN '".$shoes[0]."' AND '".$shoes[1]."' AND ";
	}
	if($whereclause != "") $whereclause = "user_id IN (".substr($whereclause,0,-4).")";
	
	$_GET["filter_age"] = ($_GET["filter_age"] != "") ? $_GET["filter_age"] : "18,30";
	$_GET["filter_height"] = ($_GET["filter_height"] != "") ? $_GET["filter_height"] : "170,185";
	$_GET["filter_chest"] = ($_GET["filter_chest"] != "") ? $_GET["filter_chest"] : "90,130";
	$_GET["filter_waist"] = ($_GET["filter_waist"] != "") ? $_GET["filter_waist"] : "70,90";
	$_GET["filter_hips"] = ($_GET["filter_hips"] != "") ? $_GET["filter_hips"] : "90,130";
	$_GET["filter_shoe"] = ($_GET["filter_shoe"] != "") ? $_GET["filter_shoe"] : "38,45";
?>
	<div class="row">
		<div class="col-md-12" id="modelSearchArea">
			<div class="container">
				<form method="GET">
					<div class="col-md-8">
						<div style="padding:10px 0px 10px 0px;font-size:30px;"><?=v("model_search");?></div>
					</div>
					<div class="col-md-4">
						<div style="padding:10px 0px 10px 0px;float:right;"><?=$f->input("btn_advanced_search",$cap_advanced_search,"type='button'","btn btn-info");?></div>
					</div>
					<div class="col-md-12" style="<?=$filter_area_style;?>" id="filter_area">
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
									$hair_colors[""] = "--All Hair Colors--";
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
								<label><?=v("age");?> : </label>
								<b>17&nbsp;&nbsp;</b><input id="filter_age" name="filter_age" style="width:150px;" type="text" class="span2" value="" data-slider-min="17" data-slider-max="70" data-slider-step="1" data-slider-value="[<?=$_GET["filter_age"];?>]"/><b>&nbsp;&nbsp;70</b><br>
								
								<label><?=v("height");?> (cm) : </label>
								<b>150&nbsp;</b><input id="filter_height" name="filter_height" style="width:150px;" type="text" class="span2" value="" data-slider-min="150" data-slider-max="250" data-slider-step="1" data-slider-value="[<?=$_GET["filter_height"];?>]"/><b>&nbsp;250</b><br>
								
								<label><?=v("chest_size");?> (cm) : </label>
								<b>65&nbsp;</b><input id="filter_chest" name="filter_chest" style="width:150px;" type="text" class="span2" value="" data-slider-min="65" data-slider-max="150" data-slider-step="1" data-slider-value="[<?=$_GET["filter_chest"];?>]"/><b>&nbsp;150</b><br>
								
							</div>
						</div>
						<div class="col-sm-3 fadeInRight animated">
							<div class="form-group">
								<label><?=v("waist_size");?> (cm) : </label>
								<b>50&nbsp;</b><input id="filter_waist" name="filter_waist" style="width:150px;" type="text" class="span2" value="" data-slider-min="50" data-slider-max="110" data-slider-step="1" data-slider-value="[<?=$_GET["filter_waist"];?>]"/><b>&nbsp;110</b><br>
								
								<label><?=v("hips_size");?> (cm) : </label>
								<b>65&nbsp;</b><input id="filter_hips" name="filter_hips" style="width:150px;" type="text" class="span2" value="" data-slider-min="65" data-slider-max="150" data-slider-step="1" data-slider-value="[<?=$_GET["filter_hips"];?>]"/><b>&nbsp;150</b><br>
								
								<label><?=v("shoe_size");?> : </label>
								<b>36&nbsp;</b><input id="filter_shoe" name="filter_shoe" style="width:150px;" type="text" class="span2" value="" data-slider-min="36" data-slider-max="49" data-slider-step="1" data-slider-value="[<?=$_GET["filter_shoe"];?>]"/><b>&nbsp;49</b><br>
								
								<script> 
									$("#filter_age").slider({}); 
									$("#filter_height").slider({}); 
									$("#filter_chest").slider({}); 
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
								<?=$f->input("filter_search","Search","type='submit'","btn btn-lg btn-info");?>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="col-md-12">
			<ul id="waterfall">
			<?php
				$models = $db->fetch_all_data("model_profiles",[],$whereclause,"","300");
				$ii = -1;
				foreach($models as $model){
					$ii++;
					$name = $model["first_name"]." ".$model["middle_name"]." ".$model["last_name"];
					$location = $db->fetch_single_data("locations","name_".$__locale,["id" => $model["location_id"]]);
					$nationality = $db->fetch_single_data("nationalities","name",["id" => $model["nationality_id"]]);
					$hair_color = $db->fetch_single_data("hair_colors","name",["id" => $model["hair_color_id"]]);
					$eye_color = $db->fetch_single_data("eye_colors","name",["id" => $model["eye_colors_id"]]);
					$categories = "";
					$model_category_ids = pipetoarray($model["model_category_ids"]);
					foreach($model_category_ids as $model_category_id){ $categories .= $db->fetch_single_data("model_categories","name",["id" => $model_category_id]).","; }
					$categories = substr($categories,0,-1);
			?>
				<li>
					<div class="thumbnail" style="margin:4px;cursor:pointer;" onclick="window.location='model_details.php?user_id=<?=$model["user_id"];?>';">
						<img style="max-width: 200px;" src="user_images/<?=$model["photo"];?>">
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
		
		function toggle_search_area(){
			if($("#filter_area").css('display') == "none"){
				$("#filter_area").show(1000);
				$("#btn_advanced_search").val("<?=v("hide_advanced_search");?>");
			} else {
				$("#filter_area").hide(1000);
				$("#btn_advanced_search").val("<?=v("show_advanced_search");?>");
			}
		}
		$("#btn_advanced_search").click(function() { toggle_search_area(); });
	</script>
<?php include_once "main_container_end.php"; ?>
<?php include_once "footer.php"; ?>