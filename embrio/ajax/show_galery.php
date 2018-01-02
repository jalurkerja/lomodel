<?php 
	include_once "../common.php";
	$model_album_id = $_GET["model_album_id"];
	$filename = $db->fetch_single_data("model_albums","filename",["id" => $model_album_id]);
	$album_id = $db->fetch_single_data("model_albums","album_id",["id" => $model_album_id]);
	$next_id = $db->fetch_single_data("model_albums","id",["album_id" => $album_id,"id"=>$model_album_id.":>"],["id"]);
	$prev_id = $db->fetch_single_data("model_albums","id",["album_id" => $album_id,"id"=>$model_album_id.":<"],["id DESC"]);
	if(!$next_id) $next_id = $db->fetch_single_data("model_albums","id",["album_id" => $album_id],["id"]);
	if(!$prev_id) $prev_id = $db->fetch_single_data("model_albums","id",["album_id" => $album_id],["id DESC"]);
?>
<table>
	<tr>
		<td onclick="showGalery('<?=$prev_id;?>');" valign="middle" nowrap><i style="font-size:40px;" class="fa fa-arrow-left"></i></td>
		<td align="center" nowrap><img class="img-responsive" src="user_images/<?=$filename;?>" style="width:100%"></td>
		<td onclick="showGalery('<?=$next_id;?>');" valign="middle" align="right" nowrap><i style="font-size:40px;" class="fa fa-arrow-right"></i></td>
	</tr>
</table>