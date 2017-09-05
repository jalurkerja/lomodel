<?php include_once "head.php";?>
<?php
	if($_GET["deleting"]){
		$db->addtable("developer_projects");
		$db->where("id",$_GET["deleting"]);
		$db->delete_();
		?> <script> window.location="?";</script> <?php
	}
?>
<div class="bo_title">Projects</div>
<div id="bo_expand" onclick="toogle_bo_filter();">[+] View Filter</div>
<div id="bo_filter">
	<div id="bo_filter_container">
		<?=$f->start("filter","GET");?>
			<?=$t->start();?>
			<?php
				$txt_name_developer = $f->input("txt_name_developer",@$_GET["txt_name_developer"]);
				$txt_name = $f->input("txt_name",@$_GET["txt_name"]);
			?>
			<?=$t->row(array("Email Developer",$txt_name_developer));?>
			<?=$t->row(array("Nama Proyek",$txt_name));?>
			<?=$t->end();?>
			<?=$f->input("page","1","type='hidden'");?>
			<?=$f->input("sort",@$_GET["sort"],"type='hidden'");?>
			<?=$f->input("do_filter","Load","type='submit'");?>
			<?=$f->input("reset","Reset","type='button' onclick=\"window.location='?';\"");?>
		<?=$f->end();?>
	</div>
</div>

<?php
	$whereclause = "";
	if(@$_GET["txt_name_developer"]!="") $whereclause .= "developer_id IN (SELECT id FROM developers WHERE name LIKE '"."%".str_replace(" ","%",$_GET["txt_name_developer"])."%"."') AND ";
	if(@$_GET["txt_name"]!="") $whereclause .= "name LIKE '"."%".str_replace(" ","%",$_GET["txt_name"])."%"."' AND ";
	
	$maxrow = $db->get_maxrow("developer_projects",substr($whereclause,0,-4));
	$start = getStartRow(@$_GET["page"],$_rowperpage);
	$paging = paging($_rowperpage,$maxrow,@$_GET["page"],"paging");
	
	$db->addtable("developer_projects");
	if($whereclause != "") $db->awhere(substr($whereclause,0,-4));$db->limit($start.",".$_rowperpage);
	if(@$_GET["sort"] != "") $db->order($_GET["sort"]);
	$projects = $db->fetch_data(true);
	$total_fund = 0;
	$total_fund_collected = 0;
?>
	<?=$paging;?>
	<?=$t->start("","data_content");?>
	<?=$t->header(array("No",
						"Developer",
						"Nama Proyek",
						"Kebutuhan Dana",
						"Dana Terkumpul",
						"<div onclick=\"sorting('created_at');\">Created At</div>",
						""));?>
	<?php foreach($projects as $no => $project){ ?>
		<?php
			
			$actions = 	"<a href=\"projects_view.php?id=".$project["id"]."\">View</a>";
			$developer = $db->fetch_all_data("developers",[],"id='".$project["developer_id"]."'")[0];
			$fund_collected = $db->fetch_single_data("fundings","concat(sum(fund))",["developer_project_id" => $project["id"]]);
			$total_fund += ($project["fund"] * 1);
			$total_fund_collected += ($fund_collected * 1);
		?>
		<?=$t->row(
					array($no+$start+1,
					"<a href=\"developers_view.php?id=".$developer["id"]."\" target=\"_BLANK\">".$developer["name"]."</a>",
					"<a href=\"projects_view.php?id=".$project["id"]."\">".$project["name"]."</a>",
					format_amount($project["fund"]),
					format_amount($fund_collected),
					format_tanggal($developer["created_at"],"dMY",true),
					$actions),
					array("align='right' valign='top'","","","align='right'","align='right'","")
				);?>
	<?php } ?>
	<?=$t->row(["","","<b>TOTAL</b>","<b>".format_amount($total_fund)."</b>","<b>".format_amount($total_fund_collected)."</b>"],
			   ["","","","align='right'","align='right'",""]);?>
	<?=$t->end();?>
	<?=$paging;?>
	
<?php include_once "footer.php";?>