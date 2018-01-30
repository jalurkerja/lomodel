<?php include_once "head.php";?>
<div class="bo_title">Registrar Detail</div>
<?php
	$user = $db->fetch_all_data("a_users",[],"id='".$_GET["id"]."'")[0];
	
?>
<?=$t->start("","editor_content");?>
	<?=$t->row(array("Email",$user["email"]));?>
	<?=$t->row(array("Categories",$work_category_ids));?>
	<?=$t->row(array("Model Categories",$model_category_ids));?>
	<?=$t->row(array("Description",str_replace(chr(13).chr(10),"<br>",$job["description"])));?>
	<?=$t->row(array("Requirement",str_replace(chr(13).chr(10),"<br>",$job["requirement"])));?>
	<?=$t->row(array("Experience",$job["experience_years"]." year(s)"));?>
	<?=$t->row(array("Gender",$gender_ids));?>
	<?=$t->row(array("Age",$age));?>
	<?=$t->row(array("Date",$date));?>
	<?=$t->row(array("",$photo));?>
<?=$t->end();?>
<?php if($job["is_publish"] == "0") { ?>
	<?=$f->input("publish","Publish",'onclick="window.location=\'?id='.$_GET["id"].'&is_publish=1\';" type="button"');?>
	<?=$f->input("reject","Reject",'onclick="window.location=\'?id='.$_GET["id"].'&is_publish=2\';" type="button"');?>
<?php } ?>
<?=$f->input("back","Back",'onclick="window.location=\'registrars_list.php\';" type="button"');?>
<?php include_once "footer.php";?>