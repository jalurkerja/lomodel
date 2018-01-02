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
