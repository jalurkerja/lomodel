<?php include_once "homepage_header.php"; ?>
<?php
	if(!$__isloggedin){
		?> <script> window.location = "index.php"; </script> <?php
		exit();
	}
?>
<?php include_once "main_container.php"; ?>
	<style>
		.tbl_detail td{
			padding-right:30px;
			text-align:center;
		}
	</style>
	<?php if($__role == "2") include_once "dashboard_personal.php"; ?>
	<?php if($__role == "3") include_once "dashboard_agency.php"; ?>
	<?php if($__role == "4") include_once "dashboard_corporate.php"; ?>
	<?php if($__role == "5") include_once "dashboard_model.php"; ?>

<?php include_once "main_container_end.php"; ?>
<?php include_once "footer.php"; ?>