<?php include_once "homepage_header.php"; ?>
<?php include_once "main_container.php"; ?>
	<?=$f->input("post_a_casting","Post a casting","type='button' onclick='window.location=\"dashboard.php?tabActive=post_a_casting\"'","btn btn-lg btn-info");?>
	<div class="row">
		<?php 
			$castings = $db->fetch_all_data("jobs",[],"is_publish = 1","start_at DESC","100");
			if(count($castings) <= 0){
				echo "<span class='col-sm-12 well' style='color:red;'>Data tidak ditemukan</span>";
			} else {
				foreach($castings as $casting){
					$work_category_ids = "";
					foreach(pipetoarray($casting["work_category_ids"]) as $work_category_id){
						$work_category_ids .= $db->fetch_single_data("work_categories","name",["id" => $work_category_id]).", ";
					} $work_category_ids = substr($work_category_ids,0,-2);
					$model_category_ids = "";
					foreach(pipetoarray($casting["model_category_ids"]) as $model_category_id){
						$model_category_ids .= $db->fetch_single_data("model_categories","name_".$__locale,["id" => $model_category_id]).", ";
					} $model_category_ids = substr($model_category_ids,0,-2);
					$age = $casting["age_min"]." - ".$casting["age_max"];
			?>									
					<div class="col-sm-6">
						<div class="row">
							<div class="col-sm-4">
								<img style="margin-top:10px" src="post_images/<?=$casting["image"];?>" width="100">
							</div>
							<div class="col-sm-8">
								<div><h3><?=$casting["title"];?></h3></div>
								<div><?=format_tanggal($casting["start_at"]);?> s/d <?=format_tanggal($casting["end_at"]);?></div>
								<div>Categories : <?=$work_category_ids;?></div>
								<div>For : <?=$model_category_ids;?></div>
								<div>age : <?=$age;?></div>
								<div class="col-sm-12"><br></div>
								<div class="col-sm-12">
									<?=$f->input("detail","Detail","onclick=\"showJobDetail('".$casting["id"]."');\" type='button' style='width:100%;'","btn btn-lg btn-info");?>
								</div>
							</div>
						</div>
					</div>
			<?php } ?>
		<?php } ?>
	</div>
<br>
<?php include_once "main_container_end.php"; ?>
<?php include_once "footer.php"; ?>