<?php include_once "homepage_header.php"; ?>
<?php $xmain_container_attr = 'position:relative;top:-450px;'; ?>	
<?php include_once "main_container.php"; ?>
	<div class="row">
		<h2><?=$db->fetch_single_data("talent_profiles","concat(first_name,' ',middle_name,' ',last_name)",["user_id" => $_GET["id"]]);?></h2>
		<?php 
			$model = $db->fetch_all_data("talent_files",[],"user_id='".$_GET["id"]."'")[0];
		?>
		<img height="400" src="user_images/<?=$model["filename"];?>">
	</div>

<?php include_once "main_container_end.php"; ?>
<?php include_once "footer.php"; ?>