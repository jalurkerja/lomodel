<h3><?=v("nationality");?> : <b><?=$db->fetch_single_data("nationalities","name",["id" => $model_profile["nationality_id"]]);?></b></h3>
<div style="width:590px;border-top:1px solid #888;"></div>
	<table class="tbl_detail">
		<tr>
			<td>Hair</td><td>Eyes</td><td>Height</td>
			<?php if($model_profile["model_category_ids"] != 1) { ?>
			<td>Bust</td>
			<?php } ?>
			<td>chest</td><td>Waist</td><td>Hips</td><td>Shoe</td>
		</tr>
		<tr><td style="height:10px;"></td></tr>
		<tr style="font-weight:bolder;">
			<td><?=$db->fetch_single_data("hair_colors","name",["id" => $model_profile["hair_color_id"]]);?></td>
			<td><?=$db->fetch_single_data("eye_colors","name",["id" => $model_profile["eye_colors_id"]]);?></td>
			<td><?=$model_profile["height"]*1;?> cm</td>
			<?php if($model_profile["model_category_ids"] != 1) { ?>
			<td><?=$model_profile["bust"];?></td>
			<?php } ?>
			<td><?=$model_profile["chest"]*1;?> cm</td>
			<td><?=$model_profile["waist"]*1;?> cm</td>
			<td><?=$model_profile["hips"]*1;?> cm</td>
			<td><?=$model_profile["shoe"]*1;?></td>
		</tr>
	</table>
<div style="width:590px;border-top:1px solid #888;"></div>

<?=v("model_category");?> : 
<div class="container" style="width:100%"><?=$db->fetch_single_data("model_categories","name_".$__locale,["id" => $model_profile["model_category_ids"]]);?></div>
<div style="width:590px;border-top:1px solid #888;"></div>

Address :
<div class="container" style="width:100%">
	<?=str_replace([chr(10),chr(13)],["<br>",""],$model_profile["address"]);?><br>
	<?=$db->fetch_single_data("locations","name_".$__locale,["id" =>$model_profile["location_id"]]);?>
</div>
<div style="width:590px;border-top:1px solid #888;"></div>

<?php if($model_profile["ig"]!=""){ ?> Instagram :<div class="container" style="width:100%"><?=$model_profile["ig"];?></div><?php } ?>
<?php if($model_profile["fb"]!=""){ ?> Facebook:<div class="container" style="width:100%"><?=$model_profile["fb"];?></div><?php } ?>
<?php if($model_profile["tw"]!=""){ ?> Twitter :<div class="container" style="width:100%"><?=$model_profile["tw"];?></div><?php } ?>
<?php if($model_profile["ig"]!="" || $model_profile["fb"]!="" || $model_profile["tw"]!=""){ ?> <div style="width:590px;border-top:1px solid #888;"></div> <?php } ?>
<br>
<?php
	if($__role == "3"){
		$agency_model_id = $js->already_send_join_offer($__user_id,$_GET["user_id"]);
		if($agency_model_id <= 0){
			echo "<input value='".ucwords(v("send"))." ".v("join_offers")."' type='button' onclick=\"join_offers('".$_GET["user_id"]."');\" class='btn btn-primary'>";
		} else {
			$join_status = $db->fetch_single_data("agency_models","join_status",["id" => $agency_model_id]);
			$join_at = $db->fetch_single_data("agency_models","join_at",["id" => $agency_model_id]);
			if($join_status < 2){
				$join_mode = $db->fetch_single_data("agency_models","mode",["id" => $agency_model_id]);
				if($join_mode == 1){
					echo "<span style='padding:5px;' class='btn-success'>".v("this_model_has_asked_to_join_with_you")."</span><br><br>";
					echo "<input value='".v("accept_join")."' type='button' onclick=\"joinRequestUpdate('".$agency_model_id."','2');\" class='btn btn-primary'>";
					echo "&nbsp;";
					echo "<input value='".v("reject_join")."' type='button' onclick=\"joinRequestUpdate('".$agency_model_id."','3');\" class='btn btn-danger'>";
				}
				if($join_mode == 2) echo "<div class='col-sm-12 btn-success text-center'><b>".v("waiting_for_join_approval")."</b></div>";
			}
			if($join_status == 2) echo "<div class='col-sm-12 btn-success text-center'><b>".v("joined")." ".v("at")." ".format_tanggal($join_at)."</b></div>";
			if($join_status == 3) echo "<div class='col-sm-12 btn-danger text-center'><b>".v("join_rejected")." ".v("at")." ".format_tanggal($join_at)."</b></div>";
		}
	}
?>