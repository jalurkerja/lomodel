<div class="container fadeInLeft animated">
	<h1 class="well"><?=v("setup_your_profile_photo");?></h1>
	<div class="col-lg-12 well">
		<?php $suffix = "profilephoto_".$__user_id;?>
		<?php $doneUrl = "dashboard.php";?>
		<?php include_once "model_photo_uploader.php";?>
	</div>
</div>