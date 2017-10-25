<script>
	function apply(id){
		<?php if($__role != 5){ ?>
			toastr.warning("Anda harus Sign In sebagai Model!");
		<?php } else { ?>
			$.get( "ajax/casting_action.php?mode=apply&id="+id, function(data) {
				if(data <= 0){
					toastr.warning("Apply gagal, silakan ulangi lagi!");
				}
				if(data > 0){
					toastr.success("Casting ini berhasil di Apply");
					$('#myModal').modal('hide');
				} 
				if(data == "error:already_applied"){
					toastr.warning("Casting ini sudah pernah di Apply sebelumnya");
				}
				if(data == "error:user_not_exist"){
					toastr.warning("User tidak terdaftar");
				}
				if(data == "error:user_not_model"){
					toastr.warning("Anda harus Sign In sebagai Model!");
				}
			});
		<?php } ?>
	}
	
	function showJobDetail(id){
		$.get( "ajax/casting_detail.php?id="+id, function(modalBody) {
			$.get( "ajax/casting_action.php?mode=isApplied&id="+id, function(isApplied) {
				modalFooter = "";
				if(isApplied > 0){
					modalFooter += "<button type=\"button\"  class=\"btn\">Applied</button>";
				} else {
					modalFooter += "<button type=\"button\" onclick=\"apply('"+id+"');\" class=\"btn btn-success\">Apply</button>";
				}
				modalFooter += "<button type=\"button\" class=\"btn btn-danger\" data-dismiss=\"modal\">Close</button>";
				$('#modalTitle').html("Casting Detail");
				$('#modalBody').html(modalBody);
				$('#modalFooter').html(modalFooter);
				$('#myModal').modal('show');
			});
		});
	}
</script>