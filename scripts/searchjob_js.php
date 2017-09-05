<script> 
	<?php
		if(isset($_GET["get_search"]) && $_GET["get_search"]!=""){
			?>  
			var sb_job_function = 1;
			var sb_industries = 1;
			var sb_job_level = 1;
			var sb_education_level = 1;
			var sb_job_type = 0;
			$(document).ready(function() { 
				<?php if(isset($_GET["job_function"]))	{ ?> sb_job_function = 0; loading_select_box_job_function("sb_job_function = 1;"); <?php } ?>
				<?php if(isset($_GET["industries"]))		{ ?> sb_industries = 0; loading_select_box_industries("sb_industries = 1;"); <?php } ?>
				<?php if(isset($_GET["job_level"]))		{ ?> sb_job_level = 0; loading_select_box_job_level("sb_job_level = 1;"); <?php } ?>
				<?php if(isset($_GET["education_level"]))		{ ?> sb_education_level = 0; loading_select_box_education_level("sb_education_level = 1;"); <?php } ?>
				loading_select_box_job_type("sb_job_type = 1;");
				setTimeout(function() { first_loading(); }, 10);
			}); 
			<?php
		} else {
			?> get_ajax("ajax/searchjob_ajax.php?mode=list","opportunities_list","loading_paging()"); <?php
		}
	?>
	
	function first_loading(){
		if(sb_job_function == 1 && sb_job_level == 1 && sb_industries == 1 && sb_education_level == 1 && sb_job_type == 1){
			serach_btn_click();
		} else {
			setTimeout(function() { first_loading(); }, 100);
		}
	}
	
	function formdatacodes(){
		var keyword = $("#searchjob_form").find("#keyword").val().replace(" ",'+');
		var int_job_function = $("#searchjob_form").find("#int_job_function").val().replace(/\[|\]/gi,'');
		var int_work_location = $("#searchjob_form").find("#int_work_location").val().replace(/\[|\]/gi,'');
		var int_job_level = $("#searchjob_form").find("#int_job_level").val().replace(/\[|\]/gi,'');
		var int_industries = $("#searchjob_form").find("#int_industries").val().replace(/\[|\]/gi,'');
		var int_education_level = $("#searchjob_form").find("#int_education_level").val().replace(/\[|\]/gi,'');
		var int_work_experience = $("#searchjob_form").find("#int_work_experience").val().replace(/\[|\]/gi,'');
		var int_job_type = $("#searchjob_form").find("#int_job_type").val().replace(/\[|\]/gi,'');
		var salary_from = $("#searchjob_form").find("#salary_from").val() * 1/100000;
		var salary_to = $("#searchjob_form").find("#salary_to").val() * 1/100000;
		var chk_syariah = $("#searchjob_form").find("#chk_syariah").prop("checked");
		var chk_fresh_graduate = $("#searchjob_form").find("#chk_fresh_graduate").prop("checked");
		// var searchjob_page = $("#searchjob_form").find("#searchjob_page").val() * 1;
		// var searchjob_order = $("#searchjob_form").find("#searchjob_order").val();
		var retval = keyword + "-";
		if(int_job_function == "") int_job_function = "<?=str_replace(array("[","]"),"",$_GET["int_job_function"]);?>";
		if(int_job_function != "") retval = retval + "j" + int_job_function;
		if(int_work_location != "") retval = retval + "w" + int_work_location;
		if(int_job_level == "") int_job_level = "<?=str_replace(array("[","]"),"",$_GET["int_job_level"]);?>";
		if(int_job_level != "") retval = retval + "l" + int_job_level;
		if(int_industries == "") int_industries = "<?=str_replace(array("[","]"),"",$_GET["int_industries"]);?>";
		if(int_industries != "") retval = retval + "i" + int_industries;
		if(int_education_level == "") int_education_level = "<?=str_replace(array("[","]"),"",$_GET["int_education_level"]);?>";
		if(int_education_level != "") retval = retval + "e" + int_education_level;
		if(int_work_experience != "") retval = retval + "c" + int_work_experience;
		if(int_job_type == "") int_job_type = "<?=str_replace(array("[","]"),"",$_GET["int_job_type"]);?>";
		if(int_job_type != "") retval = retval + "t" + int_job_type;
		if(salary_from > 0 || salary_to > 0) retval = retval + "s" + salary_from + "|" + salary_to;
		if(chk_syariah == true) retval = retval + "y1";
		if(chk_fresh_graduate == true) retval = retval + "g1";
		/* if(searchjob_page > 1) retval = retval + "p" + searchjob_page;
		if(searchjob_order == "" || searchjob_order == "posted_at DESC,updated_at DESC") retval = retval + "";
		if(searchjob_order == "name") retval = retval + "o1";
		if(searchjob_order == "name DESC") retval = retval + "o2";
		if(searchjob_order == "salary_min") retval = retval + "o3";
		if(searchjob_order == "salary_max DESC") retval = retval + "o4"; */
		if(retval == "-") retval = "";
		return retval;
	}
	
	function changepage(page){
		document.getElementById("searchjob_page").value = page;		
		$.post( "ajax/searchjob_ajax.php", { post_data: $("#searchjob_form").serialize() }).done(function( data ) { searching_result(data); }); 
		window.history.pushState("","","jobs.php?p="+formdatacodes());
	}
	
	function changeorder(order){
		document.getElementById("searchjob_order").value = order;
		$.post( "ajax/searchjob_ajax.php", { post_data: $("#searchjob_form").serialize() }).done(function( data ) { searching_result(data);changepage(1) }); 
		window.history.pushState("","","jobs.php?p="+formdatacodes());
	}
	
	function clear_serach_btn_click() {
		window.location = "jobs.php";
	}
	
	function serach_btn_click() {
		document.getElementById("searchjob_page").value = 1;
		document.getElementById("searchjob_order").value = "posted_at DESC,updated_at DESC";
		document.getElementById("sort_by").value = "posted_at DESC,updated_at DESC";
		popup_message("<img src='icons/loading.gif' width='100'><br><div style='width:100px;height:5px;background-color:white;position:relative;top:-5px;left:100px;'></div>");
		$.post( "ajax/searchjob_ajax.php", { post_data: $("#searchjob_form").serialize() }).done(function( data ) { searching_result(data); }); 
		window.history.pushState("","","jobs.php?p="+formdatacodes());
	}
	
	function searching_result(data){
		try{ $.fancybox.close(); } catch(e){} 
		document.getElementById("opportunities_list").innerHTML = data;
		$('html, body').animate({scrollTop : 0},800);
		loading_search_criteria();
		loading_paging();
	}
	
	function activate_pagenum(){
		var maxrow = document.getElementById("opportunities_maxrow").innerHTML;
		var page = document.getElementById("opportunities_page").innerHTML;
		var list = document.getElementsByClassName("paging")[0];
		//for(var i = 0 ; i < maxrow ; i++){ try{ list.getElementsByTagName("a")[i].id = ""; }catch(e){} }
		//list.getElementsByTagName("a")[page - 1].id = "a_active";
		if(searchjob_form.opportunity_id.value * 1 > 0){
			load_detail_opportunity("<?=$_GET["opportunity_id"];?>","<?=$_GET["id_apply"];?>");
			searchjob_form.opportunity_id.value="";
			searchjob_form.id_apply.value="";
			window.history.pushState("","","jobs.php?p="+formdatacodes());
		}
	}
	
	function loading_paging(){
		var maxrow = document.getElementById("opportunities_maxrow").innerHTML;
		var activepage = document.getElementById("opportunities_page").innerHTML;
		get_ajax("ajax/searchjob_ajax.php?mode=loading_paging&maxrow="+maxrow+"&activepage="+activepage,"paging_area","activate_pagenum()"); 
	}
	
	function loading_search_criteria(){
		if(document.getElementById("opportunities_search_criteria").innerHTML != "NULL")
			document.getElementById("search_criteria").innerHTML = document.getElementById("opportunities_search_criteria").innerHTML;
	}
	
	function update_applybtn_class(respondval){
		if(respondval > 0){
			$("#applybtn1").removeClass('jobtools_btn').addClass('jobtools_btn_disabled');
			$("#applybtn2").removeClass('jobtools_btn').addClass('jobtools_btn_disabled');
		} else {
			$("#applybtn1").removeClass('jobtools_btn_disabled').addClass('jobtools_btn');
			$("#applybtn2").removeClass('jobtools_btn_disabled').addClass('jobtools_btn');
		}
	}
	
	function update_savebtn_class(respondval){
		if(respondval > 0){
			$("#savebtn1").removeClass('jobtools_btn').addClass('jobtools_btn_disabled');
			$("#savebtn2").removeClass('jobtools_btn').addClass('jobtools_btn_disabled');
		} else {
			$("#savebtn1").removeClass('jobtools_btn_disabled').addClass('jobtools_btn');
			$("#savebtn2").removeClass('jobtools_btn_disabled').addClass('jobtools_btn');
		}
	}
	
	function applying_on_company_page(respondval,opportunity_id) {
		if (respondval > 0){
			setTimeout(function() {
				$.fancybox.open("<div style='overflow:auto;'>" + applying_on_company_form(opportunity_id) + "</div>");
			}, 1000);
		} else {
			popup_message("<?=$v->words("error_company_cannot_apply");?>","error_message");
		}
	}
	
	function apply_on_company_page(opportunity_id) {
		get_ajax("ajax/searchjob_ajax.php?mode=apply_on_company_page&opportunity_id="+opportunity_id,"apply_on_company_page","applying_on_company_page(global_respon['apply_on_company_page'],"+opportunity_id+");");
	}
	
	function apply(opportunity_id){
		var applybtn1 = document.getElementById("applybtn1");
		var applybtn2 = document.getElementById("applybtn2");
		if(applybtn1.className == "jobtools_btn" && applybtn2.className == "jobtools_btn"){
			<?php if (!$__isloggedin) { ?>
				parent.show_login_form(opportunity_id);
			<?php } else if($__company_id) { ?>
				apply_on_company_page(opportunity_id,'<?=$__company_id;?>');
			<?php } else { ?>
				apply_action(opportunity_id);
			<?php } ?>
		}
	}
	
	function save(opportunity_id){
		var savebtn1 = document.getElementById("savebtn1");
		var savebtn2 = document.getElementById("savebtn2");
		if(savebtn1.className == "jobtools_btn" && savebtn2.className == "jobtools_btn"){
			<?php if (!$__isloggedin) { ?>
				popup_message("<?=$v->w("login_first");?>");
			<?php } else { ?>
				save_action(opportunity_id);
			<?php } ?>
		}
	}
	
	function resend_confirmation(){
		try{ parent.get_ajax("resend_confirmation.php"); } catch(e){ get_ajax("resend_confirmation.php"); }
	}
	
	function success_applied(valrespond){
		setTimeout(function() {
			if(valrespond == "1"){
				update_applybtn_class(valrespond);
				popup_message("<?=$v->words("apply_success");?>");
			} else if (valrespond.substr(0,10) == "need_email"){
				alert("error:1024");
			} else if (valrespond == "need_confirmation"){
				var message = "<div style='widht:500px;'><?=$v->w("need_confirmation");?><br><br><?=$v->w("click_resend_confirmation");?><div>";
				message += "<div class='language_notactive' onclick='resend_confirmation();'>[<?=$v->w("resend");?>]</div>";
				popup_message(message,"error_message");
			} else if (valrespond == "error:user_not_exist"){
				popup_message("<?=$v->w("user_not_exist");?>","error_message");
			} else if (valrespond == "error:already_applied"){
				popup_message("<?=$v->w("already_applied");?>","error_message");
			} else {
				alert(valrespond);
			}
		}, 500);
	}
	
	function success_saved(valrespond){
		if(valrespond == "1"){
			update_savebtn_class(valrespond);
			popup_message("<?=$v->words("save_success");?>");
		} else if (valrespond.substr(0,5) == "error"){
			alert("error : " + valrespond);
		}
	}
		
	function apply_action(opportunity_id,email){
		email = email || "";
		get_ajax("ajax/searchjob_ajax.php?mode=apply&opportunity_id="+opportunity_id+"&email="+email,"apply_respon","success_applied(global_respon['apply_respon']);");
	}
	
	function save_action(opportunity_id,email){
		email = email || "";
		get_ajax("ajax/searchjob_ajax.php?mode=save&opportunity_id="+opportunity_id,"save_respon","success_saved(global_respon['save_respon']);");
	}

	<?php if(isset($_POST["apply_after_login"]) && $_POST["apply_after_login"] != "") { ?> $(document ).ready(function() { apply_action("<?=$_POST["apply_after_login"];?>"); }); <?php } ?>
		
	function show_login_form(opportunity_id) {
		$.fancybox.open("<div style='overflow:auto;'>" + login_form(opportunity_id) + "</div>");
	}
	
	function login_form(opportunity_id){
		opportunity_id = opportunity_id || "";
		var retval = "";
		retval += "<div class='login_form_area'>";
		retval += "	<div id='title'><?=$v->words("signin");?></div>";
		retval += "	<?=str_replace(array(chr(10),chr(13)),"",$f->start());?>";
		retval += "		<?=str_replace(array(chr(10),chr(13)),"",$t->start());?>";
		retval += "			<?=str_replace(array(chr(10),chr(13),'"'),array("","","'"),$t->row(array($v->words("email"),":",$f->input("username","",'tabindex="11" maxlength="75" autocomplete="on"',"txt_login")),array("id='td1'")));?>";
		retval += "			<?=str_replace(array(chr(10),chr(13),'"'),array("","","'"),$t->row(array($v->words("password"),":",$f->input("password","",'type="password" tabindex="12" maxlength="75" autocomplete="on"',"txt_login")),array("id='td1'")));?>";
		retval += "			<?=str_replace(array(chr(10),chr(13),'"'),array("","","'"),$t->row(array("","",$f->input("signin",$v->words("signin"),'type="submit" tabindex="13"',"btn_sign")),array("align='right'")));?>";
		retval += "			<input type='hidden' name='opportunity_id' value='" + opportunity_id + "'>";
		retval += "			<input type='hidden' name='login_action' value='1'>";
		retval += "		<?=str_replace(array(chr(10),chr(13)),"",$t->end());?>";
		retval += "	<?=str_replace(array(chr(10),chr(13)),"",$f->end());?>";
		retval += "</div>";//login_form_area
		
		return retval;
	}
	
	function applying_on_company_form(opportunity_id){
		opportunity_id = opportunity_id || "";
		var retval = "";
		retval += "<input type='hidden' id='opportunity_id' value='" + opportunity_id + "'>";
		retval += "<div class='login_form_area'>";
		retval += "	<div id='title'><?=$v->words("apply");?></div>";
		retval += "	<?=str_replace(array(chr(10),chr(13)),"",$t->start());?>";
		retval += "		<?=str_replace(array(chr(10),chr(13),'"'),array("","","'"),$t->row(array($v->words("email"),":",$f->input("email","",'tabindex="11" maxlength="75" autocomplete="on"',"txt_login")),array("id='td1'")));?>";
		retval += "		<?=str_replace(array(chr(10),chr(13),'"'),array("","","'"),$t->row(array("","",$f->input("signin",$v->words("send"),'type="button" tabindex="12" onclick="apply_action(opportunity_id.value,email.value);"',"btn_sign")),array("align='right'")));?>";
		retval += "	<?=str_replace(array(chr(10),chr(13)),"",$t->end());?>";
		retval += "</div>";//login_form_area
		
		return retval;
	}
	
	function open_detail_opportunity(url){
		$.fancybox.open({ href: url, type: 'iframe',width:'1050px' });
	}
	
	function load_detail_opportunity(opportunity_id,id_apply){
		id_apply = id_apply || "";
		get_ajax("ajax/searchjob_ajax.php?mode=generate_token&opportunity_id="+opportunity_id,"return_generate_token","open_detail_opportunity('opportunity_detail.php?id="+opportunity_id+"&id_apply="+id_apply+"&token='+global_respon['return_generate_token']);",false);
	}
</script>