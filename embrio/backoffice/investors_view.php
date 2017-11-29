<?php include_once "head.php";?>
<?php $investor = $db->fetch_all_data("investors",[],"id='".$_GET["id"]."'")[0];?>
<div class="bo_title">Investor<br><?=$investor["name"];?></div>
<?=$t->start("","editor_content");?>
	<?=$t->row(array("Jenis Kelamin",($investor["gender"] == "M") ? "Pria":"Wanita"));?>
	<?=$t->row(array("Tempat/Tgl Lahir",$investor["birth_place"]."/".format_tanggal($investor["birth_date"],"dMY")));?>
	<?=$t->row(array("Telpon",$investor["phone"]));?>
	<?=$t->row(array("Alamat",$investor["address"]));?>
	<?=$t->row(array("Bank",$investor["bank_name"]." - ".$investor["bank_account"]));?>
	<?=$t->row(array("Tanggal dibuat",format_tanggal($investor["created_at"],"dMY")));?>
	<?=$t->row(array("Terakhir di Update",format_tanggal($investor["updated_at"],"dMY")));?>
<?=$t->end();?>
<h3><b>Daftar Investasi:</b></h3>
<?=$t->start("","data_content");?>
<?=$t->header(["No",
				"Nama Proyek",
				"Deskripsi",
				"Lokasi",
				"Kebutuhan Dana",
				"Dana Terkumpul",
				"Investasi",
				"Tgl Dibuat",
			  ""]
			 );?>
<?php 
	foreach($db->fetch_all_data("developer_projects",[],"id IN (SELECT developer_project_id FROM fundings WHERE user_id = '".$investor["user_id"]."')") as $no => $project){
		$actions = 	"<a href=\"projects_view.php?id=".$project["id"]."\" target=\"_BLANK\">View</a>";
		$fund_collected = $db->fetch_single_data("fundings","concat(sum(fund))",["developer_project_id" => $project["id"]]);
?>
		<?=$t->row([$no+1,
					$project["name"],
					$project["description"],
					$project["address"],
					format_amount($project["fund"]),
					format_amount($fund_collected),
					format_amount($db->fetch_single_data("fundings","fund",["developer_project_id" => $project["id"]])),
					format_tanggal($project["created_at"],"dMY",true),
				    $actions],
				   ["align='right' valign='top'","","style=\"width:600px;\"","","align='right' valign='top'","align='right' valign='top'","align='right' valign='top'"]);?>
<?php
	}
?>
<?=$t->end();?>
<br>
<?=$f->input("back","Back","type='button' onclick=\"window.location='developers_list.php';\"");?>
<?php include_once "footer.php";?>