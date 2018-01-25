<?php
	include_once "../common.php";
	exit();
	function bacafile($filename){
		$handle = fopen($filename, "r");
		$contents = fread($handle, filesize($filename));
		fclose($handle);
		return $contents;
	}
	$data = array();
	$headers = array();
	$xx = -1;
	$modelsFolder = "models";
	$d = dir($modelsFolder);
	while (false !== ($modelFolder = $d->read())) {
		if($modelFolder != "." && $modelFolder != ".."){
			$xx++;
			$data[$xx]["modelFolder"] = $modelFolder;
			$profiles = bacafile($modelsFolder."/".$modelFolder."/idLomodel.txt");
			$profiles = explode(chr(13).chr(10),$profiles);
			foreach($profiles as $profile){
				if(trim($profile) != ""){
					$temp = explode(":",$profile);
					$headers[trim($temp[0])] = 1;
					$data[$xx][trim($temp[0])] = trim($temp[1]);
				}
			}			
			$d1 = dir($modelsFolder."/".$modelFolder);
			while (false !== ($modelFiles = $d1->read())) {
				if($modelFiles != "." && $modelFiles != ".." && $modelFiles != "idLomodel.txt"){
					$data[$xx]["album"][] = $modelFiles;
				}
			}
			$d1->close();
		}
	}
	$d->close();
	
	$db->addtable("a_users");$db->where("role","5");$db->delete_();
	$db->addtable("model_profiles");$db->where("user_id","0","i",">");$db->delete_();
	foreach($data as $profile){
		echo $profile["modelFolder"]."<br>";
		$password = base64_encode(explode("@",$profile["Email"])[0].rand(0,9).rand(0,9).rand(0,9));
		$db->addtable("a_users");
		$db->addfield("group_id");	$db->addvalue("-1");
		$db->addfield("email");		$db->addvalue($profile["Email"]);
		$db->addfield("password");	$db->addvalue($password);
		$db->addfield("name");		$db->addvalue($profile["Nama"]);
		$db->addfield("role");		$db->addvalue("5");
		$db->addfield("verified");	$db->addvalue("1");
		$db->addfield("created_at");$db->addvalue($__now);
		$db->addfield("created_by");$db->addvalue($profile["Email"]);
		$db->addfield("created_ip");$db->addvalue($__remote_addr);
		$db->addfield("updated_at");$db->addvalue($__now);
		$db->addfield("updated_by");$db->addvalue($profile["Email"]);
		$db->addfield("updated_ip");$db->addvalue($__remote_addr);
		$inserting = $db->insert();
		if($inserting["affected_rows"] > 0){
			$user_id = $inserting["insert_id"];
			$names = explode(" ",$profile["Nama"]);
			$first_name = $names[0];	$middle_name = $names[1];	$last_name = "";
			for($xx=2;$xx <= count($names); $xx++){ $last_name .= $names[$xx]." "; }
			if($profile["Jenis kelamin"] == "Pria") $gender_id = "1";
			if($profile["Jenis kelamin"] == "Perempuan") $gender_id = "2";
			$birth_at = explode("-",$profile["Tanggallahir"]);
			$birth_at = date("Y-m-d",mktime(0,0,0,$birth_at[1]*1,$birth_at[0]*1,$birth_at[2]*1));
			$address = explode(",",$profile["Alamat"])[0];
			$location = trim(explode(",",$profile["Alamat"])[1]);
			$location_id = $db->fetch_single_data("locations","id",["name_id"=>"%".$location."%:LIKE"]);
			$hair_color_id = $db->fetch_single_data("hair_colors","id",["name"=>"%".$profile["Warna Rambut"]."%:LIKE"]);
			$eye_colors_id = $db->fetch_single_data("eye_colors","id",["name"=>"%".$profile["Warna Bola Mata"]."%:LIKE"]);
			$height = trim($profile["Tinggi"]);
			$chest = trim(str_ireplace("cm","",$profile["Lingkar dada"]));
			$bust = substr($profile["Ukuran Bra"],0,2)." ".substr($profile["Ukuran Bra"],2);
			$waist = trim(str_ireplace("cm","",$profile["Lingkar Pinggang"]));
			$hips = trim(str_ireplace("cm","",$profile["Lingkar Pinggul"]));
			$shoe = trim($profile["Ukuran sepatu"]);
			$model_categories = explode("/",$profile["Kategori Model"]);
			$model_category_ids = "";
			foreach($model_categories as $model_category){
				if(strtolower(trim($model_category)) == "pria") $model_category_ids .= "|1|";
				if(strtolower(trim($model_category)) == "wanita") $model_category_ids .= "|2|";
				if(strtolower(trim($model_category)) == "hijab") $model_category_ids .= "|3|";
			}
			$ig = trim($profile["Instagram"]);
			$fb = trim($profile["Facebook"]);
			$tw = trim($profile["Twitter"]);
			
			$db->addtable("model_profiles");
			$db->addfield("user_id");			$db->addvalue($user_id);
			$db->addfield("nationality_id");	$db->addvalue("32");
			$db->addfield("first_name");		$db->addvalue($first_name);
			$db->addfield("middle_name");		$db->addvalue($middle_name);
			$db->addfield("last_name");			$db->addvalue($last_name);
			$db->addfield("gender_id");			$db->addvalue($gender_id);
			$db->addfield("birth_at");			$db->addvalue($birth_at);
			$db->addfield("address");			$db->addvalue($address);
			$db->addfield("location_id");		$db->addvalue($location_id);
			$db->addfield("hair_color_id");		$db->addvalue($hair_color_id);
			$db->addfield("eye_colors_id");		$db->addvalue($eye_colors_id);
			$db->addfield("height");			$db->addvalue($height);
			$db->addfield("chest");				$db->addvalue($chest);
			$db->addfield("bust");				$db->addvalue($bust);
			$db->addfield("waist");				$db->addvalue($waist);
			$db->addfield("hips");				$db->addvalue($hips);
			$db->addfield("shoe");				$db->addvalue($shoe);
			$db->addfield("model_category_ids");$db->addvalue($model_category_ids);
			$db->addfield("ig");				$db->addvalue($ig);
			$db->addfield("fb");				$db->addvalue($fb);
			$db->addfield("tw");				$db->addvalue($tw);
			$db->addfield("created_at");		$db->addvalue($__now);
			$db->addfield("created_by");		$db->addvalue($profile["Email"]);
			$db->addfield("created_ip");		$db->addvalue($__remote_addr);
			$db->addfield("updated_at");		$db->addvalue($__now);
			$db->addfield("updated_by");		$db->addvalue($profile["Email"]);
			$db->addfield("updated_ip");		$db->addvalue($__remote_addr);
			$inserting = $db->insert();
			if($inserting["affected_rows"] > 0){
				$photo = randtoken(20)."_profilephoto_".$user_id.".jpg";
				$sourceFile = "models/".str_replace(" "," ",$profile["modelFolder"]."/".$profile["album"][0]);
				echo $sourceFile."<br>";
				if(!copy($sourceFile, "../user_images/".$photo)){
					$errors= error_get_last();
					echo "<br>Error : ".$errors["message"];
				} else {
					$db->addtable("model_profiles");$db->where("user_id",$user_id);
					$db->addfield("photo");			$db->addvalue($photo);
					$db->update();
					$album_id = randtoken(20)."_album_".$user_id;
					foreach($profile["album"] as $key => $album){
						$photo = randtoken(20-strlen($key)).$key."_album_".$user_id.".jpg";
						$sourceFile = "models/".str_replace(" "," ",$profile["modelFolder"]."/".$album);
						echo $sourceFile."<br>";
						if(!copy($sourceFile, "../user_images/".$photo)){
							$errors= error_get_last();
							echo "<br>Error : ".$errors["message"];
						} else {
							$db->addtable("model_albums");
							$db->addfield("user_id");	$db->addvalue($user_id);
							$db->addfield("album_id");	$db->addvalue($album_id);
							$db->addfield("album_name");$db->addvalue("My Album");
							$db->addfield("seqno");		$db->addvalue($key);
							$db->addfield("filename");	$db->addvalue($photo);
							$db->addfield("status");	$db->addvalue(1);
							$db->addfield("created_at");$db->addvalue($__now);
							$db->addfield("created_by");$db->addvalue($profile["Email"]);
							$db->addfield("created_ip");$db->addvalue($__remote_addr);
							$db->insert();
						}
					}
				}
			}
		}
	}
?>