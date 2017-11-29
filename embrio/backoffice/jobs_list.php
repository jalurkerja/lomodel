<?php include_once "head.php";?>
<div class="bo_title">Castings</div>
<div id="bo_expand" onclick="toogle_bo_filter();">[+] View Filter</div>
<div id="bo_filter">
	<div id="bo_filter_container">
		<?=$f->start("filter","GET");?>
			<?=$t->start();?>
			<?=$t->end();?>
		<?=$f->end();?>
	</div>
</div>

<?php
	$whereclause = "";
	if(@$_GET["txt_date"]!="") $whereclause .= "created_at LIKE '%".$_GET["txt_date"]."%' AND ";
	
	if(@$_GET["sel_mode"]!="") $whereclause .= "(mode = '".$_GET["sel_mode"]."') AND ";
	
	$db->addtable("jobs");
	if($whereclause != "") $db->awhere(substr($whereclause,0,-4));$db->limit($_max_counting);
	$maxrow = count($db->fetch_data(true));
	$start = getStartRow(@$_GET["page"],$_rowperpage);
	$paging = paging($_rowperpage,$maxrow,@$_GET["page"],"paging");
	
	$db->addtable("jobs");
	if($whereclause != "") $db->awhere(substr($whereclause,0,-4));$db->limit($start.",".$_rowperpage);
	if(@$_GET["sort"] != "") $db->order($_GET["sort"]);
	$jobs = $db->fetch_data(true);
?>
	<?=$paging;?>
	<?=$t->start("","data_content");?>
	<?=$t->header(array("No",
						"<div onclick=\"sorting('title');\">Title</div>",
						"Categories",
						"Model Categories",
						"<div onclick=\"sorting('start_at');\">Date</div>",
						"<div onclick=\"sorting('is_publish');\">Status</div>",
						""));?>
	<?php foreach($jobs as $no => $job){ ?>
		<?php
			if($job["is_publish"] == "0") $status = "<font color='red'><b>Un Publish</b></font>";
			if($job["is_publish"] == "1") $status = "<font color='blue'><b>Published</b></font>";
			if($job["is_publish"] == "2") $status = "<font color='magenta'><b>Canceled</b></font>";
			
			$work_category_ids = "";
			foreach(pipetoarray($job["work_category_ids"]) as $work_category_id){
				$work_category_ids .= $db->fetch_single_data("work_categories","name",["id" => $work_category_id]).", ";
			} $work_category_ids = substr($work_category_ids,0,-2);
			$model_category_ids = "";
			foreach(pipetoarray($job["model_category_ids"]) as $model_category_id){
				$model_category_ids .= $db->fetch_single_data("model_categories","name_".$__locale,["id" => $model_category_id]).", ";
			} $model_category_ids = substr($model_category_ids,0,-2);
			
			$actions = "<a href=\"jobs_view.php?id=".$job["id"]."\">Detail</a>";
		?>
		<?=$t->row(
					array("<a href=\"jobs_view.php?id=".$job["id"]."\">".($no+$start+1)."</a>",
						$job["title"],
						$work_category_ids,
						$model_category_ids,
						format_tanggal($job["start_at"],"dMY")." - ".format_tanggal($job["end_at"],"dMY"),
						$status,
						$actions),
					array("align='right' valign='top'","","","","","","align='right' valign='top'","align='right' valign='top'","align='right' valign='top'","")
				);?>
	<?php } ?>
	<?=$t->end();?>
	<?=$paging;?>
	
<?php include_once "footer.php";?>