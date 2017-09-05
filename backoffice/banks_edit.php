<?php include_once "head.php";?>
<div class="bo_title">Add Bank</div>
<?php
	if(isset($_POST["save"])){
		if($_POST["role"] >= 1 && $_POST["role"] <= 3) $_POST["group_id"] = "-1";
		$db->addtable("banks");			$db->where("id",$_GET["id"]);
		$db->addfield("user_id");		$db->addvalue(@$_POST["user_id"]);
		$db->addfield("name");			$db->addvalue(@$_POST["name"]);
		$db->addfield("pic");			$db->addvalue(@$_POST["pic"]);
		$db->addfield("phone");			$db->addvalue(@$_POST["phone"]);
		$db->addfield("updated_at");	$db->addvalue(date("Y-m-d H:i:s"));
		$inserting = $db->update();
		if($inserting["affected_rows"] >= 0){
			$insert_id = $inserting["insert_id"];
			javascript("alert('Data Saved');");
			javascript("window.location='".str_replace("_edit","_list",$_SERVER["PHP_SELF"])."';");
		} else {
			echo $inserting["error"];
			javascript("alert('Saving data failed');");
		}
	}
	
	$banks		= $db->fetch_all_data("banks",[],"id='".$_GET["id"]."'")[0];
	$sel_user	= $f->select("user_id",$db->fetch_select_data("a_users","id","concat(name,' [',email,']')",["role"=>"1"],["name"]),$banks["user_id"]);
	$txt_name 	= $f->input("name",$banks["name"]);
	$txt_pic 	= $f->input("pic",$banks["pic"]);
	$txt_phone	= $f->input("phone",$banks["phone"]);
?>
<?=$f->start();?>
	<?=$t->start("","editor_content");?>
        <?=$t->row(array("User",$sel_user));?>
		<?=$t->row(array("Name",$txt_name));?>
		<?=$t->row(array("PIC",$txt_pic));?>
		<?=$t->row(array("phone",$txt_phone));?>
	<?=$t->end();?>
	<?=$f->input("save","Save","type='submit'");?> <?=$f->input("back","Back","type='button' onclick=\"window.location='".str_replace("_edit","_list",$_SERVER["PHP_SELF"])."';\"");?>
<?=$f->end();?>
<?php include_once "footer.php";?>