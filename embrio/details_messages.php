<br>
<div class="col-sm-12 well">
	<?php if($__isloggedin){ ?>
		<div class="form-group">
			<div class="col-sm-10">
				<input type="text" class="form-control" id="txtmessage">
			</div>
			<div class="col-sm-1">
				<button class="btn info" onclick="sendMessage('<?=$_GET["user_id"];?>',txtmessage.value);">Send</button>
			</div>
			<div class="col-sm-1"></div>
		</div>
	<?php } else { ?>
		<span class='col-sm-12 well' style='color:red;'><?=v("you_have_to_login_first");?></span>
	<?php } ?>
</div>