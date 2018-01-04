<br>
<div class="col-lg-7 well">
	<form role="form" method="POST" action="?tabActive=jobs&post_a_job=1" autocomplete="off" enctype="multipart/form-data">
		<div class="form-group">
			<label>Title</label>
			<?=$f->input("title",$_POST["title"],"","form-control");?><br>

			<label>Casting Categories</label>
			<?=$f->select_multiple("work_category_ids",$db->fetch_select_data("work_categories","id","name"),null,"","form-control");?><br>
			
			<label>Model Categories</label>
			<?=$f->select_multiple("model_category_ids",$db->fetch_select_data("model_categories","id","name_".$__locale),null,"","form-control");?><br>
			
			<label>Job Description</label>
			<?=$f->textarea("description",$_POST["description"],"cols='75' rows='5'","form-control");?><br>
			
			<label>Requirement</label>
			<?=$f->textarea("requirement",$_POST["requirement"],"cols='75' rows='5'","form-control");?><br>

			<label>Minimum Experience (Year)</label>
			<b>0&nbsp;&nbsp;</b><input id="experience_years" name="experience_years" type="text" class="span2" value="" data-slider-min="0" data-slider-max="50" data-slider-step="1" data-slider-value="1"/><b>&nbsp;&nbsp;50</b><br><br>
			
			<label>Gender</label>
			<?=$f->select_multiple("gender_ids",$db->fetch_select_data("genders","id","name"),null,"","form-control");?><br>
			
			<label>Age (Year)</label>
			<b>17&nbsp;&nbsp;</b><input id="age" name="age" type="text" class="span2" value="" data-slider-min="17" data-slider-max="70" data-slider-step="1" data-slider-value="[18,30]"/><b>&nbsp;&nbsp;70</b><br><br>
			
			
			<label>Casting At</label>
			<div class="col-md-12">
				<table cellpadding="0" cellspacing="0">
					<tr>
						<td><?=$f->input("casting_start",$_POST["casting_start"],"type='date'","form-control");?></td>
						<td>&nbsp;to&nbsp;</td>
						<td><?=$f->input("casting_end",$_POST["casting_end"],"type='date'","form-control");?></td>
					</tr>
				</table>
				<br>
			</div>
			
			<label>Event At</label>
			<div class="col-md-12">
				<table cellpadding="0" cellspacing="0">
					<tr>
						<td><?=$f->input("start_at",$_POST["start_at"],"type='date'","form-control");?></td>
						<td>&nbsp;to&nbsp;</td>
						<td><?=$f->input("end_at",$_POST["end_at"],"type='date'","form-control");?></td>
					</tr>
				</table>
				<br>
			</div>
			
			<label>Image Reference</label>
			<?=$f->input("image",$_POST["image"],"type='file'","form-control");?><br>
			
			<?=$f->input("posting","Post","type='submit' style='width:100%;'","btn btn-lg btn-info");?>
		</div>
	</form>
	<script> 
		$("#experience_years").slider({});
		$("#age").slider({});
	</script>
</div>