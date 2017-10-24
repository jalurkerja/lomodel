<?php include_once "dashboard_agency_action.php"; ?>
<?php if($__role!="3") exit(); ?>
<div class="row">
	<?php 
		$personal_profile = $db->fetch_all_data("personal_profiles",[],"user_id='".$__user_id."'")[0];
	?>
	<div class="container">
		<h2 class="well">DASHBOARD</h2>
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
				<li><a data-toggle="tab" href="#post_a_casting">Post a Casting</a></li>
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
				<div id="post_a_casting" class="tab-pane fade">
					<br>
					<div class="col-lg-7 well">
						<form role="form" method="POST" autocomplete="off" enctype="multipart/form-data">
							<div class="form-group">
								<label>Title</label>
								<?=$f->input("title",$_POST["title"],"","form-control");?><br>

								<label>Casting Categories</label>
								<?=$f->select_multiple("work_category_ids",$db->fetch_select_data("work_categories","id","name"),null,"","form-control");?><br>
								
								<label>Model Categories</label>
								<?=$f->select_multiple("model_category_ids",$db->fetch_select_data("model_categories","id","name_".$__locale),null,"","form-control");?><br>
								
								<label>Job Description</label>
								<?=$f->textarea("description",$_POST["description"],"cols='75' rows='5'","form-control");?><br>
								
								<label>Requirement</label>
								<?=$f->textarea("requirement",$_POST["requirement"],"cols='75' rows='5'","form-control");?><br>

								<label>Minimum Experience (Year)</label>
								<b>0&nbsp;&nbsp;</b><input id="experience_years" name="experience_years" type="text" class="span2" value="" data-slider-min="0" data-slider-max="50" data-slider-step="1" data-slider-value="1"/><b>&nbsp;&nbsp;50</b><br><br>
								
								<label>Gender</label>
								<?=$f->select_multiple("gender_ids",$db->fetch_select_data("genders","id","name"),null,"","form-control");?><br>
								
								<label>Age (Year)</label>
								<b>17&nbsp;&nbsp;</b><input id="age" name="age" type="text" class="span2" value="" data-slider-min="17" data-slider-max="70" data-slider-step="1" data-slider-value="[18,30]"/><b>&nbsp;&nbsp;70</b><br><br>
								
								
								<label>Casting At</label>
								<div class="col-md-12">
									<table cellpadding="0" cellspacing="0">
										<tr>
											<td><?=$f->input("casting_start",$_POST["casting_start"],"type='date'","form-control");?></td>
											<td>&nbsp;to&nbsp;</td>
											<td><?=$f->input("casting_end",$_POST["casting_end"],"type='date'","form-control");?></td>
										</tr>
									</table>
									<br>
								</div>
								
								<label>Event At</label>
								<div class="col-md-12">
									<table cellpadding="0" cellspacing="0">
										<tr>
											<td><?=$f->input("start_at",$_POST["start_at"],"type='date'","form-control");?></td>
											<td>&nbsp;to&nbsp;</td>
											<td><?=$f->input("end_at",$_POST["end_at"],"type='date'","form-control");?></td>
										</tr>
									</table>
									<br>
								</div>
								
								<label>Image Reference</label>
								<?=$f->input("image",$_POST["image"],"type='file'","form-control");?><br>
								
								<?=$f->input("posting","Post","type='submit' style='width:100%;'","btn btn-lg btn-info");?>
							</div>
						</form>
						<script> 
							$("#experience_years").slider({});
							$("#age").slider({});
						</script>
					</div>
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