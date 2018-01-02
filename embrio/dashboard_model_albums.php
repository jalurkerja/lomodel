<div>
	<?php 
		if(!isset($_GET["album_id"]) && !isset($_GET["create_new_album"])){ //Album Listing
			?>
			<div class="col-sm-12">
				<?=$f->input("create_new_album",v("create_new_album"),"onclick=\"window.location='?tabActive=album&create_new_album=1';\" type='button' style='width:100%;'","btn btn-lg btn-info");?><br><br>
			</div>
			<?php
			$model_albums = $db->fetch_all_data("model_albums",[],"user_id='".$__user_id."' GROUP BY album_id ORDER BY created_at DESC");
			if(count($model_albums) <= 0){
				echo "<span class='col-sm-12 well' style='color:red;'>".v("data_not_found")."</span>";
			} else {
				foreach($model_albums as $model_album){
					
			?>
				<div class="col-sm-12 well">
					<div><h4><?=$model_album["album_name"];?></h4></div>
					<?php
						$photos = $db->fetch_all_data("model_albums",[],"user_id='".$__user_id."' AND album_id='".$model_album["album_id"]."' LIMIT 6");
						foreach($photos as $photo){
							?> 
							<div class="col-sm-2">
								<img style="cursor:pointer;" class="img-responsive" src="user_images/<?=$photo["filename"];?>" onclick="window.location='?tabActive=album&album_id=<?=$model_album["album_id"];?>';"> 
							</div>
							<?php
						}
					?>
					<div class="col-sm-12">
						<br>
						<?=$f->input("more","More","onclick=\"window.location='?tabActive=album&album_id=".$model_album["album_id"]."';\" type='button' style='width:100%;'","btn btn-lg btn-primary");?>
					</div>
				</div>
				<div class="col-sm-12" style="padding-bottom:10px;border-bottom:1px solid #aaa;width:100%;"></div>
			<?php } ?>
		<?php } ?>
	<?php 
		} else if(isset($_GET["create_new_album"])) {
			$album_id = generateToken("album_".$__user_id);
			?><script> window.location="?tabActive=album&album_id=<?=$album_id;?>&editing=1"; </script><?php
			exit();
		} else {
	?>
		<div class="col-sm-12 well">
			<?php if(!isset($_GET["editing"])){ //Show More Album ?>
				<div><h4><?=$db->fetch_single_data("model_albums","album_name",["user_id" => $__user_id,"album_id"=>$_GET["album_id"]]);?></h4></div>
				<?php
					$photos = $db->fetch_all_data("model_albums",[],"user_id='".$__user_id."' AND album_id='".$_GET["album_id"]."'");
					foreach($photos as $photo){
						?><div class="col-sm-2" style="padding-bottom:20px;"><img style="cursor:pointer;" class="img-responsive" src="user_images/<?=$photo["filename"];?>" onclick="showGalery('<?=$photo["id"];?>');"></div><?php
					}
				?>
				<div class="col-sm-12">
					<br>
					<div class="col-sm-6">
						<?=$f->input("back","Back","onclick=\"window.location='?tabActive=album';\" type='button' style='width:100%;'","btn btn-lg btn-info");?>
					</div>
					<div class="col-sm-6">
						<?=$f->input("edit","Edit","onclick=\"window.location='?tabActive=album&album_id=".$_GET["album_id"]."&editing=1';\" type='button' style='width:100%;'","btn btn-lg btn-info");?>
					</div>
				</div>
			<?php } else { //Editing Album ?>
				<?php
					$album_id = $_GET["album_id"];
					if($_POST["modeSaving"] == "deleting"){//DELETING
						$xx = $_POST["delete_seqno"];
						$model_album_id_deleted = $db->fetch_single_data("model_albums","id",["user_id" => $__user_id,"album_id" => $album_id,"seqno"=>$xx]);
						$model_albums_filename = $db->fetch_single_data("model_albums","filename",["id" => $model_album_id_deleted]);
						chmod("user_images/".$model_albums_filename, 0777);
						unlink("user_images/".$model_albums_filename);
						$db->addtable("model_albums");	$db->where("id",$model_album_id_deleted); $db->delete_();
						
						$photos = $db->fetch_all_data("model_albums",[],"user_id='".$__user_id."' AND album_id='".$_GET["album_id"]."' AND seqno > '".$xx."'","seqno");
						foreach($photos as $photo){
							$db->addtable("model_albums");	$db->where("id",$photo["id"]);
							$db->addfield("seqno");			$db->addvalue($xx);
							$updating = $db->update();
							$xx++;
						}
						$_POST["rowAlbum"]--;
					}
					$data = $db->fetch_all_data("model_albums",[],"user_id='".$__user_id."' AND album_id='".$album_id."'");
					$rowAlbum = $_POST["rowAlbum"];
					if(count($data) > $rowAlbum) $rowAlbum = count($data);
					if(!$rowAlbum) $rowAlbum++;
					include_once "dashboard_model_albums_form.php";
				} 
			?>
		</div>
		<div class="col-sm-12" style="padding-bottom:10px;border-bottom:1px solid #aaa;width:100%;"></div>
	<?php } ?>
</div>
<br><br>