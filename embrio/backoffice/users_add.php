<?php include_once "head.php";?>
<div class="bo_title">Add User</div>
<?php
	if(isset($_POST["save"])){
		if($_POST["role"] >= 1 && $_POST["role"] <= 3) $_POST["group_id"] = "-1";
		$db->addtable("a_users");
		$db->addfield("group_id");				$db->addvalue(@$_POST["group_id"]);
		$db->addfield("email");					$db->addvalue(@$_POST["email"]);
		$db->addfield("password");				$db->addvalue(base64_encode(@$_POST["password"]));
		$db->addfield("name");					$db->addvalue(@$_POST["name"]);
		$db->addfield("role");					$db->addvalue(@$_POST["role"]);
		$db->addfield("created_at");			$db->addvalue(date("Y-m-d H:i:s"));
		$db->addfield("created_by");			$db->addvalue($__username);
		$db->addfield("created_ip");			$db->addvalue($_SERVER["REMOTE_ADDR"]);
		$db->addfield("updated_at");			$db->addvalue(date("Y-m-d H:i:s"));
		$db->addfield("updated_by");			$db->addvalue($__username);
		$db->addfield("updated_ip");			$db->addvalue($_SERVER["REMOTE_ADDR"]);
		$inserting = $db->insert();
		if($inserting["affected_rows"] >= 0){
			$insert_id = $inserting["insert_id"];
			javascript("alert('Data Saved');");
			javascript("window.location='".str_replace("_add","_list",$_SERVER["PHP_SELF"])."';");
		} else {
			echo $inserting["error"];
			javascript("alert('Saving data failed');");
		}
	}
	
	$txt_email 			= $f->input("email",@$_POST["email"]);
	$sel_group 			= $f->select("group_id",$db->fetch_select_data("a_groups","id","name",null,array("name")));
	$txt_password 		= $f->input("password","","type='password'");
	$txt_name 			= $f->input("name",@$_POST["name"]);
	$sel_role 			= $f->select("role",[""=>"","1"=>"Bank","2"=>"Investor","3"=>"Developer","999"=>"BO User"],@$_GET["role"]);
?>
<?=$f->start();?>
	<?=$t->start("","editor_content");?>
        <?=$t->row(array("Group",$sel_group));?>
		<?=$t->row(array("Email",$txt_email));?>
		<?=$t->row(array("Password",$txt_password));?>
		<?=$t->row(array("Name",$txt_name));?>
		<?=$t->row(array("Role",$sel_role));?>
	<?=$t->end();?>
	<?=$f->input("save","Save","type='submit'");?> <?=$f->input("back","Back","type='button' onclick=\"window.location='".str_replace("_add","_list",$_SERVER["PHP_SELF"])."';\"");?>
<?=$f->end();?>
<?php include_once "footer.php";?>