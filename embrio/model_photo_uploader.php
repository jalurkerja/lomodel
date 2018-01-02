<link href="styles/jquery.guillotine.css" media="all" rel="stylesheet">
<script id="guillotinejs" src="scripts/jquery.guillotine.js"></script>
<?php include_once "func.crop_image.php"; ?>
<?php
	if($__role == 3){
		$profileTable = "agency_profiles";
		$profilePhotoField = "photo";
	}
	if($__role == 5){
		$profileTable = "model_profiles";
		$profilePhotoField = "photo";
	}
?>
<div width="100%">
	<table align="center" width="95%" class="editPhotoArea"><tr><td align="center">

	<?php
		if(isset($_POST["upload"])){
			$__token = generateToken($suffix);
			$_type = $_FILES["file_photo"]["type"];
			$_size = $_FILES["file_photo"]["size"];
			$_error = $_FILES["file_photo"]["error"];
			$_filename = basename($_FILES['file_photo']['name']);
			$_file_ext = strtolower(substr($_filename, strrpos($_filename, '.') + 1));
			
			$error = "";
			foreach ($allowed_image_types as $mime_type => $ext) {
				if($_type == $mime_type){
					$error = "";
					break;
				}else{
					$error = "Only <strong>".$image_ext."</strong> images accepted for upload<br />";
				}
			}
			if($_error != 0) { $error = $v->w("error_upload_image"); }
			if($_size > ($max_file*1048576)) { $error = str_replace("{max_file}",$max_file,$v->w("image_to_big")); }
			if($error == ""){
				$_ext = strtolower(pathinfo($_FILES['file_photo']['name'],PATHINFO_EXTENSION));
				move_uploaded_file($_FILES['file_photo']['tmp_name'], "user_images/temp_".$__token.".".$_ext);
				$user_photo_uploaded = "user_images/temp_".$__token.".".$_ext;
	?>		
			<table width="200"><tr><td style="border:1px solid green">
				<div class='frame'>
				  <img id='photo_uploaded' src='<?=$user_photo_uploaded;?>' >
				</div>
				</td></tr><tr><td nowrap align="center">
					  <button id='zoom_out'     type='button' title='Zoom out'>  <img src="icons/zoomout.png" width="18">  </button>
					  <button id='fit'          type='button' title='Fit image'> <img src="icons/fitscreen.png">  </button>
					  <button id='zoom_in'      type='button' title='Zoom in'>  <img src="icons/zoomin.png" width="18">  </button>
			</td></tr></table>
			<br>
			<table>
				<tr>
					<td align="center">
						<form id="thumbnail" method="POST">
							<input type="hidden" name="user_photo" value="" id="user_photo" />
							<input type="hidden" name="form_x" value="" id="form_x" />
							<input type="hidden" name="form_y" value="" id="form_y" />
							<input type="hidden" name="form_w" value="" id="form_w" />
							<input type="hidden" name="form_h" value="" id="form_h" />
							<input type="hidden" name="form_scale" value="" id="form_scale" />
							<input type="hidden" name="form_angle" value="" id="form_angle" />
							<input type="button" id="upload_thumbnail" name="upload_thumbnail" value="save" id="save_thumb" onclick="croping_process()"; />
						</form>
					</td>
				</tr>
			</table>
	<?php		
			} else {
				echo "<span style='color:red;'>".$error."</span>";
				$_POST["upload"] = null;
			} 
	?>					
	<?php } ?>

	<?php 
		if($_POST["upload"] == null){
			$db->addtable($profileTable); $db->where("user_id",$__user_id); $db->limit(1); $arr_profiles = $db->fetch_data();
			if(!isset($arr_profiles[$profilePhotoField]) || $arr_profiles[$profilePhotoField] == "") $arr_profiles[$profilePhotoField] = "nophoto.png";
	?>
	
			<table><tr><td align="center">
				<div id="loaderspinning" style="display:none;">
					<span style="font-size:80px;font-weight:bolder;" class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></span><br><b>Please Wait ..</b>
				</div>
				<img src="user_images/<?=$arr_profiles[$profilePhotoField];?>" width="200">
				<br><br>
				<form action="" method="POST" enctype='multipart/form-data'>
					<input type="file" name="file_photo" id="file_photo" onchange="uploading();"/>
					<br><br>
					<input type="submit" name="upload" id="upload" value="upload"/>
				</form>
			</td></tr></table>
			<script>
				function uploading(){
					$("#loaderspinning").attr('style','position:relative;top:150px;text-shadow: 1px 0px #fff;');
					setTimeout(function(){ $("#upload").click(); }, 1000);
				}
			</script>
	<?php } ?>

	<?php
		if($_POST["user_photo"] != ""){
			$old_filename = $db->fetch_single_data($profileTable,$profilePhotoField,["user_id"=>$__user_id]);
			$srcimg = "user_images/".basename($_POST["user_photo"]);
			$destimg = str_replace("temp_","",$srcimg);
			$scale = $_POST["form_scale"];
			$srcwidth = $_POST["form_w"];
			$srcheight = $_POST["form_h"];
			$srcx = $_POST["form_x"];
			$srcy = $_POST["form_y"];
			$width = "200";
			$height = "250";
			resizeThumbnailImage_mobile($destimg, $srcimg, $srcwidth, $srcheight, $srcx, $srcy, $width, $height, $scale);
			if($old_filename){
				chmod("user_images/".$old_filename, 0777);
				unlink("user_images/".$old_filename);
			}
			chmod($srcimg, 0777);
			unlink($srcimg);
			$photo_filename = str_replace("temp_","",basename($_POST["user_photo"]));
			$db->addtable($profileTable);$db->where("user_id",$__user_id);
			$db->addfield($profilePhotoField);$db->addvalue($photo_filename);
			$db->update();
			?> <script> window.location="<?=$doneUrl;?>"; </script> <?php
		}
	?>
	</td></tr></table>
</div>
<script>
    jQuery(function() {
    var picture = $('#photo_uploaded');
	
	$( document ).ready(function() {
	// picture.on('load', function(){
        picture.guillotine({eventOnChange: 'guillotinechange'});
        var data = picture.guillotine('getData');
		for(var key in data) { $('#form_'+key).val(data[key]); }
        $('#fit').click(function(){ picture.guillotine('fit'); });
        $('#zoom_in').click(function(){ picture.guillotine('zoomIn'); });
        $('#zoom_out').click(function(){ picture.guillotine('zoomOut'); });
        picture.on('guillotinechange', function(ev, data, action) {
          data.scale = parseFloat(data.scale.toFixed(4));
          for(var k in data) { $('#form_'+k).val(data[k]); }
        });
		picture.guillotine('fit');
      });
    });
	 
    function croping_process(){
		user_photo.value = photo_uploaded.src;
		thumbnail.submit();
	}	
 </script>