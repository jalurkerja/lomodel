<?php include_once "head.php";?>
<?php include_once "main_container.php"; ?>
<div class="container">
	<h2 class="well"><?=v("edit_profile");?></h2>
	<?php 
		if(isset($_POST["save"])){
			$table_name = "personal_profiles";
			$fields_name = ["name","idcard","address","location_id","zipcode","phone","cellphone","web","nationality_id","gender_id","ig","fb","tw","about"];
			$db->addtable($table_name);		$db->where("user_id",$__user_id);
			foreach($fields_name as $field_name){
				$db->addfield($field_name);		$db->addvalue($_POST[$field_name]);
			}
			$updating = $db->update(); 
			if($updating["affected_rows"] > 0){
				$_SESSION["message"] = v("profile_updated_successfully");
				?><script> window.location = "dashboard.php"; </script><?php
				exit();
			}
		}
		$_step = 1;
		$_regrole = 2;
		$keyToNextCol = 5;
		$_mode = "editing";
		$_data = $db->fetch_all_data("personal_profiles",[],"user_id='".$__user_id."'")[0];
	?>
</div>
<div class="container fadeInLeft animated">
	<div class="col-lg-12 well">
		<form role="form" method="POST" autocomplete="off" onsubmit="return validation()" enctype="multipart/form-data">	
		<?php include_once "register_form.php"; ?>
		<table width="100%"><tr><td align="right"> <?=$f->input("save",v("save"),"type='submit' style='width:100%;'","btn btn-lg btn-info");?> </td></tr></table>
		</form>
	</div>
</div>
<?php include_once "main_container_end.php"; ?>
<?php include_once "footer.php"; ?>