<div>
	<?php 
		if(!isset($_GET["gallery_id"]) && !isset($_GET["create_new_gallery"])){ //Gallery Listing
			?>
			<div class="col-sm-12">
				<?=$f->input("create_new_gallery",v("create_new_gallery"),"onclick=\"window.location='?tabActive=gallery&create_new_gallery=1';\" type='button' style='width:100%;'","btn btn-lg btn-info");?><br><br>
			</div>
			<?php
			$corporate_galleries = $db->fetch_all_data("corporate_galleries",[],"user_id='".$__user_id."' GROUP BY gallery_id ORDER BY created_at DESC");
			if(count($corporate_galleries) <= 0){
				echo "<span class='col-sm-12 well' style='color:red;'>".v("data_not_found")."</span>";
			} else {
				foreach($corporate_galleries as $corporate_gallery){
					
			?>
				<div class="col-sm-12 well">
					<div><h4><?=$corporate_gallery["gallery_name"];?></h4></div>
					<?php
						$photos = $db->fetch_all_data("corporate_galleries",[],"user_id='".$__user_id."' AND gallery_id='".$corporate_gallery["gallery_id"]."' LIMIT 6");
						foreach($photos as $photo){
							?> 
							<div class="col-sm-2">
								<img style="cursor:pointer;" class="img-responsive" src="user_images/<?=$photo["filename"];?>" onclick="window.location='?tabActive=gallery&gallery_id=<?=$corporate_gallery["gallery_id"];?>';"> 
							</div>
							<?php
						}
					?>
					<div class="col-sm-12">
						<br>
						<?=$f->input("more","More","onclick=\"window.location='?tabActive=gallery&gallery_id=".$corporate_gallery["gallery_id"]."';\" type='button' style='width:100%;'","btn btn-lg btn-primary");?>
					</div>
				</div>
				<div class="col-sm-12" style="padding-bottom:10px;border-bottom:1px solid #aaa;width:100%;"></div>
			<?php } ?>
		<?php } ?>
	<?php 
		} else if(isset($_GET["create_new_gallery"])) {
			$gallery_id = generateToken("gallery_".$__user_id);
			?><script> window.location="?tabActive=gallery&gallery_id=<?=$gallery_id;?>&editing=1"; </script><?php
			exit();
		} else {
	?>
		<div class="col-sm-12 well">
			<?php if(!isset($_GET["editing"])){ //Show More Gallery ?>
				<div><h4><?=$db->fetch_single_data("corporate_galleries","gallery_name",["user_id" => $__user_id,"gallery_id"=>$_GET["gallery_id"]]);?></h4></div>
				<?php
					$photos = $db->fetch_all_data("corporate_galleries",[],"user_id='".$__user_id."' AND gallery_id='".$_GET["gallery_id"]."'");
					foreach($photos as $photo){
						?><div class="col-sm-2" style="padding-bottom:20px;"><img style="cursor:pointer;" class="img-responsive" src="user_images/<?=$photo["filename"];?>" onclick="showGalery('<?=$photo["id"];?>');"></div><?php
					}
				?>
				<div class="col-sm-12">
					<br>
					<div class="col-sm-6">
						<?=$f->input("back","Back","onclick=\"window.location='?tabActive=gallery';\" type='button' style='width:100%;'","btn btn-lg btn-info");?>
					</div>
					<div class="col-sm-6">
						<?=$f->input("edit","Edit","onclick=\"window.location='?tabActive=gallery&gallery_id=".$_GET["gallery_id"]."&editing=1';\" type='button' style='width:100%;'","btn btn-lg btn-info");?>
					</div>
				</div>
			<?php } else { //Editing Gallery ?>
				<?php
					$gallery_id = $_GET["gallery_id"];
					if($_POST["modeSaving"] == "deleting"){//DELETING
						$xx = $_POST["delete_seqno"];
						$corporate_gallery_id_deleted = $db->fetch_single_data("corporate_galleries","id",["user_id" => $__user_id,"gallery_id" => $gallery_id,"seqno"=>$xx]);
						$corporate_galleries_filename = $db->fetch_single_data("corporate_galleries","filename",["id" => $corporate_gallery_id_deleted]);
						chmod("user_images/".$corporate_galleries_filename, 0777);
						unlink("user_images/".$corporate_galleries_filename);
						$db->addtable("corporate_galleries");	$db->where("id",$corporate_gallery_id_deleted); $db->delete_();
						
						$photos = $db->fetch_all_data("corporate_galleries",[],"user_id='".$__user_id."' AND gallery_id='".$_GET["gallery_id"]."' AND seqno > '".$xx."'","seqno");
						foreach($photos as $photo){
							$db->addtable("corporate_galleries");	$db->where("id",$photo["id"]);
							$db->addfield("seqno");			$db->addvalue($xx);
							$updating = $db->update();
							$xx++;
						}
						$_POST["rowGallery"]--;
					}
					$data = $db->fetch_all_data("corporate_galleries",[],"user_id='".$__user_id."' AND gallery_id='".$gallery_id."'");
					$rowGallery = $_POST["rowGallery"];
					if(count($data) > $rowGallery) $rowGallery = count($data);
					if(!$rowGallery) $rowGallery++;
					include_once "dashboard_corporate_gallery_form.php";
				} 
			?>
		</div>
		<div class="col-sm-12" style="padding-bottom:10px;border-bottom:1px solid #aaa;width:100%;"></div>
	<?php } ?>
</div>
<br><br>