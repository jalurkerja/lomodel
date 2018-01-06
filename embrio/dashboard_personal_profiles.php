<br>
	<?=v("idcard");?> :
	<div class="container" style="width:100%"><?=$personal_profile["idcard"];?></div>
<div style="width:590px;border-top:1px solid #888;"></div>
	Address :
	<div class="container" style="width:100%">
		<?=str_replace([chr(10),chr(13)],["<br>",""],$personal_profile["address"]);?><br>
		<?=$db->fetch_single_data("locations","name_".$__locale,["id"=>$personal_profile["location_id"]])." - ".$personal_profile["zipcode"];?>
	</div>
<div style="width:590px;border-top:1px solid #888;"></div>
	Phone :
	<div class="container" style="width:100%"><?=$personal_profile["phone"];?></div>
<div style="width:590px;border-top:1px solid #888;"></div>
	Cellphone :
	<div class="container" style="width:100%"><?=$personal_profile["cellphone"];?></div>
<div style="width:590px;border-top:1px solid #888;"></div>
	Web :
	<div class="container" style="width:100%"><?=$personal_profile["web"];?></div>
<div style="width:590px;border-top:1px solid #888;"></div>
	<?=v("nationality");?> :
	<div class="container" style="width:100%"><?=$db->fetch_single_data("nationalities","name",["id"=>$personal_profile["nationality_id"]]);?></div>
<div style="width:590px;border-top:1px solid #888;"></div>
	<?=v("gender");?> :
	<div class="container" style="width:100%"><?=$db->fetch_single_data("genders","name",["id"=>$personal_profile["gender_id"]]);?></div>
<div style="width:590px;border-top:1px solid #888;"></div>
<?php if($personal_profile["ig"]!=""){ ?> Instagram :<div class="container" style="width:100%"><?=$personal_profile["ig"];?></div><?php } ?>
<?php if($personal_profile["fb"]!=""){ ?> Facebook:<div class="container" style="width:100%"><?=$personal_profile["fb"];?></div><?php } ?>
<?php if($personal_profile["tw"]!=""){ ?> Twitter :<div class="container" style="width:100%"><?=$personal_profile["tw"];?></div><?php } ?>
<?php if($personal_profile["ig"]!="" || $personal_profile["fb"]!="" || $personal_profile["tw"]!=""){ ?> <div style="width:590px;border-top:1px solid #888;"></div> <?php } ?>

	<?=v("about");?> :
	<div class="container" style="width:100%"><?=$personal_profile["about"];?></div>
<div style="width:590px;border-top:1px solid #888;"></div>
<br>
<input style="width:590px;" value="<?=v("edit_profile");?>" type="button" onclick="window.location='dashboard_personal_profile_edit.php';" class="btn btn-primary">
<br><br>