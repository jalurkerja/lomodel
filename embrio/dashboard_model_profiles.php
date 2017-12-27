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
<div class="container"><?=$db->fetch_single_data("model_categories","name_".$__locale,["id" => $model_profile["model_category_ids"]]);?></div>
<div style="width:590px;border-top:1px solid #888;"></div>

Address :
<div class="container">
	<?=str_replace([chr(10),chr(13)],["<br>",""],$model_profile["address"]);?><br>
	<?=$db->fetch_single_data("locations","name_".$__locale,["id" =>$model_profile["location_id"]]);?>
</div>
<div style="width:590px;border-top:1px solid #888;"></div>

<?php if($model_profile["ig"]!=""){ ?> Instagram :<div class="container"><?=$model_profile["ig"];?></div><?php } ?>
<?php if($model_profile["fb"]!=""){ ?> Facebook:<div class="container"><?=$model_profile["fb"];?></div><?php } ?>
<?php if($model_profile["tw"]!=""){ ?> Twitter :<div class="container"><?=$model_profile["tw"];?></div><?php } ?>
<?php if($model_profile["ig"]!="" || $model_profile["fb"]!="" || $model_profile["tw"]!=""){ ?> <div style="width:590px;border-top:1px solid #888;"></div> <?php } ?>
<br>
<input style="width:590px;" value="<?=v("edit_profile");?>" type="button" onclick="window.location='dashboard_model_profile_edit.php';" class="btn btn-primary">