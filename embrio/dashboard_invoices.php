<br>
<div>
	<?php 
		$invoices = $db->fetch_all_data("invoices",[],"user_id='".$__user_id."'");
		if(count($invoices) <= 0){
			echo "<span class='col-sm-12 well' style='color:red;'>".v("data_not_found")."</span>";
		} else {
			?>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Invoice No</th>
						<th>Date</th>
						<th>Total</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
			<?php
			foreach($invoices as $invoice){
				$btn_class = ($invoice["status"] == 0)?"btn-danger" : "btn-primary";
				$status = ($invoice["status"] == 0)?"Unpaid" : "Paid";
		?>
					<tr>
						<td><?=$invoice["invoice_no"];?></td>
						<td><?=format_tanggal($invoice["created_at"],"dMY");?></td>
						<td align ="right">Rp. <?=format_amount($invoice["total"]);?></td>
						<td><input type="button" class="btn <?=$btn_class;?>" value="<?=$status;?>" onclick="window.location='model_booking.php?mode=payment_confirmation&invoice_id=<?=$invoice["id"];?>';"></td>
					</tr>
		<?php } ?>
				</tbody>
			</table>
	<?php } ?>
</div>
<br><br>