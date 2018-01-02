<br>

	PIC :
	<div class="container"><?=$agency_profile["pic"];?></div>
<div style="width:590px;border-top:1px solid #888;"></div>
	<?=v("idcard");?> :
	<div class="container"><?=$agency_profile["idcard"];?></div>
<div style="width:590px;border-top:1px solid #888;"></div>
	Address :
	<div class="container">
		<?=str_replace([chr(10),chr(13)],["<br>",""],$agency_profile["address"]);?><br>
		<?=$db->fetch_single_data("locations","name_".$__locale,["id"=>$agency_profile["location_id"]])." - ".$agency_profile["zipcode"];?>
	</div>
<div style="width:590px;border-top:1px solid #888;"></div>
	Phone :
	<div class="container"><?=$agency_profile["phone"];?></div>
<div style="width:590px;border-top:1px solid #888;"></div>
	Cellphone :
	<div class="container"><?=$agency_profile["cellphone"];?></div>
<div style="width:590px;border-top:1px solid #888;"></div>
	Web :
	<div class="container"><?=$agency_profile["web"];?></div>
<div style="width:590px;border-top:1px solid #888;"></div>
	<?=v("nationality");?> :
	<div class="container"><?=$db->fetch_single_data("nationalities","name",["id"=>$agency_profile["nationality_id"]]);?></div>
<div style="width:590px;border-top:1px solid #888;"></div>
<?php if($agency_profile["ig"]!=""){ ?> Instagram :<div class="container"><?=$agency_profile["ig"];?></div><?php } ?>
<?php if($agency_profile["fb"]!=""){ ?> Facebook:<div class="container"><?=$agency_profile["fb"];?></div><?php } ?>
<?php if($agency_profile["tw"]!=""){ ?> Twitter :<div class="container"><?=$agency_profile["tw"];?></div><?php } ?>
<?php if($agency_profile["ig"]!="" || $agency_profile["fb"]!="" || $agency_profile["tw"]!=""){ ?> <div style="width:590px;border-top:1px solid #888;"></div> <?php } ?>

	<?=v("about");?> :
	<div class="container"><?=$agency_profile["about"];?></div>
<div style="width:590px;border-top:1px solid #888;"></div>

<?php if($model_profile["ig"]!=""){ ?> Instagram :<div class="container"><?=$model_profile["ig"];?></div><?php } ?>
<?php if($model_profile["fb"]!=""){ ?> Facebook:<div class="container"><?=$model_profile["fb"];?></div><?php } ?>
<?php if($model_profile["tw"]!=""){ ?> Twitter :<div class="container"><?=$model_profile["tw"];?></div><?php } ?>
<?php if($model_profile["ig"]!="" || $model_profile["fb"]!="" || $model_profile["tw"]!=""){ ?> <div style="width:590px;border-top:1px solid #888;"></div> <?php } ?>
<br>
<input style="width:590px;" value="<?=v("edit_profile");?>" type="button" onclick="window.location='dashboard_agency_profile_edit.php';" class="btn btn-primary">
<br><br>