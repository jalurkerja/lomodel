<?php include_once "head.php";?>
<?php
	if($_GET["deleting"]){
		$db->addtable("banks");
		$db->where("id",$_GET["deleting"]);
		$db->delete_();
		?> <script> window.location="?";</script> <?php
	}
?>
<div class="bo_title">Banks</div>
<div id="bo_expand" onclick="toogle_bo_filter();">[+] View Filter</div>
<div id="bo_filter">
	<div id="bo_filter_container">
		<?=$f->start("filter","GET");?>
			<?=$t->start();?>
			<?php
				$txt_name = $f->input("txt_name",@$_GET["txt_name"]);
				$txt_pic = $f->input("txt_pic",@$_GET["txt_pic"]);
				$txt_phone = $f->input("txt_phone",@$_GET["txt_phone"]);
			?>
			<?=$t->row(array("Group",$group));?>
			<?=$t->row(array("Email",$txt_email));?>
			<?=$t->row(array("Name",$txt_name));?>
			<?=$t->row(array("Role",$sel_role));?>
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
	if(@$_GET["group"]!="") $whereclause .= "group_id = '".$_GET["group"]."' AND ";
	if(@$_GET["txt_email"]!="") $whereclause .= "email LIKE '"."%".str_replace(" ","%",$_GET["txt_email"])."%"."' AND ";
	if(@$_GET["txt_name"]!="") $whereclause .= "ename LIKE '"."%".str_replace(" ","%",$_GET["txt_name"])."%"."' AND ";
	if(@$_GET["sel_role"]!="") $whereclause .= "role = '".$_GET["sel_role"]."' AND ";
	
	$maxrow = $db->get_maxrow("banks",substr($whereclause,0,-4));
	$start = getStartRow(@$_GET["page"],$_rowperpage);
	$paging = paging($_rowperpage,$maxrow,@$_GET["page"],"paging");
	
	$db->addtable("banks");
	if($whereclause != "") $db->awhere(substr($whereclause,0,-4));$db->limit($start.",".$_rowperpage);
	if(@$_GET["sort"] != "") $db->order($_GET["sort"]);
	$banks = $db->fetch_data(true);
?>
	<?=$f->input("add","Add","type='button' onclick=\"window.location='banks_add.php';\"");?>
	<?=$paging;?>
	<?=$t->start("","data_content");?>
	<?=$t->header(array("No",
						"Email",
						"<div onclick=\"sorting('name');\">Name</div>",
						"<div onclick=\"sorting('pic');\">PIC</div>",
						"<div onclick=\"sorting('phone');\">Phone</div>",
						"<div onclick=\"sorting('created_at');\">Created At</div>",
						""));?>
	<?php foreach($banks as $no => $bank){ ?>
		<?php
			
			$actions = 	"<a href=\"banks_edit.php?id=".$bank["id"]."\">Edit</a> |
						<a href='#' onclick=\"if(confirm('Are You sure to delete this data?')){window.location='?deleting=".$bank["id"]."';}\">Delete</a>";
			$email = $db->fetch_single_data("a_users","email",["id"=>$bank["user_id"]]);
		?>
		<?=$t->row(
					array($no+$start+1,
					$email,
					$bank["name"],
					$bank["pic"],
					$bank["phone"],
					$bank["created_at"],
					$actions),
					array("align='right' valign='top'","")
				);?>
	<?php } ?>
	<?=$t->end();?>
	<?=$paging;?>
	
<?php include_once "footer.php";?>