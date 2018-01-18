<br>
<div class="col-sm-12 well">
	<div class="form-group">
		<div class="col-sm-10">
			<input type="text" class="form-control" id="txtmessage">
		</div>
		<div class="col-sm-1">
			<button class="btn info" onclick="sendMessage('<?=$_GET["id"];?>',txtmessage.value);">Send</button>
		</div>
		<div class="col-sm-1"></div>
	</div>
</div>