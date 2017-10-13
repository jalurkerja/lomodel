<?php include_once "head.php";?>
<div class="bo_title">Invoices</div>
<div id="bo_expand" onclick="toogle_bo_filter();">[+] View Filter</div>
<div id="bo_filter">
	<div id="bo_filter_container">
		<?=$f->start("filter","GET");?>
			<?=$t->start();?>
			<?php
				$txt_date = $f->input("txt_date",@$_GET["txt_date"],"type='date' style='width:150px;'");
				$txt_email = $f->input("txt_email",@$_GET["txt_email"],"type='email' style='width:250px;'");
				$txt_uniq_code = $f->input("txt_uniq_code",@$_GET["txt_uniq_code"],"type='number' style='width:50px;'");
				$txt_total = $f->input("txt_total",@$_GET["txt_total"],"type='number' style='width:200px;'");
				$sel_status = $f->select("sel_status",array("" => "All","9" => "Unpaid","1" => "Paid","2" => "Canceled"),@$_GET["sel_status"],"style='height:25px;'");
				$sel_mode = $f->select("sel_mode",array("" => "All","1" => "Employer","2" => "Seeker"),@$_GET["sel_mode"],"style='height:25px;'");
			?>
			<?=$t->row(array("Invoice Date",$txt_date));?>
			<?=$t->row(array("User Email",$txt_email));?>
			<?=$t->row(array("Uniq Code",$txt_uniq_code));?>
			<?=$t->row(array("Total Invoice",$txt_total));?>
			<?=$t->row(array("Total Status",$sel_status));?>
			<?=$t->row(array("Total Mode",$sel_mode));?>
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
	if(@$_GET["txt_date"]!="") $whereclause .= "created_at LIKE '%".$_GET["txt_date"]."%' AND ";
	if(@$_GET["txt_email"]!="") $whereclause .= "user_id IN (SELECT id FROM users WHERE email LIKE '%".$_GET["txt_date"]."%') AND ";
	if(@$_GET["txt_uniq_code"]!="") $whereclause .= "uniq_code = '".$_GET["txt_uniq_code"]."' AND ";
	if(@$_GET["txt_total"]!="") $whereclause .= "(total = '".$_GET["txt_total"]."' OR price = '".$_GET["txt_total"]."') AND ";
	if(@$_GET["sel_status"]!="") {
		if(@$_GET["sel_status"]== "9") $whereclause .= "(status = '0') AND ";
		else $whereclause .= "(status = '".$_GET["sel_status"]."') AND ";
	}
	if(@$_GET["sel_mode"]!="") $whereclause .= "(mode = '".$_GET["sel_mode"]."') AND ";
	
	$db->addtable("invoices");
	if($whereclause != "") $db->awhere(substr($whereclause,0,-4));$db->limit($_max_counting);
	$maxrow = count($db->fetch_data(true));
	$start = getStartRow(@$_GET["page"],$_rowperpage);
	$paging = paging($_rowperpage,$maxrow,@$_GET["page"],"paging");
	
	$db->addtable("invoices");
	if($whereclause != "") $db->awhere(substr($whereclause,0,-4));$db->limit($start.",".$_rowperpage);
	if(@$_GET["sort"] != "") $db->order($_GET["sort"]);
	$invoices = $db->fetch_data(true);
?>
	<?=$paging;?>
	<?=$t->start("","data_content");?>
	<?=$t->header(array("No",
						"<div onclick=\"sorting('invoice_no');\">Invoice No</div>",
						"<div onclick=\"sorting('created_at');\">Invoice Date</div>",
						"<div onclick=\"sorting('status');\">Status</div>",
						"<div onclick=\"sorting('user_id');\">Email</div>",
						"<div onclick=\"sorting('mode');\">Mode</div>",
						"<div onclick=\"sorting('ammount');\">Ammount</div>",
						"<div onclick=\"sorting('uniq_code');\">Uniq Code</div>",
						"<div onclick=\"sorting('total');\">Total</div>",
						""));?>
	<?php foreach($invoices as $no => $invoice){ ?>
		<?php
			if($invoice["status"] == "0") $status = "<font color='red'><b>Unpaid</b></font>";
			if($invoice["status"] == "1") $status = "<font color='blue'><b>Paid</b></font>";
			if($invoice["status"] == "2") $status = "<font color='magenta'><b>Canceled</b></font>";
			if($invoice["mode"] == "1") $mode = "Booking Model";
			$email = $db->fetch_single_data("a_users","email",array("id" => $invoice["user_id"]));
			$actions = "<a href=\"invoices_view.php?id=".$invoice["id"]."\">Detail</a>";
		?>
		<?=$t->row(
					array("<a href=\"invoices_view.php?id=".$invoice["id"]."\">".($no+$start+1)."</a>",
						$invoice["invoice_no"],
						format_tanggal($invoice["created_at"],"dMY"),
						$status,
						$email,
						$mode,
						number_format($invoice["ammount"],0,",","."),
						number_format($invoice["uniq_code"],0,",","."),
						number_format($invoice["total"],0,",","."),
						$actions),
					array("align='right' valign='top'","","","","","","align='right' valign='top'","align='right' valign='top'","align='right' valign='top'","")
				);?>
	<?php } ?>
	<?=$t->end();?>
	<?=$paging;?>
	
<?php include_once "footer.php";?>