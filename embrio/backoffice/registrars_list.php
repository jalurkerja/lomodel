<?php include_once "head.php";?>
<?php
	$srcEmail = $f->input("srcEmail",@$_GET["srcEmail"]);
	$srcRole = $f->select_multiple("srcRole",["2" => "Personal","3" => "Agency","4" => "Corporate","5" => "Model"],@$_GET["srcRole"],"style='height:100px;'");
	$srcVerified = $f->select("srcVerified",["" => "All","2" => "Not Yet","1" => "Verified"],@$_GET["srcVerified"],"style='height:20px;'");
?>
<div class="bo_title">Registrars</div>
<div id="bo_expand" onclick="toogle_bo_filter();">[+] View Filter</div>
<div id="bo_filter">
	<div id="bo_filter_container">
		<?=$f->start("filter","GET");?>
			<?=$t->start();?>
			<?=$t->row(["Email",$srcEmail]);?>
			<?=$t->row(["Role",$srcRole]);?>
			<?=$t->row(["Verified",$srcVerified]);?>
			<?=$t->end();?>
			<?=$f->input("page","1","type='hidden'");?>
			<?=$f->input("sort",@$_GET["sort"],"type='hidden'");?>
			<?=$f->input("do_filter","Load","type='submit'");?>
			<?=$f->input("reset","Reset","type='button' onclick=\"window.location='?';\"");?>
		<?=$f->end();?>
	</div>
</div>

<?php
	$whereclause = "role BETWEEN 2 AND 5 AND ";
	if(!isset($_GET["do_filter"])) $whereclause .= "verified = 0 AND ";
	if(@$_GET["srcEmail"] != "") $whereclause .= "email LIKE '%".$_GET["srcEmail"]."%' AND ";
	if(@$_GET["srcRole"] != ""){
		$whereclause .= "role IN (";
		foreach($_GET["srcRole"] as $key => $role){
			$whereclause .= $role.",";
		}
		$whereclause = substr($whereclause,0,-1);
		$whereclause .= ") AND ";
	}
	if(@$_GET["srcVerified"]){
		if(@$_GET["srcVerified"] == "2") $_GET["srcVerified"] = "0";
		$whereclause .= "verified = '".$_GET["srcVerified"]."' AND ";
	}
	
	$db->addtable("a_users");
	if($whereclause != "") $db->awhere(substr($whereclause,0,-4));$db->limit($_max_counting);
	$maxrow = count($db->fetch_data(true));
	$start = getStartRow(@$_GET["page"],$_rowperpage);
	$paging = paging($_rowperpage,$maxrow,@$_GET["page"],"paging");
	
	$db->addtable("a_users");
	if($whereclause != "") $db->awhere(substr($whereclause,0,-4));$db->limit($start.",".$_rowperpage);
	if(@$_GET["sort"] != "") $db->order($_GET["sort"]);
	$users = $db->fetch_data(true);
?>
	<?=$paging;?>
	<?=$t->start("","data_content");?>
	<?=$t->header(array("No",
						"<div onclick=\"sorting('email');\">Email</div>",
						"<div onclick=\"sorting('name');\">Name</div>",
						"<div onclick=\"sorting('role');\">Role</div>",
						"<div onclick=\"sorting('created_at');\">Created At</div>",
						"Photo",
						"<div onclick=\"sorting('verified');\">Verified</div>",
						""));?>
	<?php foreach($users as $no => $user){ ?>
		<?php
			$actions = "<a href=\"registrars_view.php?id=".$user["id"]."\">Detail</a>";
			$verified = ($user["verified"] == "0") ? "<font color='red'>Not Yet</font>" : "<font color='#0CB31D'>Verified</font>";
			$photo = "";
			if($user["role"] == "2"){
				$role = "Personal";
				$name = $db->fetch_single_data("personal_profiles","name",["user_id" => $user["id"]]);
				$photo = $db->fetch_single_data("personal_profiles","photo",["user_id" => $user["id"]]);
			} else if($user["role"] == "3"){
				$role = "Agency";
				$name = $db->fetch_single_data("agency_profiles","name",["user_id" => $user["id"]]);
				$photo = $db->fetch_single_data("agency_profiles","photo",["user_id" => $user["id"]]);
			} else if($user["role"] == "4"){
				$role = "Corporate";
				$name = $db->fetch_single_data("corporate_profiles","name",["user_id" => $user["id"]]);
				$photo = $db->fetch_single_data("corporate_profiles","logo",["user_id" => $user["id"]]);
			} else if($user["role"] == "5"){
				$role = "Model";
				$name = $db->fetch_single_data("model_profiles","concat(first_name,' ',middle_name,' ',last_name)",["user_id" => $user["id"]]);
				$photo = $db->fetch_single_data("model_profiles","photo",["user_id" => $user["id"]]);
			}			
			if($photo && file_exists("../user_images/".$photo)) {
				$photo = "<img src='../user_images/".$photo."' height='100'>";
			} else {
				$photo = "<img src='../user_images/nophoto.png' height='100'>";
			}
		?>
		<?=$t->row(
					array("<a href=\"registrars_view.php?id=".$user["id"]."\">".($no+$start+1)."</a>",
						$user["email"],
						$name,
						$role,
						format_tanggal($user["created_at"],"dMY"),
						$photo,
						$verified,
						$actions),
					array("align='right' valign='top'","","","","","","","")
				);?>
	<?php } ?>
	<?=$t->end();?>
	<?=$paging;?>
	
<?php include_once "footer.php";?>