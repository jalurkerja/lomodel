<div>
	<table>
	<?php 
		$agency_user_id = $db->fetch_single_data("agency_models","agency_user_id",["model_user_id"=>$__user_id,"join_status"=>"2"]);
		if($agency_user_id > 0){
			$agency_name = $db->fetch_single_data("agency_profiles","name",["user_id"=>$agency_user_id]);
			$model_name= $db->fetch_single_data("model_profiles","concat(first_name,' ',middle_name,' ',last_name)",["user_id"=>$__user_id]);
			echo "<span class='col-sm-12 well' style='color:red;'>".str_replace(["{modelName}","{agencyName}"],[$model_name,$agency_name],v("model_already_joined_agency"))."</span>";
		} else {
			$agency_models = $db->fetch_all_data("agency_models",[],"model_user_id='".$__user_id."' AND mode='2' AND join_status <> '2'","join_status,id DESC");
			if(count($agency_models) <= 0){
				echo "<span class='col-sm-12 well' style='color:red;'>".v("data_not_found")."</span>";
			} else {
				foreach($agency_models as $agency_model){
					$agency_profile = $db->fetch_all_data("agency_profiles",[],"user_id='".$agency_model["agency_user_id"]."'")[0];
					$name = $agency_profile["name"];
					$location = $db->fetch_single_data("locations","name_".$__locale,["id" => $agency_profile["location_id"]]);
					if($agency_profile["photo"] == "" || !file_exists("user_images/".$agency_profile["photo"])) $agency_profile["photo"] = "nophoto.png";
			?>
					<tr>
						<td>
							<div class="col-sm-4">
								<img style="margin-top:10px" src="user_images/<?=$agency_profile["photo"];?>" width="100">
							</div>
							<div class="col-sm-8">
								<div><h3><?=$agency_profile["name"];?></h3></div>
								<?php if($agency_model["join_status"] < 2){ ?>
									<div class="col-sm-4">
										<?=$f->input("detail","Detail","onclick=\"window.open('agency_details.php?id=".$agency_model["agency_user_id"]."');\" type='button'","btn btn-success");?>
									</div>
									<div class="col-sm-4">
										<?=$f->input("accept","Accept","onclick=\"joinAgency('accept','".$agency_model["id"]."');\" type='button'","btn btn-success");?>
									</div>
									<div class="col-sm-4">
										<?=$f->input("reject","Reject","onclick=\"joinAgency('reject','".$agency_model["id"]."');\" type='button'","btn btn-danger");?>
									</div>
								<?php } ?>
								<?php if($agency_model["join_status"] == "2"){ ?>
										<div class="col-sm-12 btn-success text-center"><b><?=v("joined");?></b></div>
										<br><br> 
								<?php } ?>
								<?php if($agency_model["join_status"] == "3"){ ?>
										<div class="col-sm-12 btn-danger text-center"><b><?=v("join_rejected");?></b></div>
										<br><br> 
								<?php } ?>
							</div>
							<div class="col-sm-12" style="padding-bottom:10px;border-bottom:1px solid #aaa;width:100%;"></div>
						</td>
					</tr>
		<?php 
				} 
			} 
		}
		?>
	</table>
</div>
<script> 
	function joinAgency(mode,agency_model_id){
		var modalTitle = "";
		var modalBody = "";
		var modalFooter = "";
		if(mode == "accept"){
			modalTitle = "<?=v("accept")." ".v("join_offers");?>";
			modalBody = "<form method='POST' id='frmAccept'>";
			modalBody += "<input type='hidden' name='agency_model_id' value='"+agency_model_id+"'>";
			modalBody += "<input type='hidden' name='accepting_join' value='1'>";
			modalBody += "<p>Anda yakin akan menerima tawaran ini?</p>";
			modalBody += "</form>";
			modalFooter = "<button type=\"button\" class=\"btn btn-danger\" data-dismiss=\"modal\">Close</button>";
			modalFooter += "<button type=\"button\" class=\"btn btn-success\" onclick=\"frmAccept.submit();\">OK</button>";
		}
		if(mode == "reject"){
			modalTitle = "<?=v("reject")." ".v("join_offers");?>";
			modalBody = "<form method='POST' id='frmAccept'>";
			modalBody += "<input type='hidden' name='agency_model_id' value='"+agency_model_id+"'>";
			modalBody += "<input type='hidden' name='rejecting_join' value='1'>";
			modalBody += "<p>Silakan isi alasan penolakan Anda pada tawaran ini:</p>";
			modalBody += "<input type='text' name='join_notes' placeholder='Alasan penolakan tawaran join...' class='form-control'>";
			modalBody += "</form>";
			modalFooter = "<button type=\"button\" class=\"btn btn-danger\" data-dismiss=\"modal\">Close</button>";
			modalFooter += "<button type=\"button\" class=\"btn btn-success\" onclick=\"frmAccept.submit();\">OK</button>";
		}
		$('#modalTitle').html(modalTitle);
		$('#modalBody').html(modalBody);
		$('#modalFooter').html(modalFooter);
		$('#myModal').modal('show');
	}
</script>