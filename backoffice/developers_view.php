<?php include_once "head.php";?>
<?php $developer = $db->fetch_all_data("developers",[],"id='".$_GET["id"]."'")[0];?>
<div class="bo_title">Developer<br><?=$developer["name"];?></div>
<?=$t->start("","editor_content");?>
	<?=$t->row(array("Tentang Developer",$developer["about"]),["","style=\"width:400px;\""]);?>
	<?=$t->row(array("Telpon",$developer["phone"]));?>
	<?=$t->row(array("Alamat",$developer["address"]));?>
	<?=$t->row(array("Bank",$developer["bank_name"]." - ".$developer["bank_account"]));?>
	<?=$t->row(array("Tanggal dibuat",format_tanggal($developer["created_at"],"dMY")));?>
	<?=$t->row(array("Terakhir di Update",format_tanggal($developer["updated_at"],"dMY")));?>
<?=$t->end();?>
<h3><b>PROYEK :</b></h3>
<?=$t->start("","data_content");?>
<?=$t->header(["No",
				"Nama Proyek",
				"Deskripsi",
				"Lokasi",
				"Kebutuhan Dana",
				"Dana Terkumpul",
				"Tgl Dibuat",
			  ""]
			 );?>
<?php 
	foreach($db->fetch_all_data("developer_projects",[],"developer_id='".$_GET["id"]."'") as $no => $project){
		$actions = 	"<a href=\"projects_view.php?id=".$project["id"]."\" target=\"_BLANK\">View</a>";
		$fund_collected = $db->fetch_single_data("fundings","concat(sum(fund))",["developer_project_id" => $project["id"]]);
?>
		<?=$t->row([$no+1,
					$project["name"],
					$project["description"],
					$project["address"],
					format_amount($project["fund"]),
					format_amount($fund_collected),
					format_tanggal($project["created_at"],"dMY",true),
				    $actions],
				   ["align='right' valign='top'","","style=\"width:600px;\"","","align='right' valign='top'","align='right' valign='top'"]);?>
<?php
	}
?>
<?=$t->end();?>
<br>
<?=$f->input("back","Back","type='button' onclick=\"window.location='developers_list.php';\"");?>
<?php include_once "footer.php";?>