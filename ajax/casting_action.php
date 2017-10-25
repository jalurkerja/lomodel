<?php 
	include_once "../common.php";
	$id = $_GET["id"];
	$mode = $_GET["mode"];
	if($mode == "apply"){
		echo $js->apply_job($__user_id,$id);
	}
	if($mode == "isApplied"){
		echo $js->is_applied($__user_id,$id);
	}
?>