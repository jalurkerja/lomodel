<?php include_once "homepage_header.php"; ?>
<?php include_once "main_container.php"; ?>
	<?php 
		if($__role != 2 && $__role != 3 && $__role != 4){
			?> <script> window.location = "index.php"; </script> <?php
			exit();
		}
		
		if($_GET["user_id"] > 0){
			$model_profile = $db->fetch_all_data("model_profiles",[],"user_id='".$_GET["user_id"]."'")[0];
			$model = $db->fetch_all_data("model_files",[],"user_id='".$_GET["user_id"]."'")[0];
		}
		
		if(isset($_POST["send_booking_proposal"])){
			$user_token = "";		for($i=0;$i<5;$i++){ $user_token .= rand(0,4).rand(5,9); }
			$book_user_token = "";	for($i=0;$i<5;$i++){ $book_user_token .= rand(5,9).rand(0,4); }
			$db->addtable("bookings");
			$db->addfield("user_id");			$db->addvalue($__user_id);
			$db->addfield("book_user_id");		$db->addvalue($_POST["book_user_id"]);
			$db->addfield("user_token");		$db->addvalue($user_token);
			$db->addfield("book_user_token");	$db->addvalue($book_user_token);
			$db->addfield("description");		$db->addvalue($_POST["description"]);
			$db->addfield("casting_start");		$db->addvalue($_POST["casting_start"]);
			$db->addfield("casting_end");		$db->addvalue($_POST["casting_end"]);
			$db->addfield("casting_address");	$db->addvalue($_POST["casting_address"]);
			$db->addfield("casting_location");	$db->addvalue($_POST["casting_location"]);
			$db->addfield("fee");				$db->addvalue($_POST["fee"]);
			$inserting = $db->insert();
			if($inserting["affected_rows"] > 0){
				$booking_id = $inserting["insert_id"];				
				$invoice_no = "INV/BOOK/".date("ymd")."/";
				$last_invoice = $db->fetch_single_data("invoices","invoice_no",["invoice_no"=>$invoice_no."%:LIKE"],["invoice_no DESC"]);
				if($last_invoice){
					$last_invoice = str_replace($invoice_no,"",$last_invoice) * 1;
					$invoice_no = $invoice_no.substr("000",0,3-strlen($last_invoice)).$last_invoice;
				} else {
					$invoice_no = $invoice_no."001";
				}
				$fee = $_POST["fee"];
				$uniq_code = rand(0,9).rand(0,9).rand(0,9);
				
				$db->addtable("invoices");
				$db->addfield("invoice_no");	$db->addvalue($invoice_no);
				$db->addfield("user_id");		$db->addvalue($__user_id);
				$db->addfield("mode");			$db->addvalue(1);
				$db->addfield("booking_id");	$db->addvalue($booking_id);
				$db->addfield("ammount");		$db->addvalue($fee);
				$db->addfield("uniq_code");		$db->addvalue($uniq_code);
				$db->addfield("total");			$db->addvalue($fee + $uniq_code);
				$db->addfield("status");		$db->addvalue(0);
				$inserting = $db->insert();
				$invoice_id = $inserting["insert_id"];
				?><script> window.location="?mode=payment_confirmation&invoice_id=<?=$invoice_id;?>"; </script><?php
			}
		}
		
		if(isset($_POST["payment"])){
			$db->addtable("invoices");		$db->where("id",$_POST["invoice_id"]);
			$db->addfield("method");		$db->addvalue("transfer");
			$db->addfield("bank_an");		$db->addvalue($_POST["bank_an"]);
			$db->addfield("bank");			$db->addvalue($_POST["bank"]);
			$db->addfield("transfer_at");	$db->addvalue($_POST["transfer_at"]);
			$db->addfield("account");		$db->addvalue($_POST["account"]);
			$updating = $db->update();
			?><script> window.location="?mode=payment_confirmed"; </script><?php
		}
	?>
	<div class="container">
		<?php if($_GET["mode"] == ""){ ?>
			<h3>Booking Proposal</h3>
			<div class="well">
				Kami memberikan penawaran pekerjaan / casting kepada :<br>
				<img height="200" src="user_images/<?=$model["filename"];?>"><br>
				<b><i><?=$model_profile["first_name"];?> <?=$model_profile["middle_name"];?> <?=$model_profile["last_name"];?></i></b><br>
				dengan deskripsi pekerjaan :<br>
				<i><?=str_replace(chr(13).chr(10),"<br>",$_POST["description"]);?></i><br><br>
				yang akan dilaksanakan pada tanggal:<br>
				<i><?=format_tanggal($_POST["casting_start"]);?> s/d <?=format_tanggal($_POST["casting_end"]);?></i><br><br>
				di:<br>
				<i><?=str_replace(chr(13).chr(10),"<br>",$_POST["casting_address"]);?></i><br>
				<i><?=$db->fetch_single_data("locations","name_id",["id" => $_POST["casting_location"]]);?></i><br><br>
				
				Kami menawarkan pekerjaan ini dengan nilai:
				<h3><b>Rp. <?=format_amount($_POST["fee"],2);?></b></h3>
				<br>
				<form method="POST">
					<input type="hidden" name="book_user_id" value="<?=$_GET["user_id"];?>">
					<input type="hidden" name="description" value="<?=$_POST["description"];?>">
					<input type="hidden" name="casting_start" value="<?=$_POST["casting_start"];?>">
					<input type="hidden" name="casting_end" value="<?=$_POST["casting_end"];?>">
					<input type="hidden" name="casting_address" value="<?=$_POST["casting_address"];?>">
					<input type="hidden" name="casting_location" value="<?=$_POST["casting_location"];?>">
					<input type="hidden" name="fee" value="<?=$_POST["fee"];?>">
					<?=$f->input("send_booking_proposal","Kirim Booking Proposal","type='submit' style='width:100%;'","btn btn-lg btn-info");?>
				</form>
			</div>
		<?php } ?>
		<?php if($_GET["mode"] == "payment_confirmation"){ ?>
			<?php
				$invoice = $db->fetch_all_data("invoices",[],"id='".$_GET["invoice_id"]."'")[0];
				$booking = $db->fetch_all_data("booking",[],"id='".$invoice["booking_id"]."'")[0];
				$model_profile = $db->fetch_all_data("model_profiles",[],"user_id='".$booking["book_user_id"]."'")[0];
				$model = $db->fetch_all_data("model_files",[],"user_id='".$booking["book_user_id"]."'")[0];
			?>
			<h2 class="well">Payment</h2>
			<div class="well">
				<u>Detail Invoice:</u><br>
				<i>
					<b>Invoice No : <?=$invoice["invoice_no"];?></b><br><br>
					Booking model dengan nama <b><?=$model_profile["first_name"];?> <?=$model_profile["middle_name"];?> <?=$model_profile["last_name"];?></b><br>
					<table width="200">
						<tr><td colspan="3" nowrap>Dengan nilai :</td><tr>
						<tr><td style="width:35px;"></td><td>Rp. </td><td align="right"><?=format_amount($invoice["ammount"],2);?></td></tr>
						<tr><td colspan="3" nowrap>Kode Unik <span style="color:red;">*</span> :</td><tr>
						<tr><td style="width:35px;"></td><td>Rp. </td><td align="right"><?=format_amount($invoice["uniq_code"],2);?></td></tr>
						<tr><td colspan="3" nowrap><b>Total:</b></td><tr>
						<tr><td style="width:35px;"></td><td><b>Rp. </b></td><td align="right"><b><?=format_amount($invoice["total"],2);?></b></td></tr>
					</table>
					<br>
					<p><i>*) Kode Unik adalah 3 digit angka yang kami tambahkan di belakang nominal total biaya transaksi Anda. Tujuannya adalah untuk mempermudah bagian keuangan Kami dalam melakukan verifikasi atas pembayaran yang sudah Anda lakukan.</i></p>
					<br><br>
					<u>Harap dibayarkan ke :</u><br>
					Bank BCA<br>No Rekening: 504.0304.098<br>a/n PT INDO HUMAN RESOURCE
					<br><br>
					<u>Data Pembayaran :</u><br>
					<p>Jika Anda sudah melakukan pembayaran, silakan isi form berikut untuk mengkonfirmasi pembayaran Anda.</p>
					<form method="POST">
						<input type="hidden" name="invoice_id" value="<?=$_GET["invoice_id"];?>">
						<table>
							<tr><td>Nama Pemilik Rekening &nbsp;&nbsp;&nbsp;</td><td nowrap><?=$f->input("bank_an","","","form-control");?></td></tr>
							<tr><td>No Rekening Bank Pengirim  &nbsp;&nbsp;&nbsp;</td><td nowrap><?=$f->input("account","","","form-control");?></td></tr>
							<tr><td>Nama Bank Pengirim  &nbsp;&nbsp;&nbsp;</td><td nowrap><?=$f->input("bank","","","form-control");?></td></tr>
							<tr><td>Tanggal Transfer  &nbsp;&nbsp;&nbsp;</td><td nowrap><?=$f->input("transfer_at",date("Y-m-d"),"type='date'","form-control");?></td></tr>
						</table>
						<br>
						<?=$f->input("payment","Konfirmasi","type='submit' style='width:100%;'","btn btn-lg btn-info");?>
					</form>
					<br>
				</i><br>				
			</div>
		<?php } ?>
		<?php if($_GET["mode"] == "payment_confirmed"){ ?>
			<h2 class="well">Payment</h2>
			<div class="well">
				<p>Konfirmasi pembayaran Anda telah berhasil dikirim ke bagian keuangan Kami, mohon tunggu verifikasi pembayaran Anda. Terima Kasih.</p><br>
				<?=$f->input("dashboard",v("back_to_dashboard"),"type='button' style='width:100%;' onclick=\"window.location='dashboard.php'\"","btn btn-lg btn-info");?>
			</div>
		<?php } ?>
		
	</div>
<?php include_once "main_container_end.php"; ?>
<?php include_once "footer.php"; ?>