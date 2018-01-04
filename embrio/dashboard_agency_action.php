<script>	
	function showApplicants(id){
		$.get( "ajax/casting_applicants.php?id="+id, function(modalBody) {
			modalFooter = "<button type=\"button\" class=\"btn btn-danger\" data-dismiss=\"modal\">Close</button>";
			$('#modalTitle').html("Applicants");
			$('#modalBody').html(modalBody);
			$('#modalFooter').html(modalFooter);
			$('#myModal').modal('show');
		});
	}
	
	function deleteJob(id){
		if(confirm("<?=v("confirm_message_delete_a_job");?>")){
			$.get( "ajax/casting_action.php?mode=delete&id="+id, function(data) {
				if(data > 0){ window.location="?tabActive=jobs" }
			});
		}
	}
	
	function showJobDetail(id){
		$.get( "ajax/casting_detail.php?id="+id, function(modalBody) {
			$.get( "ajax/casting_action.php?mode=isApplied&id="+id, function(isApplied) {
				modalFooter = "";
				if(isApplied.substring(0, 1) == "0" && isApplied.substring(1, 2) != ""){
					modalFooter = "";					
				} else {
					isApplied = isApplied.substring(1, 2);
					if(isApplied > 0){
						modalFooter += "<button type=\"button\"  class=\"btn\">Applied</button>";
					} else {
						modalFooter += "<button type=\"button\" onclick=\"apply('"+id+"');\" class=\"btn btn-success\">Apply</button>";
					}
				}
				modalFooter += "<button type=\"button\" class=\"btn btn-danger\" data-dismiss=\"modal\">Close</button>";
				$('#modalTitle').html("Casting Detail");
				$('#modalBody').html(modalBody);
				$('#modalFooter').html(modalFooter);
				$('#myModal').modal('show');
			});
		});
	}
</script>
<?php
	if(isset($_POST["posting"])){
		$age = explode(",",$_POST["age"]);
		$db->addtable("jobs");
		if($_GET["editing"]){
			$db->where("id",$_GET["editing"]);
			$db->where("job_giver_user_id",$__user_id);
		}
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
		$db->addfield("casting_start");		$db->addvalue($_POST["casting_start"]);
		$db->addfield("casting_end");		$db->addvalue($_POST["casting_end"]);
		$db->addfield("start_at");			$db->addvalue($_POST["start_at"]);
		$db->addfield("end_at");			$db->addvalue($_POST["end_at"]);
		if($_GET["editing"]){
			$inserting = $db->update();
			$inserting["insert_id"] = $_GET["editing"];
		} else {
			$inserting = $db->insert();
		}
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
			$_SESSION["message"] = v("success_message_post_a_job");
		}
		?> <script> window.location="?tabActive=jobs" </script> <?php
		exit();
	}
?>