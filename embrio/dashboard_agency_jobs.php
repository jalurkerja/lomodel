<br>
<div>
	<table>
		<?php 
			$castings = $db->fetch_all_data("jobs",[],"job_giver_user_id='".$__user_id."'");
			if(count($castings) <= 0){
				echo "<span class='col-sm-12 well' style='color:red;'>".v("data_not_found")."</span>";
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
			<tr>
				<td>									
					<div class="col-sm-4">
						<img style="margin-top:10px" src="post_images/<?=$casting["image"];?>" width="100">
					</div>
					<div class="col-sm-8">
						<div><h3><?=$casting["title"];?></h3></div>
						<div><?=format_tanggal($casting["start_at"]);?> s/d <?=format_tanggal($casting["end_at"]);?></div>
						<div>Categories : <?=$work_category_ids;?></div>
						<div>For : <?=$model_category_ids;?></div>
						<div>age : <?=$age;?></div>
						<?php if($casting["is_publish"] == "1"){
							?> <div class="text-success"><b>Published at <?=format_tanggal($casting["publish_at"]);?></b></div> <?php
						}?>
						<?php if($casting["is_publish"] == "0"){ 
							?> <div class="text-danger"><b>Un Publish</b></div> <?php
						}?>
						<div class="col-sm-12"><br></div>
						<div class="col-sm-6">
							<?=$f->input("detail","Detail","onclick=\"showJobDetail('".$casting["id"]."');\" type='button' style='width:100%;'","btn btn-lg btn-info");?>
						</div>
						<div class="col-sm-6">
						<?php if(count($db->fetch_all_data("applied_jobs",[],"job_id='".$casting["id"]."'")) <= 0){ ?>
							<?=$f->input("delete","Delete"," type='button' style='width:100%;'","btn btn-lg btn-warning");?>
						<?php } else { ?>
							<?=$f->input("applicants","Applicants","onclick=\"showApplicants('".$casting["id"]."');\" type='button' style='width:100%;'","btn btn-lg btn-info");?>
						<?php } ?>
						</div>
					</div>
					<div class="col-sm-12" style="padding-bottom:10px;border-bottom:1px solid #aaa;width:100%;"></div>
				</td>
			</tr>
			<?php } ?>
		<?php } ?>
	</table>
</div>
<br><br>