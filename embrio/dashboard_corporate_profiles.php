<br>
	PIC :
	<div class="container" style="width:100%"><?=$corporate_profile["pic"];?></div>
<div style="width:590px;border-top:1px solid #888;"></div>
	Address :
	<div class="container" style="width:100%">
		<?=str_replace([chr(10),chr(13)],["<br>",""],$corporate_profile["address"]);?><br>
		<?=$db->fetch_single_data("locations","name_".$__locale,["id"=>$corporate_profile["location_id"]])." - ".$corporate_profile["zipcode"];?>
	</div>
<div style="width:590px;border-top:1px solid #888;"></div>
	Phone :
	<div class="container" style="width:100%"><?=$corporate_profile["phone"];?></div>
<div style="width:590px;border-top:1px solid #888;"></div>
	Cellphone :
	<div class="container" style="width:100%"><?=$corporate_profile["cellphone"];?></div>
<div style="width:590px;border-top:1px solid #888;"></div>
	Web :
	<div class="container" style="width:100%"><?=$corporate_profile["web"];?></div>
<div style="width:590px;border-top:1px solid #888;"></div>
	NPWP :
	<div class="container" style="width:100%"><?=$corporate_profile["npwp"];?></div>
<div style="width:590px;border-top:1px solid #888;"></div>
<?php if($corporate_profile["ig"]!=""){ ?> Instagram :<div class="container" style="width:100%"><?=$corporate_profile["ig"];?></div><?php } ?>
<?php if($corporate_profile["fb"]!=""){ ?> Facebook:<div class="container" style="width:100%"><?=$corporate_profile["fb"];?></div><?php } ?>
<?php if($corporate_profile["tw"]!=""){ ?> Twitter :<div class="container" style="width:100%"><?=$corporate_profile["tw"];?></div><?php } ?>
<?php if($corporate_profile["ig"]!="" || $corporate_profile["fb"]!="" || $corporate_profile["tw"]!=""){ ?> <div style="width:590px;border-top:1px solid #888;"></div> <?php } ?>

	<?=v("about");?> :
	<div class="container" style="width:100%"><?=$corporate_profile["about"];?></div>
<div style="width:590px;border-top:1px solid #888;"></div>
<br>
<input style="width:590px;" value="<?=v("edit_profile");?>" type="button" onclick="window.location='dashboard_corporate_profile_edit.php';" class="btn btn-primary">
<br><br>