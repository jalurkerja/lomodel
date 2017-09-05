<script>
	$( document ).ready(function() {
		<?php if(isset($_GET["just_signup"]) && $_GET["just_signup"] == $__username && !isset($_POST["save_just_signup"])){ ?> 
			$.fancybox.open("<div style='overflow:auto;'>" + seeker_profiles_form("<?=$_GET["just_signup"];?>") + "</div>"); 
		<?php } ?>
		<?php if(isset($_GET["email_confirmed"])){ ?> 
			popup_message("<?=$v->w("email_confirmed");?>","","window.location='index.php';"); 
		<?php } ?>
		reposition_click_here_icon();
	});

	function signup_validation(namalengkap,email,password,repassword){
		if(namalengkap==""){ global_respon['signup_error'] = "namalengkap_empty"; return false;}
		if(email==""){ global_respon['signup_error'] = "email_empty"; return false;}
		if(password==""){ global_respon['signup_error'] = "password_empty"; return false;}
		if(password != repassword){ global_respon['signup_error'] = "password_invalid"; return false;}
		if(password.length < 6){ global_respon['signup_error'] = "password_invalid"; return false;}
		if(validateEmail(email) == false){ global_respon['signup_error'] = "email_invalid"; return false;}
		return true;
	}

	function signup(namalengkap,email,password,repassword){
		if (signup_validation(namalengkap,email,password,repassword)){
			get_ajax("ajax/homepage_ajax.php?mode=signup&namalengkap="+namalengkap+"&email="+email+"&password="+password+"&repassword="+repassword,"signup_result","action_after_signup(global_respon['signup_result'],'"+email+"','"+password+"');");
		} else {
			if(global_respon['signup_error'] == "namalengkap_empty" || 
				global_respon['signup_error'] == "email_empty" || 
				global_respon['signup_error'] == "password_empty"
			) { popup_message("<?=$v->words("please_complete_signup_form");?>","error_message");}
			if(global_respon['signup_error'] == "password_invalid") { popup_message("<?=$v->words("password_error");?>","error_message");}
			if(global_respon['signup_error'] == "email_invalid") { popup_message("<?=$v->words("email_invalid");?>","error_message");}
		}
	}
	
	function action_after_signup(signup_result,email,password){
		if (signup_result == "error:email_already_used"){
			setTimeout(function() { popup_message("<?=$v->words("email_already_used");?>","error_message"); }, 10);
		} else if (signup_result == "error:failed_insert_users"){
			setTimeout(function() { popup_message("<?=$v->words("failed_insert_users");?>","error_message"); }, 10);
		} else if (signup_result == "error:password_error"){
			setTimeout(function() { popup_message("<?=$v->words("password_error");?>","error_message"); }, 10);
		} else if (signup_result == "error:email_invalid"){
			setTimeout(function() { popup_message("<?=$v->words("email_invalid");?>","error_message"); }, 10);
		} else if (signup_result*1 > 0){
			homepage_login.action = "?just_signup=" + email;
			homepage_login.username.value = email;
			homepage_login.password.value = password;
			homepage_login.submit();
		} else {
			setTimeout(function() { popup_message("<?=$v->words("failed_insert_seeker_profiles");?>","error_message"); }, 10);
		}
	}
	
	<?=$additionalscript;?>
</script>