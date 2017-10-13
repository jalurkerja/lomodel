<?php
	if(isset($_POST["posting"])){
		$age = explode(",",$_POST["age"]);
		$db->addtable("jobs");
		$db->addfield("title");				$db->addvalue($_POST["title"]);
		$db->addfield("job_giver_user_id");	$db->addvalue($__user_id);
		$db->addfield("work_category_ids");	$db->addvalue(sel_to_pipe($_POST["work_category_ids"]));
		$db->addfield("model_category_ids");$db->addvalue(sel_to_pipe($_POST["model_category_ids"]));
		$db->addfield("description");		$db->addvalue($_POST["description"]);
		$db->addfield("requirement");		$db->addvalue($_POST["requirement"]);
		$db->addfield("experience_years");	$db->addvalue($_POST["experience_years"]);
		$db->addfield("gender_ids");		$db->addvalue(sel_to_pipe($_POST["gender_ids"]));
		$db->addfield("age_min");			$db->addvalue($age[0]);
		$db->addfield("age_max");			$db->addvalue($age[1]);
		$db->addfield("start_at");			$db->addvalue($_POST["start_at"]);
		$db->addfield("end_at");			$db->addvalue($_POST["end_at"]);
		$inserting = $db->insert();
		if($inserting["affected_rows"] > 0){
			$job_id = $inserting["insert_id"];
			if($_FILES["image"]["tmp_name"]){
				$filename = $__user_id."_".$job_id.".".pathinfo(strtolower($_FILES["image"]["name"]), PATHINFO_EXTENSION);
				$image_path = "post_images/".$filename;
				move_uploaded_file($_FILES["image"]["tmp_name"], $image_path);
				$db->addtable("jobs");			$db->where("id",$job_id);
				$db->addfield("image");			$db->addvalue($filename);
				$db->update();
			}
			$_SESSION["message"] = "Posting a casting successfully saved, please wait for publishing process from us";
		}
		?>
			<form method="POST" id="frmRefresh">
				<input type="hidden" name="tabActive" value="castings">
			</form>
			<script> frmRefresh.submit(); </script>
		<?php
		exit();
	}
?>