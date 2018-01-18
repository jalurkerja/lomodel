<br>
	Agency Name :
	<div class="container" style="width:100%"><?=$agency_profile["name"];?></div>
<div style="width:590px;border-top:1px solid #888;"></div>
	PIC :
	<div class="container" style="width:100%"><?=$agency_profile["pic"];?></div>
<div style="width:590px;border-top:1px solid #888;"></div>
	<?=v("idcard");?> :
	<div class="container" style="width:100%"><?=$agency_profile["idcard"];?></div>
<div style="width:590px;border-top:1px solid #888;"></div>
	Address :
	<div class="container" style="width:100%">
		<?=str_replace([chr(10),chr(13)],["<br>",""],$agency_profile["address"]);?><br>
		<?=$db->fetch_single_data("locations","name_".$__locale,["id"=>$agency_profile["location_id"]])." - ".$agency_profile["zipcode"];?>
	</div>
<div style="width:590px;border-top:1px solid #888;"></div>
	Phone :
	<div class="container" style="width:100%"><?=$agency_profile["phone"];?></div>
<div style="width:590px;border-top:1px solid #888;"></div>
	Cellphone :
	<div class="container" style="width:100%"><?=$agency_profile["cellphone"];?></div>
<div style="width:590px;border-top:1px solid #888;"></div>
	Web :
	<div class="container" style="width:100%"><?=$agency_profile["web"];?></div>
<div style="width:590px;border-top:1px solid #888;"></div>
	<?=v("nationality");?> :
	<div class="container" style="width:100%"><?=$db->fetch_single_data("nationalities","name",["id"=>$agency_profile["nationality_id"]]);?></div>
<div style="width:590px;border-top:1px solid #888;"></div>
<?php if($agency_profile["ig"]!=""){ ?> Instagram :<div class="container" style="width:100%"><?=$agency_profile["ig"];?></div><?php } ?>
<?php if($agency_profile["fb"]!=""){ ?> Facebook:<div class="container" style="width:100%"><?=$agency_profile["fb"];?></div><?php } ?>
<?php if($agency_profile["tw"]!=""){ ?> Twitter :<div class="container" style="width:100%"><?=$agency_profile["tw"];?></div><?php } ?>
<?php if($agency_profile["ig"]!="" || $agency_profile["fb"]!="" || $agency_profile["tw"]!=""){ ?> <div style="width:590px;border-top:1px solid #888;"></div> <?php } ?>

	<?=v("about");?> :
	<div class="container" style="width:100%"><?=$agency_profile["about"];?></div>
<div style="width:590px;border-top:1px solid #888;"></div>
<br>
<?php 
	$agency_models_id = $db->fetch_single_data("agency_models","id",["agency_user_id" => $_GET["id"],"model_user_id" => $__user_id]);
	if($agency_models_id > 0){
		$join_mode = $db->fetch_single_data("agency_models","mode",["id" => $agency_models_id]);
		$join_status = $db->fetch_single_data("agency_models","join_status",["id" => $agency_models_id]);
		$join_at = $db->fetch_single_data("agency_models","join_at",["id" => $agency_models_id]);
		if($join_mode == "2"){
			if($join_status < 2){
				echo "<input value='".v("accept_join")."' type='button' onclick=\"joinAgency('accept','".$agency_models_id."');\" class='btn btn-primary'>";
				echo "&nbsp;";
				echo "<input value='".v("reject_join")."' type='button' onclick=\"joinAgency('reject','".$agency_models_id."');\" class='btn btn-danger'>";
			} else if($join_status == 2){
				echo "<div class='col-sm-12 btn-success text-center'><b>".v("joined")." ".v("at")." ".format_tanggal($join_at)."</b></div>";
			} else if($join_status == 3){
				echo "<div class='col-sm-12 btn-danger text-center'><b>".v("join_rejected")." ".v("at")." ".format_tanggal($join_at)."</b></div>";
			}
		}
		if($join_mode == "1"){
			if($join_status < 2){
				echo "<div class='col-sm-12 btn-success text-center'><b>".v("waiting_for_join_approval")."</b></div>";
			} else if($join_status == 2){
				echo "<div class='col-sm-12 btn-success text-center'><b>".v("joined")." ".v("at")." ".format_tanggal($join_at)."</b></div>";
			} else if($join_status == 3){
				echo "<div class='col-sm-12 btn-danger text-center'><b>".v("join_rejected")." ".v("at")." ".format_tanggal($join_at)."</b></div>";
			}
		}
	} else {
		if(!$__agency_user_id)
			echo "<input value='".v("requests_to_join")."' type='button' onclick=\"requests_to_join('".$_GET["id"]."');\" class='btn btn-primary'>";
	}
?>	
<br><br>