<?php include_once "homepage_header.php"; ?>
	<style>
		.video {
			position: relative;
			top: 0%; left: 0%;
			z-index: -100;
			min-width: 100%;
			min-height: 100%;
			width: auto;
			height: auto;
			transform: translate(0%, 0%);
			margin: 0;
			padding: 0;
			object-fit: fill;
		}
	</style>
	<!-- Top content -->
	<div class="top-content">
		<div class="container">
			<div class="backstretch" style="left: 0px; top: 0px; overflow: hidden; margin: 0px; padding: 0px; height: 704px; width: 1312px; z-index: -999998; position: absolute;">
				<div align="center" class="embed-responsive embed-responsive-16by9">
					<video autoplay loop class="embed-responsive-item">
						<source src="images/LoModel.mp4" type="video/mp4">
					</video>
				</div>
			</div>
		</div>
	</div>
	<div style="height:360px;"></div>
<?php $xmain_container_attr = 'position:relative;top:-450px;'; ?>	
<?php include_once "main_container.php"; ?>
	<div class="fadeInLeft animated">
		<span class="sub alt-font">Apa itu LoModel?</span>
		<h1><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</strong></h1>
		<p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
		<p class="lead">uis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	</div>
	<br>
	<div class="row">
		<table width="100%"><tr><td align="center"><h2>Models</h2></td></tr></table>
		<?php
			$models = $db->fetch_all_data("talent_files",[],"1=1 GROUP BY user_id ORDER BY rand()","","12");
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
<?php
	if($_GET["just_register_as"] == 2){ ?> <script> toastr.success('You have successfully registered as Personal User'); </script> <?php }
	if($_GET["just_register_as"] == 3){ ?> <script> toastr.success('You have successfully registered as Agency'); </script> <?php }
	if($_GET["just_register_as"] == 4){ ?> <script> toastr.success('You have successfully registered as Coorporate'); </script> <?php }
	if($_GET["just_register_as"] == 5){ ?> <script> toastr.success('You have successfully registered as Talen/Model'); </script> <?php }
?>
<script> window.history.pushState("","","index.php"); </script>
<?php include_once "footer.php"; ?>