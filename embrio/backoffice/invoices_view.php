<?php include_once "head.php";?>
<script>
	function pay_this(status,payment_at){
		payment_at = payment_at || "";
		if(status == 1) var message = "Anda yakin akan melakukan proses konfirmasi pembayaran pada invoice ini?";
		if(status == 2) var message = "Anda yakin akan melakukan proses pembatalan pada invoice ini?";
		if(confirm(message)) window.location="?pay="+status+"&id=<?=$_GET["id"];?>&payment_at="+payment_at;
	}
</script>
<div class="bo_title">Invoice</div>
<?php
	if(isset($_GET["pay"])){		
		$db->addtable("invoices");				$db->where("id",$_GET["id"]);
		if(isset($_GET["payment_at"])){
			$db->addfield("transfer_at");		$db->addvalue($_GET["payment_at"]);
		}
		$db->addfield("status");				$db->addvalue($_GET["pay"]);
		$updating = $db->update();
		if($updating["affected_rows"] >= 0){			
			$db->addtable("bookings");			$db->where("id",$_GET["id"]);
			$db->addfield("status");			$db->addvalue(1);
			$updating = $db->update();
			javascript("alert('Data Berhasil tersimpan');");
			javascript("window.location='".str_replace("_view","_list",$_SERVER["PHP_SELF"])."';");
		} else {
			echo $updating["error"];
			javascript("alert('Data gagal tersimpan');");
		}
	}
	
	$db->addtable("invoices"); $db->where("id",$_GET["id"]); $db->limit(1); $invoice = $db->fetch_data();

?>
<?php
	$confirmation_form = '<h3><b>Booking Model</b></h3><br>';
	$confirmation_form .= '<table width="800">';
	$confirmation_form .= '	<tr><td>Email</td><td>:</td><td>'.$db->fetch_single_data("a_users","email",array("id" => $invoice["user_id"])).'</td></tr>';
	$confirmation_form .= '	<tr><td>Ammount</td><td>:</td><td>Rp. '.number_format($invoice["ammount"],0,",",".").'</td></tr>';
	$confirmation_form .= '	<tr><td>Kode Unik</td><td>:</td><td>Rp. '.number_format($invoice["uniq_code"],0,",",".").'</td></tr>';
	$confirmation_form .= '	<tr><td><b>Total</b></td><td>:</td><td><b>Rp. '.number_format($invoice["total"],0,",",".").'</b></td></tr>';
	$confirmation_form .= '	<tr><td><b>Pembayaran untuk</b></td><td>:</td><td>Booking Model</td></tr>';
	$confirmation_form .= '	<tr><td>Payment Date</td><td>:</td><td>'.$f->input("payment_at",date("Y-m-d"),"type='date' style='width:150px;'").'</td></tr>';
	$confirmation_form .= '	<tr><td>Metode Pembayaran</td><td>:</td><td>Transfer Bank</td></tr>';
	$confirmation_form .= '	<tr><td valign="top">Tujuan Transfer</td><td valign="top">:</td><td valign="top">Bank BCA<br>504.0304.098<br>PT INDO HUMAN RESOURCE</td></tr>';
	$confirmation_form .= '	<tr><td><br></td></tr>';
	$confirmation_form .= '	<tr><td><br><br></td></tr>';
	echo $confirmation_form .= '</table>';
	if($invoice["status"] == 0){
		echo $f->input("pay","Pay","onclick='pay_this(1,payment_at.value);' type='button'");
		echo "&nbsp;&nbsp;&nbsp;";
		echo $f->input("cancel","Cancel","onclick='pay_this(2);' type='button'");
	} else {
		if($invoice["status"] == 1) echo "<b>PAID</b>";
		if($invoice["status"] == 2) echo "<b>CANCELED</b>";
	}
	echo "&nbsp;&nbsp;&nbsp;".$f->input("back","Back",'onclick="window.location=\'invoices_list.php\';" type="button"');
?>
<?php include_once "footer.php";?>