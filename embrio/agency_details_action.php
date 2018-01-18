<script>	
	function requests_to_join(agency_user_id){
		<?php if($__role != "5"){ ?>
			toastr.warning("<?=v("you_have_to_login_as_a_model");?>","",toastroptions);
			<?php if(!$__isloggedin){ ?>
				setTimeout(function(){ window.location="register.php?as=model"; }, 4000);
			<?php } ?>
		<?php } else { ?>
			var modalTitle = "";
			var modalBody = "";
			var modalFooter = "";
			modalTitle = "<?=v("requests_to_join");?>";
			modalBody = "<form method='POST' id='frmRequestsToJoin'>";
			modalBody += "<input type='hidden' name='requests_to_join' value='1'>";
			modalBody += "<input type='hidden' name='agency_user_id' value='"+agency_user_id+"'>";
			modalBody += "<p><?=v("are_you_sure_want_to_join_to_this_agency");?>?</p>";
			modalBody += "</form>";
			modalFooter = "<button type=\"button\" class=\"btn btn-danger\" data-dismiss=\"modal\"><?=v("no");?></button>";
			modalFooter += "<button type=\"button\" class=\"btn btn-success\" onclick=\"frmRequestsToJoin.submit();\"><?=v("yes");?></button>";
			$('#modalTitle').html(modalTitle);
			$('#modalBody').html(modalBody);
			$('#modalFooter').html(modalFooter);
			$('#myModal').modal('show');
		<?php } ?>
	}
	
	function joinAgency(mode,agency_model_id){
		var modalTitle = "";
		var modalBody = "";
		var modalFooter = "";
		if(mode == "accept"){
			modalTitle = "<?=v("accept")." ".v("join_offers");?>";
			modalBody = "<form method='POST' id='frmAccept' action='dashboard.php?tabActive=joinOffers'>";
			modalBody += "<input type='hidden' name='agency_model_id' value='"+agency_model_id+"'>";
			modalBody += "<input type='hidden' name='accepting_join' value='1'>";
			modalBody += "<p>Anda yakin akan menerima tawaran ini?</p>";
			modalBody += "</form>";
			modalFooter = "<button type=\"button\" class=\"btn btn-danger\" data-dismiss=\"modal\">Close</button>";
			modalFooter += "<button type=\"button\" class=\"btn btn-success\" onclick=\"frmAccept.submit();\">OK</button>";
		}
		if(mode == "reject"){
			modalTitle = "<?=v("reject")." ".v("join_offers");?>";
			modalBody = "<form method='POST' id='frmAccept' action='dashboard.php?tabActive=joinOffers'>";
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
<?php
	if(isset($_POST["requests_to_join"])){
		$model_name= $db->fetch_single_data("model_profiles","concat(first_name,' ',middle_name,' ',last_name)",["user_id"=>$__user_id]);
		$agency_name = $db->fetch_single_data("agency_profiles","name",["user_id"=>$_POST["agency_user_id"]]);
		if(!$__agency_user_id){
			$db->addtable("agency_models");
			$db->addfield("agency_user_id");	$db->addvalue($_POST["agency_user_id"]);
			$db->addfield("model_user_id");		$db->addvalue($__user_id);
			$db->addfield("mode");				$db->addvalue("1");
			$inserting = $db->insert();
			if($inserting["affected_rows"] > 0){
				$thread_id = $db->fetch_single_data("messages","thread_id",["user_id" => "0"],["thread_id DESC"]);
				$thread_id++;
				$db->addtable("messages");
				$db->addfield("thread_id");		$db->addvalue($thread_id);
				$db->addfield("user_id");		$db->addvalue(0);
				$db->addfield("user_id2");		$db->addvalue($_POST["agency_user_id"]);
				$db->addfield("message");		$db->addvalue(str_replace("{modelName}",$model_name,v("message_join_request")));
				$db->insert();
				$_SESSION["message"] = str_replace("{agencyName}",$agency_name,v("message_join_request_sent"));
			}
		} else {
			$_SESSION["errormessage"] = str_replace(["{modelName}","{agencyName}"],[$model_name,$agency_name],v("model_already_joined_agency"));
		}
	}
?>