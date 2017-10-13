<?php include_once "dashboard_model_action.php"; ?>
<?php if($__role!="5") exit(); ?>
<div class="row">
	<?php 
		$model_profile = $db->fetch_all_data("model_profiles",[],"user_id='".$__user_id."'")[0];
		$model = $db->fetch_all_data("model_files",[],"user_id='".$__user_id."'")[0];
	?>
	<div class="container">
		<h2 class="well">DASHBOARD</h2>
		<h3><?=$model_profile["first_name"];?> <?=$model_profile["middle_name"];?> <?=$model_profile["last_name"];?></h3>
	</div>
	<div class="col-sm-3 features wow fadeInRight animated">
		<img id="mainProfileImg" src="user_images/<?=$model["filename"];?>">
	</div>
	<div class="col-sm-9 fadeInRight animated">
		<div class="col-md-12 container">
			<ul class="col-sm-12 nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#profile">Profile</a></li>
				<li><a data-toggle="tab" href="#album">Album</a></li>
				<li><a data-toggle="tab" href="#work">Work</a></li>
				<li><a data-toggle="tab" href="#clients">Clients</a></li>
				<li><a data-toggle="tab" href="#bookings">Booking Requests</a></li>
			</ul>
			<br><br>
			<div class="col-sm-12 tab-content">
				<div id="profile" class="tab-pane fade in active">
					<h3>Nationality : <b><?=$db->fetch_single_data("nationalities","name",["id" => $model_profile["nationality_id"]]);?></b></h3>
					<div style="width:590px;border-top:1px solid #888;"></div>
						<table class="tbl_detail">
							<tr><td>Hair</td><td>Eyes</td><td>Height<br>(cm)</td><td>Bust<br>(cm)</td><td>Waist<br>(cm)</td><td>Hips<br>(cm)</td><td>Shoe<br>(us)</td></tr>
							<tr><td style="height:10px;"></td></tr>
							<tr style="font-weight:bolder;">
								<td><?=$db->fetch_single_data("hair_colors","name",["id" => $model_profile["hair_color_id"]]);?></td>
								<td><?=$db->fetch_single_data("eye_colors","name",["id" => $model_profile["eye_colors_id"]]);?></td>
								<td><?=$model_profile["height"];?></td>
								<td><?=$model_profile["bust"];?></td>
								<td><?=$model_profile["waist"];?></td>
								<td><?=$model_profile["hips"];?></td>
								<td><?=$model_profile["shoe"];?></td>
							</tr>
						</table>
					<div style="width:590px;border-top:1px solid #888;"></div>
				</div><br>
				<div id="album" class="tab-pane fade">
					<?php
						$model_files = $db->fetch_all_data("model_files",[],"user_id = '".$__user_id."'");
						foreach($model_files as $model_file){
							?>
							<div class="col-sm-3 fadeInRight animated">
								<img class="img-responsive" height="400" src="user_images/<?=$model["filename"];?>">
							</div>
							<?php
						}
					?>
				</div>
				<div id="work" class="tab-pane fade">
					<?php 
						$work_categories = $db->fetch_select_data("work_categories","id","name"); 
						$work_categories[""] = "- All Categories -";
					?>
					<?=$f->select("sel_work_categories",$work_categories,null,"","form-control");?>
					<div style="width:100%;border-top:1px solid #888;margin-top:10px"></div>
					<div>
						<table>
							<tr>
								<td>									
									<div class="col-sm-4">
										<img style="margin-top:10px" src="https://www.w3schools.com/bootstrap/img_avatar3.png" width="100">
									</div>
									<div class="col-sm-8">
											Zadig &amp; Voltaire F/W 2017
										<div>Zadig &amp; Voltaire (Advertising)</div>
										<div>season: Fall/Winter 2017</div>
										<div>photographer: Pierre-Ange Carlotti</div>
									</div>
								</td>
							</tr>
							<tr>
								<td>									
									<div class="col-sm-4" data-toggle="popover" data-trigger="hover" data-content="<?=$popover_content;?>">
										<img style="margin-top:10px" src="https://www.w3schools.com/bootstrap/img_avatar3.png" width="100">
									</div>
									<div class="col-sm-8" data-toggle="popover" data-trigger="hover" data-content="<?=$popover_content;?>">
										<a href="#">Zadig &amp; Voltaire F/W 2017</a>
										<div>Zadig &amp; Voltaire (Advertising)</div>
										<div>season: Fall/Winter 2017</div>
										<div>photographer: Pierre-Ange Carlotti</div>
									</div>
								</td>
							</tr>
						</table>
					</div>
				</div>
				<div id="clients" class="tab-pane fade">
					<h3>Clients</h3>
					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
				</div>
				<div id="bookings" class="tab-pane fade">
					<div>
						<table>
							<?php 
								$bookings = $db->fetch_all_data("bookings",[],"book_user_id='".$__user_id."' AND status > 0");
								if(count($bookings) <= 0){
									echo "<span class='col-sm-12 well' style='color:red;'>Data tidak ditemukan</span>";
								} else {
									foreach($bookings as $booking){
										$booker_role = $db->fetch_single_data("a_users","role",["id" => $booking["user_id"]]);
										if($booker_role == "2") $table_booker = "personal_profiles";
										if($booker_role == "3") $table_booker = "agency_profiles";
										if($booker_role == "4") $table_booker = "corporate_profiles";
										$booker = $db->fetch_all_data($table_booker,[],"user_id='".$booking["user_id"]."'")[0];
								?>
								<tr>
									<td>									
										<div class="col-sm-4">
											<img style="margin-top:10px" src="user_images/no_logo.png" width="100">
										</div>
										<div class="col-sm-8">
											<div><h3><?=$booker["name"];?></h3></div>
											<div><?=format_tanggal($booking["casting_start"]);?> s/d <?=format_tanggal($booking["casting_end"]);?></div>
											<div><?=str_replace(chr(13).chr(10),"<br>",$booking["description"]);?></div>
											<div><b>Rp. <?=format_amount($booking["fee"],2);?></b></div>
											<?php if($booking["status"] == "1"){ ?>
												<div class="col-sm-6">
													<?=$f->input("accept","Accept","onclick=\"booking('accept','".$booking["id"]."');\" type='button' style='width:100%;'","btn btn-lg btn-success");?>
												</div>
												<div class="col-sm-6">
													<?=$f->input("reject","Reject","onclick=\"booking('reject','".$booking["id"]."');\" type='button' style='width:100%;'","btn btn-lg btn-danger");?>
												</div>
											<?php } ?>
											<?php if($booking["status"] == "2"){ 
												?> <div class="col-sm-12 btn-success text-center"><b>Accepted</b></div> <?php
											}?>
											<?php if($booking["status"] == "3"){ 
												?> <div class="col-sm-12 btn-danger text-center">Rejected</div> <?php
											}?>
										</div>
										<div class="col-sm-12" style="padding-bottom:10px;border-bottom:1px solid #aaa;width:100%;"></div>
									</td>
								</tr>
								<?php } ?>
							<?php } ?>
						</table>
					</div>
					<script> 
						function booking(mode,booking_id){
							var modalTitle = "";
							var modalBody = "";
							var modalFooter = "";
							if(mode == "accept"){
								modalTitle = "Booking Accept";
								modalBody = "<form method='POST' id='frmAccept'>";
								modalBody += "<input type='hidden' name='booking_id' value='"+booking_id+"'>";
								modalBody += "<input type='hidden' name='accepting' value='1'>";
								modalBody += "<p>Anda yakin akan menerima tawaran ini?</p>";
								modalBody += "</form>";
								modalFooter = "<button type=\"button\" class=\"btn btn-danger\" data-dismiss=\"modal\">Close</button>";
								modalFooter += "<button type=\"button\" class=\"btn btn-success\" onclick=\"frmAccept.submit();\">OK</button>";
							}
							if(mode == "reject"){
								modalTitle = "Booking Reject";
								modalBody = "<form method='POST' id='frmAccept'>";
								modalBody += "<input type='hidden' name='booking_id' value='"+booking_id+"'>";
								modalBody += "<input type='hidden' name='rejecting' value='1'>";
								modalBody += "<p>Silakan isi alasan penolakan Anda pada tawaran ini:</p>";
								modalBody += "<input type='text' name='accepted_notes' placeholder='Alasan penolakan tawaran casting...' class='form-control'>";
								modalBody += "</form>";
								modalFooter = "<button type=\"button\" class=\"btn btn-danger\" data-dismiss=\"modal\">Close</button>";
								modalFooter += "<button type=\"button\" class=\"btn btn-success\" onclick=\"frmAccept.submit();\">OK</button>";
							}
							$('#modalTitle').html(modalTitle);
							$('#modalBody').html(modalBody);
							$('#modalFooter').html(modalFooter);
							$('#myModal').modal('show');
						}
						$("#booking_reject").click(function(){
							
						});
					</script>
					<br><br>
					
				</div>
			</div>
		</div>
	</div>
</div>