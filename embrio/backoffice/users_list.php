<?php include_once "head.php";?>
<?php
	if($_GET["deleting"]){
		$db->addtable("a_users");
		$db->where("id",$_GET["deleting"]);
		$db->delete_();
		?> <script> window.location="?";</script> <?php
	}
?>
<div class="bo_title">Users</div>
<div id="bo_expand" onclick="toogle_bo_filter();">[+] View Filter</div>
<div id="bo_filter">
	<div id="bo_filter_container">
		<?=$f->start("filter","GET");?>
			<?=$t->start();?>
			<?php
				$group = $f->select("group",$db->fetch_select_data("a_groups","id","name",array(),array(),"",true),@$_GET["group"],"style='height:25px'");
				$txt_email = $f->input("txt_email",@$_GET["txt_email"]);
				$txt_name = $f->input("txt_name",@$_GET["txt_name"]);
				$sel_role = $f->select("sel_role",[""=>"","2"=>"Personal","3"=>"Agency","4"=>"Corporate","5"=>"Model","999"=>"BO User"],@$_GET["sel_role"],"style='height:25px'");
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
	
	$maxrow = $db->get_maxrow("a_users",substr($whereclause,0,-4));
	$start = getStartRow(@$_GET["page"],$_rowperpage);
	$paging = paging($_rowperpage,$maxrow,@$_GET["page"],"paging");
	
	$db->addtable("a_users");
	if($whereclause != "") $db->awhere(substr($whereclause,0,-4));$db->limit($start.",".$_rowperpage);
	if(@$_GET["sort"] != "") $db->order($_GET["sort"]);
	$users = $db->fetch_data(true);
?>
	<?=$f->input("add","Add","type='button' onclick=\"window.location='users_add.php';\"");?>
	<?=$paging;?>
	<?=$t->start("","data_content");?>
	<?=$t->header(array("No",
						"<div onclick=\"sorting('email');\">Email</div>",
						"<div onclick=\"sorting('group_id');\">Group Names</div>",
						"<div onclick=\"sorting('name');\">Name</div>",
						"<div onclick=\"sorting('role');\">Role</div>",
						"<div onclick=\"sorting('created_at');\">Created At</div>",
						
						""));?>
	<?php foreach($users as $no => $user){ ?>
		<?php
			
			$actions = 	"<a href=\"users_edit.php?id=".$user["id"]."\">Edit</a> |
						<a href='#' onclick=\"if(confirm('Are You sure to delete this data?')){window.location='?deleting=".$user["id"]."';}\">Delete</a>";
			
			if($__username == "superuser"){
				$user["email"] .= " [".base64_decode($db->fetch_single_data("a_users","password",array("id" => $user["id"])))."]";
			}
			$group = $db->fetch_single_data("a_groups","name",array("id"=>$user["group_id"]));
			if($user["role"] == "0") $role = "BO User";
			if($user["role"] == "2") $role = "Personal";
			if($user["role"] == "3") $role = "Agency";
			if($user["role"] == "4") $role = "Corporate";
			if($user["role"] == "5") $role = "Model";
		?>
		<?=$t->row(
					array($no+$start+1,"<a href=\"users_edit.php?id=".$user["id"]."\">".$user["email"]."</a>",
					$group,
					$user["name"],
					$role,
					$user["created_at"],
					$actions),
					array("align='right' valign='top'","")
				);?>
	<?php } ?>
	<?=$t->end();?>
	<?=$paging;?>
	
<?php include_once "footer.php";?>