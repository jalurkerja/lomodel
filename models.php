<?php include_once "homepage_header.php"; ?>
<?php $xmain_container_attr = 'position:relative;top:-450px;'; ?>	
<?php include_once "main_container.php"; ?>
	<div class="row">
		<table width="100%"><tr><td align="center"><h2>Models</h2></td></tr></table>
		<?php
			$wherclause = "";
			if($_GET["category"]!="") $wherclause = "user_id IN (SELECT user_id FROM talent_profiles WHERE talent_category_ids LIKE '%|".$_GET["category"]."|%')";
			$models = $db->fetch_all_data("talent_files",[],$wherclause,"","30");
			$ii = -1;
			foreach($models as $model){
				$ii++;
				$talent_profile = $db->fetch_all_data("talent_profiles",[],"user_id = '".$model["user_id"]."'")[0];
				$name = $talent_profile["first_name"]." ".$talent_profile["middle_name"]." ".$talent_profile["last_name"];
				$nationality = $db->fetch_single_data("nationalities","name",["id" => $talent_profile["nationality_id"]]);
				$hair_color = $db->fetch_single_data("hair_colors","name",["id" => $talent_profile["hair_color_id"]]);
				$eye_color = $db->fetch_single_data("eye_colors","name",["id" => $talent_profile["eye_colors_id"]]);
				$categories = "";
				$talent_category_ids = pipetoarray($talent_profile["talent_category_ids"]);
				foreach($talent_category_ids as $talent_category_id){ $categories .= $db->fetch_single_data("talent_categories","name",["id" => $talent_category_id]).","; }
				$categories = substr($categories,0,-1);
		?>
			<div class="col-sm-4 features wow fadeInRight animated"> 				
				<div class="toolTip">
					<img height="400" src="user_images/<?=$model["filename"];?>">
					<span class="tooltiptext">
						<h3><?=$name;?></h3>
						<?=$nationality;?>
						<br>Hair Color: <?=$hair_color;?>
						<br>Eye Color: <?=$eye_color;?>
						<br>Height: <?=$talent_profile["height"];?>cm
						<br>Bust: <?=$talent_profile["bust"];?>cm
						<br>Waist: <?=$talent_profile["waist"];?>cm
						<br>Hips: <?=$talent_profile["hips"];?>cm
						<br>Shoe: <?=$talent_profile["shoe"];?>cm
						<br>Categories: <?=$categories;?>
						<div id="btn"><?=$f->input("btn_more","More","type='button' onclick=\"window.location='model_details.php?id=".$model["user_id"]."';\"","btn btn-link-1");?></div>
					</span>
				</div>
			</div>
		<?php } ?>
	</div>

<?php include_once "main_container_end.php"; ?>
<?php include_once "footer.php"; ?>