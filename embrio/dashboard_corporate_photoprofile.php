<?php include_once "homepage_header.php"; ?>
<?php include_once "main_container.php"; ?>
<?php if($__role!="4") exit(); ?>
<h1 class="well"><?=v("change_corporate_logo");?></h1>
	<div class="col-lg-12 well">
	<?php $suffix = "profilelogo_".$__user_id;?>
	<?php $doneUrl = "dashboard.php";?>
	<?php include_once "model_photo_uploader.php"; ?>
</div>
<?php include_once "main_container_end.php"; ?>
<?php include_once "footer.php"; ?>