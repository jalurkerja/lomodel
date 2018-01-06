<?php
	if($_POST["gallery_name"]){
		$db->addtable("corporate_galleries");	$db->where("gallery_id",$gallery_id);
		$db->addfield("gallery_name");	$db->addvalue($_POST["gallery_name"]);
		$updating = $db->update();
	}
					
	foreach($_FILES["gallery"]["tmp_name"] as $xx => $tmp_name){
		if($tmp_name){
			$_ext = strtolower(pathinfo($_FILES["gallery"]["name"][$xx],PATHINFO_EXTENSION));
			$galleryFilename = generateToken("gallery_".$__user_id).".".$_ext;
			move_uploaded_file($tmp_name, "user_images/".$galleryFilename);
			
			$corporate_gallery_id = $db->fetch_single_data("corporate_galleries","id",["user_id" => $__user_id,"gallery_id" => $gallery_id,"seqno"=>$xx]);
			$corporate_galleries_filename = $db->fetch_single_data("corporate_galleries","filename",["user_id" => $__user_id,"gallery_id" => $gallery_id,"seqno"=>$xx]);
			$db->addtable("corporate_galleries");
			$db->addfield("filename");	$db->addvalue($galleryFilename);
			$db->addfield("status");	$db->addvalue(0);
			$db->addfield("gallery_name");$db->addvalue($_POST["gallery_name"]);
			if($corporate_gallery_id > 0){
				$db->where("user_id",$__user_id);
				$db->where("gallery_id",$gallery_id);
				$db->where("seqno",$xx);
				$updating = $db->update();
				chmod("user_images/".$corporate_galleries_filename, 0777);
				unlink("user_images/".$corporate_galleries_filename);
			} else {
				$db->addfield("user_id");	$db->addvalue($__user_id);
				$db->addfield("gallery_id");	$db->addvalue($gallery_id);
				$db->addfield("seqno");		$db->addvalue($xx);
				$updating = $db->insert();
			}
		}
	}
	$data = $db->fetch_all_data("corporate_galleries",[],"user_id='".$__user_id."' AND gallery_id='".$gallery_id."'");
	
	if($_POST["modeSaving"] == "finished"){ ?><script> window.location="?tabActive=gallery&gallery_id=<?=$gallery_id;?>"; </script> <?php }
					
	?>
	<form id="frmAlbum" action="?tabActive=gallery&gallery_id=<?=$gallery_id;?>&editing=1" method="POST" enctype="multipart/form-data">
		<input type="hidden" id="rowGallery" name="rowGallery" value="<?=$rowGallery;?>">
		<input type="hidden" id="modeSaving" name="modeSaving" value="">
		<input type="hidden" id="delete_seqno" name="delete_seqno" value="">
		<div class="col-md-3" style="font-size:16px;"><?=v("gallery_name");?> :</div>
		<div class="col-md-9"><input id="gallery_name" name="gallery_name" value="<?=$data[0]["gallery_name"];?>" class="form-control"></div>
		<br><br>
		<?php for($xx=0;$xx<$rowGallery;$xx++){ ?>
			<?php
				$galleryFilename = $db->fetch_single_data("corporate_galleries","filename",["user_id"=>$__user_id,"gallery_id"=>$gallery_id,"seqno"=>$xx]);
				if(file_exists("user_images/".$galleryFilename)) 
					$viewPhoto = "<br><img src='user_images/".$galleryFilename."' width='200'><i style='font-size:20px;' class='fa fa-times top-right-img' onclick='delete_album(\"".$xx."\");'></i><br>";
				else $viewPhoto = "";
			?>
			<div class="col-md-4"><br>Photo <?=$xx+1;?>: <?=$viewPhoto;?> <input type="file" name="gallery[<?=$xx;?>]" onchange="setTimeout(function(){ $('#frmAlbum').submit(); }, 1);"></div>
		<?php } ?>
		<div class="col-md-12">
			<br><br>
			<div class="col-md-2">
				<input type="button" value="<?=v("add_photo");?>" class="form-control btn-primary" onclick="modeSaving.value='addingPhoto';rowGallery.value='<?=$rowGallery+1;?>';frmAlbum.submit();">
			</div>
			<div class="col-md-8">&nbsp;</div>
			<div class="col-md-2">
				<input type="button" value="<?=v("finish");?>" class="form-control btn-primary" onclick="modeSaving.value='finished';frmAlbum.submit();">
			</div>
		</div>
	</form>