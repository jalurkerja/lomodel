<script>
	function detailAgencyModel(agency_user_id,model_user_id,mode){
		agency_user_id = agency_user_id || 0;
		model_user_id = model_user_id || 0;
		mode = mode || "already_member";
		$.get( "ajax/detail_agency_model.php?agency_user_id="+agency_user_id+"&model_user_id="+model_user_id+"&mode="+mode, function(modalBody) {
			modalFooter = "<button type=\"button\" class=\"btn btn-danger\" data-dismiss=\"modal\">Close</button>";
			modalBody = modalBody.split("|||");
			modalTitle = modalBody[0];
			modalBody = modalBody[1];
			$('#modalTitle').html(modalTitle);
			$('#modalBody').html(modalBody);
			$('#modalFooter').html(modalFooter);
			$('#myModal').modal('show');
		});
	}
</script>
<br>
<h4><?=v("models");?></h4>
<div class="col-md-12 container">
	<ul class="col-sm-12 nav nav-tabs">
		<li class="active"><a data-toggle="tab" href="#alreadyMember"><?=v("already_member");?></a></li>
		<li><a data-toggle="tab" href="#joinRequests"><?=v("join_requests");?></a></li>
		<li><a data-toggle="tab" href="#joinOffers"><?=v("join_offers");?></a></li>
	</ul>
	<br><br>
	<div class="col-sm-12 tab-content">
		<div id="alreadyMember" class="tab-pane fade in active"><?php include_once "dashboard_agency_models_already_member.php"; ?></div>
		<div id="joinRequests" class="tab-pane fade"><?php include_once "dashboard_agency_models_join_requests.php"; ?></div>
		<div id="joinOffers" class="tab-pane fade"><?php include_once "dashboard_agency_models_join_offers.php"; ?></div>
	</div>
</div>
