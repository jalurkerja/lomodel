<?php include_once "dashboard_personal_action.php"; ?>
<?php if($__role!="2") exit(); ?>
<div class="row">
	<?php 
		$personal_profile = $db->fetch_all_data("personal_profiles",[],"user_id='".$__user_id."'")[0];
	?>
	<div class="container">
		<h2 class="well"><?=strtoupper(v("dashboard"));?></h2>
		<h3><?=$personal_profile["name"];?></h3>
	</div>
	<div class="col-sm-3 fadeInRight animated">
		<img style="width:95%;" id="mainProfileImg" src="user_images/<?=$personal_profile["photo"];?>">
	</div>
	<div class="col-sm-9 fadeInRight animated">
		<div class="col-md-12 container">
			<ul class="col-sm-12 nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#profile">Profile</a></li>
				<li><a data-toggle="tab" href="#castings">Castings</a></li>
				<li><a data-toggle="tab" href="#bookings">Bookings</a></li>
			</ul>
			<br><br>
			<div class="col-sm-12 tab-content">
				<div id="profile" class="tab-pane fade in active">
					
				</div>
				<div id="castings" class="tab-pane fade">
					<br>
					<div>
						<table>
							<?php 
								$castings = $db->fetch_all_data("jobs",[],"job_giver_user_id='".$__user_id."'");
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
												<?=$f->input("delete","Delete"," type='button' style='width:100%;'","btn btn-lg btn-warning");?>
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
					
				</div>
				<div id="bookings" class="tab-pane fade">
					<br>
					<div>
						<table>
							<?php 
								$bookings = $db->fetch_all_data("bookings",[],"user_id='".$__user_id."'");
								if(count($bookings) <= 0){
									echo "<span class='col-sm-12 well' style='color:red;'>Data tidak ditemukan</span>";
								} else {
									foreach($bookings as $booking){
										$model = $db->fetch_all_data("model_profiles",[],"user_id='".$booking["book_user_id"]."'")[0];
										$model_file = $db->fetch_all_data("model_files",[],"user_id='".$booking["book_user_id"]."'")[0];
								?>
								<tr>
									<td>									
										<div class="col-sm-4">
											<img style="margin-top:10px" src="user_images/<?=$model_file["filename"];?>" width="100">
										</div>
										<div class="col-sm-8">
											<div><h3><?=$model["first_name"];?> <?=$model["middle_name"];?> <?=$model["last_name"];?> </h3></div>
											<div><?=format_tanggal($booking["casting_start"]);?> s/d <?=format_tanggal($booking["casting_end"]);?></div>
											<div><?=str_replace(chr(13).chr(10),"<br>",$booking["description"]);?></div>
											<div><b>Rp. <?=format_amount($booking["fee"],2);?></b></div>
											
											<?php if($booking["status"] == "2"){ 
												?> <div class="col-sm-12 btn-success text-center"><b>Accepted</b></div> <?php
											}?>
											<?php if($booking["status"] == "3"){ 
												?> <div class="col-sm-12 btn-danger text-center">Rejected</div> <?php
												?> <div class="col-sm-12"><u>Notes :</u><br><?=$booking["accepted_notes"];?></div> <?php
											}?>
										</div>
										<div class="col-sm-12" style="padding-bottom:10px;border-bottom:1px solid #aaa;width:100%;"></div>
									</td>
								</tr>
								<?php } ?>
							<?php } ?>
						</table>
					</div>
					<br><br>
					
				</div>
			</div>
		</div>
	</div>
</div>