<div>
	<table>
		<?php 
			$bookings = $db->fetch_all_data("bookings",[],"book_user_id='".$__user_id."' AND status > 0");
			if(count($bookings) <= 0){
				echo "<span class='col-sm-12 well' style='color:red;'>".v("data_not_found")."</span>";
			} else {
				foreach($bookings as $booking){
					$booker_role = $db->fetch_single_data("a_users","role",["id" => $booking["user_id"]]);
					if($booker_role == "2"){ $table_booker = "personal_profiles";	$photoField = "photo"; }
					if($booker_role == "3"){ $table_booker = "agency_profiles";		$photoField = "photo"; }
					if($booker_role == "4"){ $table_booker = "corporate_profiles";	$photoField = "logo"; }
					$booker = $db->fetch_all_data($table_booker,[],"user_id='".$booking["user_id"]."'")[0];
					if($booker[$photoField] == "" || !file_exists("user_images/".$booker[$photoField])) $booker[$photoField] = "nophoto.png";
			?>
			<tr>
				<td>									
					<div class="col-sm-4">
						<img style="margin-top:10px" src="user_images/<?=$booker[$photoField];?>" width="100">
					</div>
					<div class="col-sm-8">
						<div><h3><?=$booker["name"];?></h3></div>
						<div><?=format_tanggal($booking["casting_start"]);?> s/d <?=format_tanggal($booking["casting_end"]);?></div>
						<div><?=str_replace(chr(13).chr(10),"<br>",$booking["description"]);?></div>
						<div><b>Rp. <?=format_amount($booking["fee"],2);?></b></div>
						<div>Your token: <?=$booking["user_token"];?><div>
						<?php if($booking["status"] == "1"){ ?>
							<div class="col-sm-6">
								<?=$f->input("accept","Accept","onclick=\"booking('accept','".$booking["id"]."');\" type='button' style='width:100%;'","btn btn-lg btn-success");?>
							</div>
							<div class="col-sm-6">
								<?=$f->input("reject","Reject","onclick=\"booking('reject','".$booking["id"]."');\" type='button' style='width:100%;'","btn btn-lg btn-danger");?>
							</div>
						<?php } ?>
						<?php if($booking["status"] == "2"){ 
							?> 
								<?php if($booking["user_is_done"] == 1){ ?>
									<div class="col-sm-12 btn-success text-center"><b>Job Accepted and done</b></div>
								<?php } else { ?>
									<div class="col-sm-12 btn-success text-center"><b>Job Accepted</b></div>
									<br><br>
									<?=$f->input("job_done","Job Done","onclick=\"jobDone('".$booking["id"]."');\" type='button' style='width:100%;'","btn btn-lg btn-success");?>
								<?php } ?>
							<?php
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
	function jobDone(booking_id){
		modalTitle = "Enter corporate or agency token";
		modalBody = "<form method='POST' id='frmToken'>";
		modalBody += "<input type='hidden' name='booking_id' value='"+booking_id+"'>";
		modalBody += "<input type='hidden' name='job_done' value='1'>";
		modalBody += "<input type='token' name='token' class='form-control'>";
		modalBody += "</form>";
		modalFooter = "<button type=\"button\" class=\"btn btn-danger\" data-dismiss=\"modal\">Close</button>";
		modalFooter += "<button type=\"button\" class=\"btn btn-success\" onclick=\"frmToken.submit();\">OK</button>";
		$('#modalTitle').html(modalTitle);
		$('#modalBody').html(modalBody);
		$('#modalFooter').html(modalFooter);
		$('#myModal').modal('show');
	}
	
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