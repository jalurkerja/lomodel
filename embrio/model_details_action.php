<script>
	function sendMessage(sender_id,textmessage){
		if(sender_id > 0 && textmessage != ""){
			$.ajax({url: "ajax/messages.php?mode=sendMessage&sender_id="+sender_id+"&message="+textmessage, success: function(result){
				window.location="dashboard.php?tabActive=message";
			}});
		}
	}
	
	function showGalery(model_album_id,mode){
		mode = mode || 5;
		$.get( "ajax/show_galery.php?model_album_id="+model_album_id+"&mode="+mode, function(modalBody) {
			modalFooter = "<button type=\"button\" class=\"btn btn-danger\" data-dismiss=\"modal\">Close</button>";
			$('#modalTitle').html("");
			$('#modalTitle').parent().css( "display", "none" );
			$('#modalBody').html(modalBody);
			$('#modalFooter').html(modalFooter);
			$('#myModal').modal('show');
		});
	}
	
	function joinRequestUpdate(agency_model_id,join_status){
		if(join_status == "2"){ var confirmMsg = "<?=v("confirm_message_accept_join_request");?>"; }
		if(join_status == "3"){ var confirmMsg = "<?=v("confirm_message_reject_join_request");?>"; }
		if(confirm(confirmMsg)){
			$.get( "ajax/join_request_update.php?agency_model_id="+agency_model_id+"&join_status="+join_status, function(modalBody) {
				if(modalBody != ""){
					window.location="dashboard.php?tabActive=models&subtabActive="+modalBody;
				}
			});
		}
	}
	
	
		
	function join_offers(model_user_id){
		<?php if($__role != "3"){ ?>
			toastr.warning("<?=v("you_have_to_registered_as_a_agency");?>","",toastroptions);
			<?php if(!$__isloggedin){ ?>
				setTimeout(function(){ window.location="register.php?as=nomodel"; }, 4000);
			<?php } ?>
		<?php } else { ?>
			var modalTitle = "";
			var modalBody = "";
			var modalFooter = "";
			modalTitle = "<?=v("join_offers");?>";
			modalBody = "<form method='POST' id='frmJoinOffers'>";
			modalBody += "<input type='hidden' name='join_offers' value='1'>";
			modalBody += "<input type='hidden' name='model_user_id' value='"+model_user_id+"'>";
			modalBody += "<p><?=v("are_you_sure_want_to_offer_this_model_to_join");?>?</p>";
			modalBody += "</form>";
			modalFooter = "<button type=\"button\" class=\"btn btn-danger\" data-dismiss=\"modal\"><?=v("no");?></button>";
			modalFooter += "<button type=\"button\" class=\"btn btn-success\" onclick=\"frmJoinOffers.submit();\"><?=v("yes");?></button>";
			$('#modalTitle').html(modalTitle);
			$('#modalBody').html(modalBody);
			$('#modalFooter').html(modalFooter);
			$('#myModal').modal('show');
		<?php } ?>
	}
</script>
<?php
	if(isset($_POST["join_offers"])){
		$model_name= $db->fetch_single_data("model_profiles","concat(first_name,' ',middle_name,' ',last_name)",["user_id"=>$_POST["model_user_id"]]);
		$agency_name = $db->fetch_single_data("agency_profiles","name",["user_id"=>$__user_id]);
		if(!$__agency_user_id){
			$db->addtable("agency_models");
			$db->addfield("agency_user_id");	$db->addvalue($__user_id);
			$db->addfield("model_user_id");		$db->addvalue($_POST["model_user_id"]);
			$db->addfield("mode");				$db->addvalue("2");
			$inserting = $db->insert();
			if($inserting["affected_rows"] > 0){
				$thread_id = $db->fetch_single_data("messages","thread_id",["user_id" => "0"],["thread_id DESC"]);
				$thread_id++;
				$db->addtable("messages");
				$db->addfield("thread_id");		$db->addvalue($thread_id);
				$db->addfield("user_id");		$db->addvalue(0);
				$db->addfield("user_id2");		$db->addvalue($_POST["model_user_id"]);
				$db->addfield("message");		$db->addvalue(str_replace("{agencyName}",$agency_name,v("message_join_offer")));
				$db->insert();
				$_SESSION["message"] = str_replace("{modelName}",$model_name,v("message_join_offer_sent"));
			}
		} else {
			$_SESSION["errormessage"] = str_replace(["{modelName}","{agencyName}"],[$model_name,$agency_name],v("model_already_joined_agency"));
		}
	}
?>