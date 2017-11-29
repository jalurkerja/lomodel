<?php include_once "head.php";?>
<?php
	if($_GET["deleting"]){
		$db->addtable("investors");
		$db->where("id",$_GET["deleting"]);
		$db->delete_();
		?> <script> window.location="?";</script> <?php
	}
?>
<div class="bo_title">Investors</div>
<div id="bo_expand" onclick="toogle_bo_filter();">[+] View Filter</div>
<div id="bo_filter">
	<div id="bo_filter_container">
		<?=$f->start("filter","GET");?>
			<?=$t->start();?>
			<?php
				$txt_email = $f->input("txt_email",@$_GET["txt_email"]);
				$txt_name = $f->input("txt_name",@$_GET["txt_name"]);
			?>
			<?=$t->row(array("Email",$txt_email));?>
			<?=$t->row(array("Name",$txt_name));?>
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
	if(@$_GET["txt_email"]!="") $whereclause .= "user_id IN (SELECT id FROM a_users WHERE email LIKE '"."%".str_replace(" ","%",$_GET["txt_email"])."%"."') AND ";
	if(@$_GET["txt_name"]!="") $whereclause .= "name LIKE '"."%".str_replace(" ","%",$_GET["txt_name"])."%"."' AND ";
	
	$maxrow = $db->get_maxrow("investors",substr($whereclause,0,-4));
	$start = getStartRow(@$_GET["page"],$_rowperpage);
	$paging = paging($_rowperpage,$maxrow,@$_GET["page"],"paging");
	
	$db->addtable("investors");
	if($whereclause != "") $db->awhere(substr($whereclause,0,-4));$db->limit($start.",".$_rowperpage);
	if(@$_GET["sort"] != "") $db->order($_GET["sort"]);
	$investors = $db->fetch_data(true);
?>
	<?=$paging;?>
	<?=$t->start("","data_content");?>
	<?=$t->header(array("No",
						"<div onclick=\"sorting('email');\">Email</div>",
						"<div onclick=\"sorting('name');\">Name</div>",
						"<div onclick=\"sorting('gender');\">Jenis Kelamin</div>",
						"<div onclick=\"sorting('phone');\">Telpon</div>",
						"<div onclick=\"sorting('created_at');\">Created At</div>",
						
						""));?>
	<?php foreach($investors as $no => $investor){ ?>
		<?php
			
			$actions = 	"<a href=\"investors_view.php?id=".$investor["id"]."\">View</a>";
			$email = $db->fetch_single_data("a_users","email",["id"=>$investor["user_id"]]);
		?>
		<?=$t->row(
					array($no+$start+1,
					"<a href=\"investors_view.php?id=".$investor["id"]."\">".$email."</a>",
					"<a href=\"investors_view.php?id=".$investor["id"]."\">".$investor["name"]."</a>",
					($investor["gender"] == "M") ? "Pria":"Wanita",
					$investor["phone"],
					format_tanggal($investor["created_at"],"dMY",true),
					$actions),
					array("align='right' valign='top'","")
				);?>
	<?php } ?>
	<?=$t->end();?>
	<?=$paging;?>
	
<?php include_once "footer.php";?>