<?php
	if(isset($_POST["accepting"])){
		$booking_id = $_POST["booking_id"];
		$db->addtable("bookings");		$db->where("id",$booking_id);
		$db->addfield("status");		$db->addvalue("2");
		$db->addfield("accepted");		$db->addvalue("1");
		$db->addfield("accepted_at");	$db->addvalue($__now);
		$db->addfield("accepted_ip");	$db->addvalue($_SERVER["REMOTE_ADDR"]);
		$db->update();
		$_SESSION["message"] = "Accepting booking succesed.";
		?>
			<form method="POST" id="frmRefresh">
				<input type="hidden" name="tabActive" value="bookings">
			</form>
			<script> frmRefresh.submit(); </script>
		<?php
		exit();
	}
	
	if(isset($_POST["rejecting"])){
		$booking_id = $_POST["booking_id"];
		$db->addtable("bookings");		$db->where("id",$booking_id);
		$db->addfield("status");		$db->addvalue("3");
		$db->addfield("accepted");		$db->addvalue("2");
		$db->addfield("accepted_notes");$db->addvalue($_POST["accepted_notes"]);
		$db->addfield("accepted_at");	$db->addvalue($__now);
		$db->addfield("accepted_ip");	$db->addvalue($_SERVER["REMOTE_ADDR"]);
		$db->update();
		$_SESSION["message"] = "Booking rejected.";
		?>
			<form method="POST" id="frmRefresh">
				<input type="hidden" name="tabActive" value="bookings">
			</form>
			<script> frmRefresh.submit(); </script>
		<?php
		exit();
	}
?>