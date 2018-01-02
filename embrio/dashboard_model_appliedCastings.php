<div>
	<table>
		<?php 
			$applied_jobs = $db->fetch_all_data("applied_jobs",[],"user_id='".$__user_id."'");
			if(count($applied_jobs) <= 0){
				echo "<span class='col-sm-12 well' style='color:red;'>".v("data_not_found")."</span>";
			} else {
				foreach($applied_jobs as $applied_job){
					$casting = $db->fetch_all_data("jobs",[],"id = '".$applied_job["job_id"]."'")[0];
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
						<?php if($casting["casting_start"] != "0000-00-00" && $casting["casting_end"] != "0000-00-00"){ ?>
							<div>Casting at : <?=format_tanggal($casting["casting_start"],"d M Y");?> to <?=format_tanggal($casting["casting_end"],"d M Y");?></div>
						<?php } else { ?>
							<div>&nbsp;</div>
						<?php } ?>
						<?php if($casting["start_at"] != "0000-00-00" && $casting["end_at"] != "0000-00-00"){ ?>
							<div>Event at : <?=format_tanggal($casting["start_at"],"d M Y");?> to <?=format_tanggal($casting["end_at"],"d M Y");?></div>
						<?php } else { ?>
							<div>&nbsp;</div>
						<?php } ?>
						<div>Categories : <?=$work_category_ids;?></div>
						<div>For : <?=$model_category_ids;?></div>
						<div>age : <?=$age;?></div>
						<div class="col-sm-12"><br></div>
						<div class="col-sm-12">
							<?=$f->input("detail","Detail","onclick=\"showJobDetail('".$casting["id"]."');\" type='button' style='width:100%;'","btn btn-lg btn-info");?>
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