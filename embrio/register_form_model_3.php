<?php
	if($_SESSION["album_id"] == "") $_SESSION["album_id"] = generateToken("album_".$__user_id);
	$album_id = $_SESSION["album_id"];
	
	if(isset($_GET["finished"])){
		javascript("window.location='dashboard.php';");
		exit();
	}
	$rowAlbum = $_POST["rowAlbum"];
	if(!$rowAlbum) $rowAlbum++;
	
	if($_POST["album_name"]){
		$db->addtable("model_albums");	$db->where("album_id",$album_id);
		$db->addfield("album_name");	$db->addvalue($_POST["album_name"]);
		$updating = $db->update();
	}
	
	foreach($_FILES["album"]["tmp_name"] as $xx => $tmp_name){
		if($tmp_name){
			$_ext = strtolower(pathinfo($_FILES["album"]["name"][$xx],PATHINFO_EXTENSION));
			$albumFilename = generateToken("album_".$__user_id).".".$_ext;
			move_uploaded_file($tmp_name, "user_images/".$albumFilename);
			
			$model_albums_id = $db->fetch_single_data("model_albums","id",["user_id" => $__user_id,"album_id" => $album_id,"seqno"=>$xx]);
			$model_albums_filename = $db->fetch_single_data("model_albums","filename",["user_id" => $__user_id,"album_id" => $album_id,"seqno"=>$xx]);
			$db->addtable("model_albums");
			$db->addfield("filename");	$db->addvalue($albumFilename);
			$db->addfield("status");	$db->addvalue(0);
			$db->addfield("album_name");$db->addvalue($_POST["album_name"]);
			if($model_albums_id > 0){
				$db->where("user_id",$__user_id);
				$db->where("album_id",$album_id);
				$db->where("seqno",$xx);
				$updating = $db->update();
				chmod("user_images/".$model_albums_filename, 0777);
				unlink("user_images/".$model_albums_filename);
			} else {
				$db->addfield("user_id");	$db->addvalue($__user_id);
				$db->addfield("album_id");	$db->addvalue($album_id);
				$db->addfield("seqno");		$db->addvalue($xx);
				$updating = $db->insert();
			}
		}
	}
	
	
?>
<div class="container fadeInLeft animated">
	<h1 class="well"><?=v("create_album");?></h1>
	<div class="col-lg-12 well">
		<form id="frmAlbum" action="?step=3" method="POST" enctype='multipart/form-data'>
			<input type="hidden" id="rowAlbum" name="rowAlbum" value="<?=$rowAlbum;?>">
			<div class="col-md-2" style="font-size:16px;"><?=v("album_name");?> :</div>
			<div class="col-md-10"><input id="album_name" name="album_name" value="<?=$_POST["album_name"];?>" class="form-control"></div>
			<br><br>
			<?php for($xx=0;$xx<$rowAlbum;$xx++){ ?>
				<?php
					$albumFilename = $db->fetch_single_data("model_albums","filename",["user_id"=>$__user_id,"album_id"=>$album_id,"seqno"=>$xx]);
					if(file_exists("user_images/".$albumFilename)) $viewPhoto = "<br><img src='user_images/".$albumFilename."' width='200'><br>";
					else $viewPhoto = "";
				?>
				<div class="col-md-4"><br>Photo <?=$xx+1;?>: <?=$viewPhoto;?> <input type="file" name="album[<?=$xx;?>]" onchange="setTimeout(function(){ $('#frmAlbum').submit(); }, 1);"></div>
			<?php } ?>
			<div class="col-md-12">
				<br><br>
				<div class="col-md-2">
					<input type="button" value="<?=v("add_photo");?>" class="form-control btn-primary" onclick="rowAlbum.value='<?=$rowAlbum+1;?>';frmAlbum.submit();">
				</div>
				<div class="col-md-8">&nbsp;</div>
				<div class="col-md-2">
					<input type="button" value="<?=v("finish");?>" class="form-control btn-primary" onclick="window.location='?step=3&finished=1';">
				</div>
			</div>
		</form>
	</div>
</div>