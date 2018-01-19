<?php include_once "homepage_header.php"; ?>
<?php include_once "main_container.php"; ?>
<?php include_once "casting_action.php"; ?>
	<?php
		// [filter_keywords] => 
		// [filter_work_category] => 
		// [filter_model_category] => 
		// [filter_gender] => 
		// [filter_experience] => 0,5
		// [filter_age] => 18,30
		
		if($_GET["filter_search"] == "Search"){
			$cap_advanced_search = v("hide_advanced_search");
			$filter_area_style = "display:block;";
		} else {
			$cap_advanced_search = v("show_advanced_search");
			$filter_area_style = "display:none;";
		}
		$work_categories = $db->fetch_select_data("work_categories","id","name",[],["name"]);
		$work_categories[""] = "--All Job Categories--";
		ksort($work_categories);
		$model_categories = $db->fetch_select_data("model_categories","id","name_".$__locale,[],["name_".$__locale]);
		$model_categories[""] = "--All Model Categories--";
		ksort($model_categories);
		$genders = $db->fetch_select_data("genders","id","name");
		$genders[""] = "--All Genders--";
		ksort($genders);
		
		$whereclause = "is_publish = 1 AND date(NOW()) BETWEEN start_at AND end_at AND ";
		if($_GET["filter_keywords"]!="") $whereclause .= "(title LIKE '%".$_GET["filter_keywords"]."%' OR description LIKE '%".$_GET["filter_keywords"]."%' OR requirement LIKE '%".$_GET["filter_keywords"]."%') AND ";
		if($_GET["filter_work_category"]!="") $whereclause .= "work_category_ids LIKE '%|".$_GET["filter_work_category"]."|%' AND ";
		if($_GET["filter_model_category"]!="") $whereclause .= "model_category_ids LIKE '%|".$_GET["filter_model_category"]."|%' AND ";
		if($_GET["filter_gender"]!="") $whereclause .= "gender_ids LIKE '%|".$_GET["filter_gender"]."|%' AND ";
		if($_GET["filter_experience"]!=""){
			$experiences = explode(",",$_GET["filter_experience"]);
			$whereclause .= "experience_years BETWEEN '".$experiences[0]."' AND '".$experiences[1]."' AND ";
		}
		if($_GET["filter_age"]!=""){
			$ages = explode(",",$_GET["filter_age"]);
			$whereclause .= "(age_min <= '".$ages[1]."' AND age_max >= '".$ages[0]."') AND ";
		}
		
		if($_GET["filter_location"]!="") $whereclause .= "user_id IN (SELECT user_id FROM agency_profiles WHERE location_id IN (SELECT id FROM locations WHERE province_id IN (SELECT province_id FROM locations WHERE location_id = '".$_GET["filter_location"]."'))) AND ";
		if($whereclause != "") $whereclause = substr($whereclause,0,-4);
		
		$_GET["filter_experience"] = ($_GET["filter_experience"] != "") ? $_GET["filter_experience"] : "0,5";
		$_GET["filter_age"] = ($_GET["filter_age"] != "") ? $_GET["filter_age"] : "18,30";
	?>
	<div class="row">
		<div class="col-md-12" id="modelSearchArea">
			<div class="container">
				<form method="GET">
					<div class="col-md-8">
						<div style="padding:10px 0px 10px 0px;font-size:30px;"><?=v("job_search");?></div>
					</div>
					<div class="col-md-4">
						<div style="padding:10px 0px 10px 0px;float:right;"><?=$f->input("btn_advanced_search",$cap_advanced_search,"type='button'","btn btn-info");?></div>
					</div>
					<div class="col-md-12" style="<?=$filter_area_style;?>" id="filter_area">
						<div class="col-sm-6 fadeInRight animated">
							<div class="form-group">
								<?=$f->input("filter_keywords",$_GET["filter_keywords"],"placeholder='Keywords'","form-control");?><br>
								<?=$f->select("filter_work_category",$work_categories,$_GET["filter_work_category"],"","form-control");?><br>
								<?=$f->select("filter_model_category",$model_categories,$_GET["filter_model_category"],"","form-control");?><br>
							</div>
						</div>
						<div class="col-sm-6 fadeInRight animated">
							<div class="form-group">
								<?=$f->select("filter_gender",$genders,$_GET["filter_gender"],"","form-control");?><br>
								<label><?=v("experience");?> (<?=v("years");?>) : </label>
								<b>0&nbsp;&nbsp;</b><input id="filter_experience" name="filter_experience" style="width:150px;" type="text" class="span2" value="" data-slider-min="0" data-slider-max="10" data-slider-step="1" data-slider-value="[<?=$_GET["filter_experience"];?>]"/><b>&nbsp;&nbsp;10</b><br>
								<label><?=v("age");?> (<?=v("years");?>) : </label>
								<b>17&nbsp;&nbsp;</b><input id="filter_age" name="filter_age" style="width:150px;" type="text" class="span2" value="" data-slider-min="17" data-slider-max="70" data-slider-step="1" data-slider-value="[<?=$_GET["filter_age"];?>]"/><b>&nbsp;&nbsp;70</b><br>
							</div>
						</div>
						<div class="col-sm-12 fadeInRight animated">
							<div class="form-group">
								<?=$f->input("filter_search","Search","type='submit'","btn btn-lg btn-info");?>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<?php
			echo "<div class='col-md-12'>";
			if($__role == 3 || $__role == 4){
				echo $f->input("post_a_casting",v("post_a_job"),"type='button' onclick='window.location=\"dashboard.php?tabActive=jobs&post_a_job=1\"'","btn btn-lg btn-info");
			} else {
				echo $f->input("post_a_casting",v("post_a_job"),"type='button' onclick=\"toastr.warning('".v("you_have_to_registered_as_a_agency_or_corporate")."','',toastroptions);\"","btn btn-lg btn-info");
			}
			echo "</div>";
		
			$castings = $db->fetch_all_data("jobs",[],$whereclause,"start_at DESC","1000");
			if(count($castings) <= 0){
				echo "<div class='col-sm-12 '><br><span class='col-sm-12 well' style='color:red;'>".v("data_not_found")."</span></div>";
			} else {
				foreach($castings as $casting){
					$work_category_ids = "";
					foreach(pipetoarray($casting["work_category_ids"]) as $work_category_id){
						$work_category_ids .= $db->fetch_single_data("work_categories","name",["id" => $work_category_id]).", ";
					} $work_category_ids = substr($work_category_ids,0,-2);
					$model_category_ids = "";
					foreach(pipetoarray($casting["model_category_ids"]) as $model_category_id){
						$model_category_ids .= $db->fetch_single_data("model_categories","name_".$__locale,["id" => $model_category_id]).", ";
					} $model_category_ids = substr($model_category_ids,0,-2);
					$age = $casting["age_min"]." - ".$casting["age_max"];
					if($casting["image"] == "" || !file_exists("post_images/".$casting["image"])) $casting["image"] = "no_image.png";
					$job_giver_name = $js->get_fullname($casting["job_giver_user_id"]);
			?>									
					<div class="col-sm-6">
						<div class="row">
							<div class="col-sm-4">
								<img style="margin-top:10px" src="post_images/<?=$casting["image"];?>" width="100"><br>
								<b><?=$job_giver_name;?></b>
							</div>
							<div class="col-sm-8">
								<div><h3><?=$casting["title"];?></h3></div>
								<?php if($casting["casting_start"] != "0000-00-00" && $casting["casting_end"] != "0000-00-00"){ ?>
									<div>Casting at : <?=format_tanggal($casting["casting_start"],"d M Y");?> to <?=format_tanggal($casting["casting_end"],"d M Y");?></div>
								<?php } else { ?>
									<div>&nbsp;</div>
								<?php } ?>
								<?php if($casting["start_at"] != "0000-00-00" && $casting["end_at"] != "0000-00-00"){ ?>
									<div>Event at : <?=format_tanggal($casting["start_at"],"d M Y");?> to <?=format_tanggal($casting["end_at"],"d M Y");?></div>
								<?php } else { ?>
									<div>&nbsp;</div>
								<?php } ?>
								<div>Categories : <?=$work_category_ids;?></div>
								<div>For : <?=$model_category_ids;?></div>
								<div>age : <?=$age;?></div>
								<div class="col-sm-12"><br></div>
								<div class="col-sm-12">
									<?=$f->input("detail","Detail","onclick=\"showJobDetail('".$casting["id"]."');\" type='button' style='width:100%;'","btn btn-lg btn-info");?>
								</div>
							</div>
						</div>
					</div>
			<?php } ?>
		<?php } ?>
	</div>
	<script>
		$("#filter_experience").slider({}); 
		$("#filter_age").slider({}); 
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
<br>
<?php include_once "main_container_end.php"; ?>
<?php include_once "footer.php"; ?>