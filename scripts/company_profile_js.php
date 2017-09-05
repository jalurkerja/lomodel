<script>
	var cur_tabid = "";
	var cur_keyword = "";
	var cur_sort = "";
	var cur_page = "";
	var cur_key_id = "";
	function load_profile()					{ get_ajax("ajax/company_profile_ajax.php?mode=load_profile",				"profile","remove_footer('profile');"); }
	function load_applicant_management(tabid,keyword,sort,page,key_id)	{
		key_id = key_id || ""; tabid = tabid || ""; keyword = keyword || ""; sort = sort || ""; page = page || "";
		cur_tabid = tabid; cur_keyword = keyword; cur_sort = sort; cur_page = page; cur_key_id = key_id;
		var url_string = "?mode=load_applicant_management&key_id="+key_id+"&tabid="+tabid+"&keyword="+keyword+"&sort="+sort+"&page="+page;
		window.history.pushState("","",url_string);
		get_ajax("ajax/company_profile_ajax.php"+url_string,"applicant_management","remove_footer('applicant_management');"); 
	}
	function change_filter_category(opportunity_id){
		get_ajax("ajax/change_filter_category.php?opportunity_id="+opportunity_id,"applicant_management","remove_footer('applicant_management');");
	}
	function load_advertising(gets)				{ 
		var url_string = "?mode=load_advertising&"+gets;
		get_ajax("ajax/company_profile_ajax.php"+url_string,"advertising","remove_footer('advertising');");
		window.history.pushState("","",url_string);
		$('html, body').animate({scrollTop : 0},800);
	}
	function search_advertising() { load_advertising($("#search_advertising_form").serialize()); }
	function adding_advertising() { 
		var valid = true;
		var errormessage = "";
		if(gender.selectedIndex < 0) { valid = false; errormessage = "Harap Isi Jenis Kelamin"; }
		if(major_ids.selectedIndex < 0) { valid = false; errormessage = "Harap Isi Jurusan"; }
		if(job_level_ids.selectedIndex < 0) { valid = false; errormessage = "Harap Isi Jenjang Karir"; }
		if(add_advertising_form.title.value == "") { valid = false; errormessage = "Harap Isi Posisi"; }
		
		if(valid) {
			$.post( "ajax/company_profile_ajax.php", { post_data: $("#add_advertising_form").serialize() }).done(function( data ) { after_save_adding_advertising(data); }); 
		} else {
			popup_message(errormessage,"error_message");
		}
	}
	function after_save_adding_advertising(data){
		if(data >= 0){
			document.getElementById('add_advertising').value = 2; 
			document.getElementById('add_opportunity_id').value = data; 
			search_advertising();
		} else {
			popup_message("<?=$v->words("your_data_fails_to_be_saved");?>","error_message","document.getElementById('add_advertising').value = 0; load_advertising()");
		}
	}
	function adding_advertising2() { $.post( "ajax/company_profile_ajax.php", { post_data: $("#add_advertising_form2").serialize() }).done(function( data ) { after_save_adding_advertising2(data); }); }
	function after_save_adding_advertising2(data){
		if(data > 0){
			popup_message("<?=$v->words("your_data_successfully_saved");?>","","document.getElementById('add_advertising').value = 0; load_advertising()");
		} else {
			popup_message("<?=$v->words("your_data_fails_to_be_saved");?>","error_message","document.getElementById('add_advertising').value = 0; load_advertising()");
		}
	}
	
	
	function changing_filter_category() { $.post( "ajax/company_profile_ajax.php", { post_data: $("#change_filter_category_form").serialize() }).done(function( data ) { after_save_changing_filter_category(data); }); }
	function after_save_changing_filter_category(data){
		if(data > 0){
			popup_message("<?=$v->words("your_data_successfully_saved");?>","","window.location = window.location;");
		} else {
			popup_message("<?=$v->words("your_data_fails_to_be_saved");?>","error_message","window.location = window.location;");
		}
	}
	
	function load_candidate_search(folder,get_data)	{ folder = folder || 0;get_data = get_data || "";get_ajax("ajax/company_profile_ajax.php?mode=load_candidate_search&folder="+folder+"&get_data="+get_data,"candidate_search","remove_footer('candidate_search');"); }
	function load_report(index)				{ index = index || 1;get_ajax("ajax/company_profile_ajax.php?mode=load_report&index="+index,	"report","remove_footer('report');"); }
	function load_setting()					{ get_ajax("ajax/company_profile_ajax.php?mode=load_setting",				"setting","remove_footer('setting');"); }
	/*START PERSONAL DATA =======================================================================================================*/
	function edit_header_image()				{ var win_edit_header_image = window.open("company_profile_edit_images.php?mode=header_image","company_profile_edit_images","width=800 height=300"); }
	function edit_logo()						{ var win_edit_logo = window.open("company_profile_edit_images.php?mode=logo","company_profile_edit_images","width=300 height=300"); }
	function edit_company_profile()				{ get_ajax("ajax/company_profile_ajax.php?mode=edit_company_profile",			"profile","remove_footer('profile');"); }
	function save_company_profile() 			{ $.post( "ajax/company_profile_ajax.php", { post_data: $("#company_profile_form").serialize() }).done(function( data ) { after_save_company_profile(data); }); }
	function after_save_company_profile(data)	{ 
		if(data >= 0){
			popup_message("<?=$v->words("your_profile_successfully_saved");?>","","load_profile();");
		} else {
			popup_message("<?=$v->words("your_profile_fails_to_be_saved");?>","error_message","load_profile()");
		}
	}
	/*END PERSONAL DATA =======================================================================================================*/
	/*START COMPANY DESCRIPTION=======================================================================================================*/	
	function edit_company_description()	{ get_ajax("ajax/company_profile_ajax.php?mode=edit_company_description","profile","remove_footer('profile');"); }
	function save_company_description()	{ $.post( "ajax/company_profile_ajax.php", { post_data: $("#company_description_form").serialize() }).done(function( data ) { after_save_company_description(data); }); }
	function after_save_company_description(data) {
		if(data >= 0){
			popup_message("<?=$v->words("your_data_successfully_saved");?>","","load_profile();");
		} else {
			popup_message("<?=$v->words("your_data_fails_to_be_saved");?>","error_message","load_profile()");
		}
	}
	/*END COMPANY DESCRIPTION=======================================================================================================*/
	/*START JOIN REASON=======================================================================================================*/	
	function edit_company_join_reason()	{ get_ajax("ajax/company_profile_ajax.php?mode=edit_company_join_reason","profile","remove_footer('profile');"); }
	function save_company_join_reason()	{ $.post( "ajax/company_profile_ajax.php", { post_data: $("#company_join_reason_form").serialize() }).done(function( data ) { after_save_company_join_reason(data); }); }
	function after_save_company_join_reason(data) {
		if(data >= 0){
			popup_message("<?=$v->words("your_data_successfully_saved");?>","","load_profile();");
		} else {
			popup_message("<?=$v->words("your_data_fails_to_be_saved");?>","error_message","load_profile()");
		}
	}
	/*END JOIN REASON=======================================================================================================*/
	
	function remove_footer(area){
		setTimeout(function(){ 
			var current_height = document.getElementById(area).offsetHeight * 1;
			if(current_height > 0) footer_area.style.top = (current_height + 300) + "px";
		 }, 200);
	}	
	
	function scrolling_to_top(){
		$('html, body').animate({scrollTop : 0},800);
	}
	
	function change_close_date(tgl,bln,thn) {
		bln = bln*1 + 3;
		if(bln > 12) {
			bln = bln - 12;
			thn = thn*1 + 1;
		}
		return tgl+"-"+bln+"-"+thn;
	}
	
	/*START CHANGE PASSWORD =======================================================================================================*/
	function save_edit_change_password() 	{ $.post( "ajax/company_profile_ajax.php", { post_data: $("#edit_change_password").serialize() }).done(function( data ) { after_edit_change_password(data); }); }
	function after_edit_change_password(data)	{
		if(data > 0){
			popup_message("<?=$v->words("your_data_successfully_saved");?>","","load_setting();");
		} else if(data == "error:wrong_new_password"){
			popup_message("<?=$v->words("wrong_new_password");?>","error_message","load_setting()");
		} else if(data == "error:wrong_password"){
			popup_message("<?=$v->words("wrong_password");?>","error_message","load_setting()");
		} else {
			popup_message("<?=$v->words("your_data_fails_to_be_saved");?>","error_message","load_setting()");
		}
	}
	/*END CHANGE PASSWORD =======================================================================================================*/
	
	// function load_detail_opportunity(opportunity_id){
		// get_ajax("ajax/searchjob_ajax.php?mode=generate_token&opportunity_id="+opportunity_id,"return_generate_token","openwindow('opportunity_detail.php?id="+opportunity_id+"&token='+global_respon['return_generate_token']);");
	// }
	
	function open_detail_opportunity(url){
		$.fancybox.open({ href: url, type: 'iframe',width:'1050px' });
	}
	
	function open_detail_user(url,is_applied){
		if(is_applied == 1){
			open_detail_opportunity(url);
		} else {
			var url_limited = url.replace("seeker_profile_print_view.php","seeker_profile_limited_view.php");
			open_detail_opportunity(url_limited);
		}
	}
	
	function view_full_resume(url){
		popup_message("<?=$v->w("search_candidate_notification_send_email");?><br><br><input class='btn_sign' type='button' value='OK' onclick=\"parent.open_detail_opportunity('"+url+"');\">&nbsp;<input class='btn_sign' type='button' value='Cancel' onclick=\"$.fancybox.close();\">");
	}
	
	function saving_searched_seekers_notes(user_id,notes){
		get_ajax("ajax/searchcandidate_ajax.php?mode=saving_searched_seekers_notes&user_id="+user_id+"&notes="+notes,"","popup_message('<?=$v->w("your_data_successfully_saved");?>')",false);
	}
	
	function saving_folder(user_id,company_folders_id){
		get_ajax("ajax/searchcandidate_ajax.php?mode=saving_folder&user_id="+user_id+"&company_folders_id="+company_folders_id,"","popup_message('<?=$v->w("your_data_successfully_saved");?>')",false);
	}

	function deletefromfolder(company_folders_id,user_id){
		get_ajax("ajax/searchcandidate_ajax.php?mode=deletefromfolder&company_folders_id="+company_folders_id+"&user_id="+user_id,"","load_candidate_search("+company_folders_id+");",false);
	}
	function delete_folder(company_folders_id){
		get_ajax("ajax/searchcandidate_ajax.php?mode=delete_folder&company_folders_id="+company_folders_id,"","load_candidate_search();",false);
	}
	/*START HISTORY STATUS =======================================================================================================*/
	
	function saving_process_history(opportunity_id,user_id,status,notes){
		get_ajax("ajax/company_profile_ajax.php?mode=save_process_history&user_id="+user_id+"&opportunity_id="+opportunity_id+"&change_status="+status+"&notes="+notes,"","load_applicant_management('"+cur_tabid+"','"+cur_keyword+"','"+cur_sort+"','"+cur_page+"','"+cur_key_id+"')");
	}
	
	function show_submit_button(form_id,hiding){
		hiding = hiding || 0;
		if(hiding == 1){
			document.getElementById('form_'+form_id).style.display = 'none';
		} else {
			document.getElementById('form_'+form_id).style.display = 'block';
		}	
	}				
	/*END HISTORY STATUS =======================================================================================================*/
</script>