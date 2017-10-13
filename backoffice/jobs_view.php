<?php include_once "head.php";?>
<?php
	if($_GET["is_publish"]){
		$db->addtable("jobs");		$db->where("id",$_GET["id"]);
		$db->addfield("is_publish");$db->addvalue($_GET["is_publish"]);
		$db->addfield("publish_at");$db->addvalue($__now);
		$db->addfield("publish_by");$db->addvalue($__username);
		$db->update();
	}
?>
<div class="bo_title">Posted Castings</div>
<?php
	if(isset($_GET["publish"])){		
		$db->addtable("jobs");				$db->where("id",$_GET["id"]);
		$db->addfield("is_publish");		$db->addvalue($_GET["publish"]);
		$db->addfield("publish_at");		$db->addvalue($__now);
		$db->addfield("publish_by");		$db->addvalue($__username);
		$updating = $db->update();
		if($updating["affected_rows"] >= 0){
			javascript("alert('Data Berhasil tersimpan');");
			javascript("window.location='".str_replace("_view","_list",$_SERVER["PHP_SELF"])."';");
		} else {
			echo $updating["error"];
			javascript("alert('Data gagal tersimpan');");
		}
	}
	
	$job = $db->fetch_all_data("jobs",[],"id='".$_GET["id"]."'")[0];
	
	$work_category_ids = "";
	foreach(pipetoarray($job["work_category_ids"]) as $work_category_id){
		$work_category_ids .= $db->fetch_single_data("work_categories","name",["id" => $work_category_id]).", ";
	} $work_category_ids = substr($work_category_ids,0,-2);
	$model_category_ids = "";
	foreach(pipetoarray($job["model_category_ids"]) as $model_category_id){
		$model_category_ids .= $db->fetch_single_data("model_categories","name_".$__locale,["id" => $model_category_id]).", ";
	} $model_category_ids = substr($model_category_ids,0,-2);
	$gender_ids = "";
	foreach(pipetoarray($job["gender_ids"]) as $gender_id){
		$gender_ids .= $db->fetch_single_data("genders","name",["id" => $gender_id]).", ";
	} $gender_ids = substr($gender_ids,0,-2);
	$age = $job["age_min"]." - ".$job["age_max"];
	$date = format_tanggal($job["start_at"])." - ".format_tanggal($job["end_at"]);
	$photo = "<img src=\"../post_images/".$job["image"]."\" width=\"100\">";
?>
<h3><b>Post a Casting</b></h3><br>
<?=$t->start("","editor_content");?>
	<?=$t->row(array("Title",$job["title"]));?>
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
<?php if($job["is_publish"] == "1") echo "<b>Published at ".format_tanggal($job["publish_at"])."</b><br>"; ?>
<?php if($job["is_publish"] == "2") echo "<b>Rejected at ".format_tanggal($job["publish_at"])."</b><br>"; ?>
<?=$f->input("back","Back",'onclick="window.location=\'jobs_list.php\';" type="button"');?>
<?php include_once "footer.php";?>