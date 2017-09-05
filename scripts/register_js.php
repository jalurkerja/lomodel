<script>
	function validation(){
		if(document.getElementById("password_").value != document.getElementById("repassword").value){
			toastr.error("Password and Retype Password not match!");
			return true;
		}
		return true;
	}
</script>