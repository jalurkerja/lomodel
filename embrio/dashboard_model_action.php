<?php
	if(isset($_POST["job_done"])){
		$booking_id = $_POST["booking_id"];
		$token = $_POST["token"];
		if($db->fetch_single_data("bookings","book_user_token",["id" => $booking_id]) == $token){
			$db->addtable("bookings");		$db->where("id",$booking_id);
			$db->addfield("user_is_done");	$db->addvalue("1");
			$db->addfield("user_done_at");	$db->addvalue($__now);
			$db->addfield("user_done_by");	$db->addvalue($__username);
			$db->addfield("user_done_ip");	$db->addvalue($_SERVER["REMOTE_ADDR"]);
			$db->update();
			$_SESSION["message"] = "Thanks, Your job was done";
			?>
				<form method="POST" id="frmRefresh">
					<input type="hidden" name="tabActive" value="bookings">
				</form>
				<script> frmRefresh.submit(); </script>
			<?php
			exit();
		} else {
			$_GET["tabActive"] = "bookings";
			?> <script> toastr.warning("Invalid token, please try again!","",toastroptions); </script> <?php
		}
	}
	
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
	
	if(isset($_POST["accepting_join"])){
		$agency_model_id = $_POST["agency_model_id"];
		$db->addtable("agency_models");	$db->where("id",$agency_model_id);
		$db->addfield("join_status");	$db->addvalue("2");
		$db->addfield("join_at");		$db->addvalue($__now);
		$db->addfield("updated_at");	$db->addvalue($__now);
		$db->addfield("updated_by");	$db->addvalue($__username);
		$db->addfield("updated_ip");	$db->addvalue($_SERVER["REMOTE_ADDR"]);
		$db->update();
		$_SESSION["message"] = "Join Offer Accepted.";
		?>
			<form method="POST" id="frmRefresh">
				<input type="hidden" name="tabActive" value="joinOffers">
			</form>
			<script> frmRefresh.submit(); </script>
		<?php
		exit();
	}
	
	if(isset($_POST["rejecting_join"])){
		$agency_model_id = $_POST["agency_model_id"];
		$db->addtable("agency_models");	$db->where("id",$agency_model_id);
		$db->addfield("join_status");	$db->addvalue("3");
		$db->addfield("join_notes");	$db->addvalue($_POST["join_notes"]);
		$db->addfield("join_at");		$db->addvalue($__now);
		$db->addfield("updated_at");	$db->addvalue($__now);
		$db->addfield("updated_by");	$db->addvalue($__username);
		$db->addfield("updated_ip");	$db->addvalue($_SERVER["REMOTE_ADDR"]);
		$db->update();
		$_SESSION["message"] = "Join Offer Rejected.";
		?>
			<form method="POST" id="frmRefresh">
				<input type="hidden" name="tabActive" value="joinOffers">
			</form>
			<script> frmRefresh.submit(); </script>
		<?php
		exit();
	}
?>