<br>
<div>
		<?php 
			$bookings = $db->fetch_all_data("bookings",[],"user_id='".$__user_id."'");
			if(count($bookings) <= 0){
				echo "<span class='col-sm-12 well' style='color:red;'>".v("data_not_found")."</span>";
			} else {
				foreach($bookings as $booking){
					$model = $db->fetch_all_data("model_profiles",[],"user_id='".$booking["book_user_id"]."'")[0];
					$model_profile = $db->fetch_all_data("model_profiles",[],"user_id='".$booking["book_user_id"]."'")[0];
			?>
				<div class="col-sm-5" style="cursor:pointer;" onclick="window.open('model_details.php?user_id=<?=$booking["book_user_id"];?>');">
					<div class="col-sm-12">
						<img style="margin-top:10px" src="user_images/<?=$model_profile["photo"];?>" class="img-responsive">
					</div>
					<div class="col-sm-12">
						<div><h3><?=$model["first_name"];?> <?=$model["middle_name"];?> <?=$model["last_name"];?> </h3></div>
						<div><?=format_tanggal($booking["casting_start"]);?> s/d <?=format_tanggal($booking["casting_end"]);?></div>
						<div><?=str_replace(chr(13).chr(10),"<br>",$booking["description"]);?></div>
						<div><b>Rp. <?=format_amount($booking["fee"],2);?></b></div>
						<div>Your token: <?=$booking["book_user_token"];?></div>
						
						<?php if($booking["status"] == "2"){ 
							?> 
								<div class="col-sm-12 btn-success text-center"><b>Accepted</b></div> 
								<?php if($booking["book_user_is_done"] == 1){ ?>
									<div class="col-sm-12 btn-success text-center"><b>Job was done</b></div>
								<?php } else { ?>
									<br><br>
									<?=$f->input("job_done","Job Done","onclick=\"jobDone('".$booking["id"]."');\" type='button' style='width:100%;'","btn btn-lg btn-success");?>
								<?php } ?>
							<?php
						}?>
						<?php if($booking["status"] == "3"){ 
							?> <div class="col-sm-12 btn-danger text-center">Rejected</div> <?php
							?> <div class="col-sm-12"><u>Notes :</u><br><?=$booking["accepted_notes"];?></div> <?php
						}?>
					</div>
					<div class="col-sm-12" style="padding-bottom:10px;border-bottom:1px solid #aaa;width:100%;"></div>
				</div>
				<div class="col-sm-1"></div>
			<?php } ?>
		<?php } ?>
</div>
<br><br>