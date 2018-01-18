<br>
<div>
	<?php 
		if(!isset($_GET["album_id"])){ //Album Listing
			$model_albums = $db->fetch_all_data("model_albums",[],"user_id='".$_GET["user_id"]."' GROUP BY album_id ORDER BY created_at DESC");
			if(count($model_albums) <= 0){
				echo "<span class='col-sm-12 well' style='color:red;'>".v("data_not_found")."</span>";
			} else {
				foreach($model_albums as $model_album){
					
			?>
				<div class="col-sm-12 well">
					<div><h4><?=$model_album["album_name"];?></h4></div>
					<?php
						$photos = $db->fetch_all_data("model_albums",[],"user_id='".$_GET["user_id"]."' AND album_id='".$model_album["album_id"]."' LIMIT 6");
						foreach($photos as $photo){
							?> 
							<div class="col-sm-2">
								<img style="cursor:pointer;" class="img-responsive" src="user_images/<?=$photo["filename"];?>" onclick="window.location='?user_id=<?=$_GET["user_id"];?>&tabActive=albums&album_id=<?=$model_album["album_id"];?>';"> 
							</div>
							<?php
						}
					?>
					<div class="col-sm-12">
						<br>
						<?=$f->input("more","More","onclick=\"window.location='?user_id=".$_GET["user_id"]."&tabActive=albums&album_id=".$model_album["album_id"]."';\" type='button'","btn btn-lg btn-primary");?>
					</div>
				</div>
				<div class="col-sm-12" style="padding-bottom:10px;border-bottom:1px solid #aaa;width:100%;"></div>
			<?php } ?>
		<?php } ?>
	<?php 
		} else {
	?>
		<div class="col-sm-12 well">
			<div><h4><?=$db->fetch_single_data("model_albums","album_name",["user_id" => $_GET["user_id"],"album_id"=>$_GET["album_id"]]);?></h4></div>
			<?php
				$photos = $db->fetch_all_data("model_albums",[],"user_id='".$_GET["user_id"]."' AND album_id='".$_GET["album_id"]."'");
				foreach($photos as $photo){
					?><div class="col-sm-2" style="padding-bottom:20px;"><img style="cursor:pointer;" class="img-responsive" src="user_images/<?=$photo["filename"];?>" onclick="showGalery('<?=$photo["id"];?>');"></div><?php
				}
			?>
			<div class="col-sm-12">
				<br><?=$f->input("back","Back","onclick=\"window.location='?user_id=".$_GET["user_id"]."&tabActive=albums';\" type='button'","btn btn-lg btn-info");?>
			</div>
		</div>
		<div class="col-sm-12" style="padding-bottom:10px;border-bottom:1px solid #aaa;width:100%;"></div>
	<?php } ?>
</div>
<br><br>