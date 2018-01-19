<?php include_once "homepage_header.php"; ?>
<?php include_once "main_container.php"; ?>
<?php
	if($_GET["filter_search"] == "Search"){
		$cap_advanced_search = v("hide_advanced_search");
		$filter_area_style = "display:block;";
	} else {
		$cap_advanced_search = v("show_advanced_search");
		$filter_area_style = "display:none;";
	}
?>
	<div class="row">
		<div class="col-md-12" id="modelSearchArea">
			<div class="container">
				<form method="GET">
					<div class="col-md-8">
						<div style="padding:10px 0px 10px 0px;font-size:30px;"><?=v("agency_search");?></div>
					</div>
					<div class="col-md-4">
						<div style="padding:10px 0px 10px 0px;float:right;"><?=$f->input("btn_advanced_search",$cap_advanced_search,"type='button'","btn btn-info");?></div>
					</div>
					<div class="col-md-12" style="<?=$filter_area_style;?>" id="filter_area">
						<div class="col-sm-12 fadeInRight animated">
							<div class="form-group">
								<?php 
									$nationalities = $db->fetch_select_data("nationalities","id","name");
									$nationalities[""] = "--All Nationalities--";
									ksort($nationalities);
									$locations = $db->fetch_select_data("locations","id","name_".$__locale,["location_id" => "0","province_id" => "0:>"]);
									$locations[""] = "--All Locations--";
									ksort($locations);
								?>
								<?=$f->input("filter_keywords",$_GET["filter_keywords"],"placeholder='Keywords'","form-control");?><br>
								<?=$f->select("filter_nationality",$nationalities,$_GET["filter_nationality"],"","form-control");?><br>
								<?=$f->select("filter_location",$locations,$_GET["filter_location"],"","form-control");?><br>
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
		<div class="col-md-12">
		<ul id="waterfall">
		<?php
			$whereclause = "user_id IN (SELECT id FROM a_users WHERE role='3' AND verified = '1') AND ";
			if($_GET["filter_keywords"]!="") $whereclause .= "user_id IN (SELECT user_id FROM agency_profiles WHERE name LIKE '%".$_GET["filter_keywords"]."%') AND ";
			if($_GET["filter_location"]!="") $whereclause .= "user_id IN (SELECT user_id FROM agency_profiles WHERE location_id IN (SELECT id FROM locations WHERE province_id IN (SELECT province_id FROM locations WHERE location_id = '".$_GET["filter_location"]."'))) AND ";
			if($_GET["filter_nationality"]!="") $whereclause .= "user_id IN (SELECT user_id FROM agency_profiles WHERE nationality_id ='".$_GET["filter_nationality"]."') AND ";
			if($whereclause != "") $whereclause = substr($whereclause,0,-4);
			
			$agencies = $db->fetch_all_data("agency_profiles",[],$whereclause,"","300");
			$ii = -1;
			foreach($agencies as $agency){
				$ii++;
				$name = $agency["name"];
				$location = $db->fetch_single_data("locations","name_".$__locale,["id" => $agency["location_id"]]);
				$nationality = $db->fetch_single_data("nationalities","name",["id" => $agency["nationality_id"]]);
		?>
			<li>
				<div class="thumbnail" style="margin:4px;cursor:pointer;" onclick="window.location='agency_details.php?id=<?=$agency["user_id"];?>';">
					<img style="max-width: 200px;" src="user_images/<?=$agency["photo"];?>">
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