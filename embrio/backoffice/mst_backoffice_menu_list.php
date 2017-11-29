<?php include_once "head.php";?>
<div class="bo_title">Master Backoffice Menu</div>
<div id="bo_expand" onclick="toogle_bo_filter();">[+] View Filter</div>
<div id="bo_filter">
	<div id="bo_filter_container">
		<?=$f->start("filter","GET");?>
			<?=$t->start();?>
			<?php
				$txt_name = $f->input("txt_name",@$_GET["txt_name"]);
                $txt_url = $f->input("txt_url",@$_GET["txt_url"]);
			?>
			<?=$t->row(array("Backoffice Menu",$txt_name));?>
            <?=$t->row(array("URL",$txt_url));?>
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
	if(@$_GET["txt_name"]!="") $whereclause .= "(name LIKE '%".$_GET["txt_name"]."%') AND ";
    if(@$_GET["txt_url"]!="") $whereclause .= "(url LIKE '%".$_GET["txt_url"]."%') AND ";
	
	$db->addtable("a_backoffice_menu");
	if($whereclause != "") $db->awhere(substr($whereclause,0,-4));$db->limit($_max_counting);
	$maxrow = count($db->fetch_data(true));
	$start = getStartRow(@$_GET["page"],$_rowperpage);
	$paging = paging($_rowperpage,$maxrow,@$_GET["page"],"paging");
	
	$db->addtable("a_backoffice_menu");
	if($whereclause != "") $db->awhere(substr($whereclause,0,-4));$db->limit($start.",".$_rowperpage);
	if(@$_GET["sort"] != "") $db->order($_GET["sort"]);
	$backoffice_menu = $db->fetch_data(true);
?>

	<?=$f->input("add","Add","type='button' onclick=\"window.location='mst_backoffice_menu_add.php';\"");?>
	<?=$paging;?>
	<?=$t->start("","data_content");?>
	<?=$t->header(array("No",
						"<div onclick=\"sorting('id');\">ID</div>",
                        "<div onclick=\"sorting('seqno');\">Seq No</div>",
						"<div onclick=\"sorting('parent_id');\">Parent ID</div>",
						"<div onclick=\"sorting('name');\">Backoffice Menu</div>",
                        "<div onclick=\"sorting('url');\">URL</div>",
						"<div onclick=\"sorting('created_at');\">Created At</div>",
						"<div onclick=\"sorting('created_by');\">Created By</div>",
						""));?>
	<?php foreach($backoffice_menu as $no => $backoffice_men){ ?>
		<?php
			$actions = "<a href=\"mst_backoffice_menu_view.php?id=".$backoffice_men["id"]."\">View</a> | 
						<a href=\"mst_backoffice_menu_edit.php?id=".$backoffice_men["id"]."\">Edit</a>
						";
		?>
		<?=$t->row(
					array($no+$start+1,
						"<a href=\"mst_backoffice_menu_view.php?id=".$backoffice_men["id"]."\">".$backoffice_men["id"]."</a>",
						$backoffice_men["segno"],
                        $backoffice_men["parent_id"],
                        $backoffice_men["name"],
                        $backoffice_men["url"],
						format_tanggal($backoffice_men["created_at"],"dMY"),
						$backoffice_men["created_by"],
						$actions),
					array("align='right' valign='top'","")
				);?>
	<?php } ?>
	<?=$t->end();?>
	<?=$paging;?>
<?php include_once "footer.php";?>