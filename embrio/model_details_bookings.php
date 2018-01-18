<br>
<div class="col-lg-12 well">
	<?php if($__role == 3 || $__role == 4){ ?>
		<form role="form" action="model_booking.php?user_id=<?=$_GET["user_id"];?>" method="POST" autocomplete="off">
			<div class="form-group">
				<label>Job Description</label>
				<?=$f->textarea("description",$_POST["description"],"cols='75' rows='5'","form-control");?><br>
				
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
				
				<label>Casting Address</label>
				<?=$f->textarea("casting_address",$_POST["casting_address"],"cols='75' rows='5'","form-control");?><br>
				
				<label>Casting Location</label>
				<?=$f->select("casting_location",$db->fetch_select_data("locations","id","name_".$__locale,["province_id" => "0:>"],["name_".$__locale]),$_POST["casting_location"],"","form-control");?><br>
				
				<label>Fee (Rp)</label>
				<?=$f->input("fee",$_POST["fee"],"type='number' step='1'","form-control");?><br>
				<?=$f->input("booking","Booking","type='submit' style='width:100%;'","btn btn-lg btn-info");?>
			</div>
		</form>
	<?php } else { ?>
		<label style="color:red;"><?=v("you_have_to_registered_as_a_agency_or_corporate");?></label>
	<?php } ?>
</div>