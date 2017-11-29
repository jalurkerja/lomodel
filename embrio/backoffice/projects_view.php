<?php include_once "head.php";?>
<?php $project = $db->fetch_all_data("developer_projects",[],"id='".$_GET["id"]."'")[0];?>
<?php $developer = $db->fetch_all_data("developers",[],"id='".$project["developer_id"]."'")[0];?>
<div class="bo_title">Proyek<br><?=$project["name"];?></div>
<?php foreach($db->fetch_all_data("developer_project_attachments",[],"developer_project_id = '".$project["id"]."'") as $project_attachment){ ?>
	<div style="float:left;">
		<img src="../project_attachments/<?=$project_attachment["filename"];?>" width="150">
	</div>
<?php } ?>
<div style="height:150px;"></div>
<?=$t->start("","editor_content");?>
	<?=$t->row(array("Developer",$developer["name"]));?>
	<?=$t->row(array("Tentang Proyek",$project["description"]),["","style=\"width:400px;\""]);?>
	<?=$t->row(array("Lokasi",$project["address"]));?>
	<?=$t->row(array("Kebutuhan Dana",format_amount($project["fund"])));?>
	<?=$t->row(array("Tanggal dibuat",format_tanggal($project["created_at"],"dMY")));?>
	<?=$t->row(array("Terakhir di Update",format_tanggal($project["updated_at"],"dMY")));?>
<?=$t->end();?>
<hr>
<h3><b>INVESTOR :</b></h3>
<?=$t->start("","data_content");?>
<?=$t->header(["No",
				"Nama",
				"Jenis Kelamin",
				"Phone",
				"Tempat / Tanggal Lahir",
				"Investasi",
				"Tgl Investasi",
			  ""]
			 );?>
<?php 
	$total = 0;
	foreach($db->fetch_all_data("fundings",[],"developer_project_id='".$_GET["id"]."'") as $no => $funding){
		$investor = $db->fetch_all_data("investors",[],"user_id='".$funding["user_id"]."'")[0];
		$actions = 	"<a href=\"investors_view.php?id=".$investor["id"]."\" target=\"_BLANK\">View</a>";
		$total += ($funding["fund"]);
?>
		<?=$t->row([$no+1,
					$investor["name"],
					$investor["gender"] == "M" ? "Pria":"Wanita",
					$investor["phone"],
					$investor["birth_place"]." / ".format_tanggal($investor["birth_date"],"dMY"),
					format_amount($funding["fund"]),
					format_tanggal($funding["created_at"],"dMY"),
				    $actions],
				   ["align='right' valign='top'","","","","","align='right' valign='top'","11"]);?>
<?php
	}
?>
<?=$t->row(["","","","","<b>Total Dana Terkumpul</b>","<b>".format_amount($total)."</b>",""],["","","","","","align='right'",""]);?>
<?=$t->end();?>
<br>
<?=$f->input("back","Back","type='button' onclick=\"window.location='projects_list.php';\"");?>
<?php include_once "footer.php";?>