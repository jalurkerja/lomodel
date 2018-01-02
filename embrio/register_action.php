<?php
	if(isset($_POST["register"])){
		$success_link = "";
		$_error_message = "";
		$fields_name = array();
		if($_step == 1){
			if($db->fetch_single_data("a_users","id",["email" => $_POST["email"]]) <= 0){
				if($_POST["password_"] == $_POST["repassword"]){
					$db->addtable("a_users");
					$db->addfield("group_id");		$db->addvalue("-1");
					$db->addfield("email");			$db->addvalue($_POST["email"]);
					$db->addfield("password");		$db->addvalue(base64_encode($_POST["password_"]));
					$db->addfield("name");			$db->addvalue($_POST["name"]);
					$db->addfield("role");			$db->addvalue($_regrole);
					$inserting = $db->insert();
					if($inserting["affected_rows"] > 0){
						$user_id = $inserting["insert_id"];
						$_SESSION["username"] = $_POST["email"];
						$_SESSION["isloggedin"] = 1;
						$_SESSION["user_id"] = $user_id;
						$_SESSION["group_id"] = "-1";
						$_SESSION["fullname"] = $_POST["name"];
						$_SESSION["is_seeker"] = true;
						$_SESSION["role"] = $_regrole;
						
						$db->addtable("a_log_histories"); 
						$db->addfield("user_id");$db->addvalue($user_id);
						$db->addfield("email");$db->addvalue($_POST["email"]);
						$db->addfield("x_mode");$db->addvalue(1);
						$db->addfield("log_at");$db->addvalue(date("Y-m-d H:i:s"));
						$db->addfield("log_ip");$db->addvalue($_SERVER["REMOTE_ADDR"]);
						$db->insert(); 
						
						if($_regrole == "2"){
							$table_name = "personal_profiles";
							$fields_name = ["name","idcard","address","zipcode","phone","cellphone","web","nationality_id","gender_id","ig","fb","tw","about"];
						}
						if($_regrole == "3"){
							$table_name = "agency_profiles";
							$fields_name = ["name","pic","idcard","address","zipcode","phone","cellphone","web","nationality_id","ig","fb","tw","about"];
						}
						if($_regrole == "4"){
							$table_name = "corporate_profiles";
							$fields_name = ["name","pic","address","zipcode","phone","cellphone","web","npwp","ig","fb","tw","about"];
						}
						if($_regrole == "5"){
							$_POST["name"] = str_replace("  "," ",$_POST["name"]);
							$names = explode(" ",$_POST["name"]);
							$_POST["first_name"] = $names[0];
							$_POST["middle_name"] = $names[1];
							for($xx=2;$xx <= count($names); $xx++){ $_POST["last_name"] .= $names[$xx]." "; }
							$table_name = "model_profiles";
							$fields_name = ["nationality_id","first_name","middle_name","last_name","address","location_id","hair_color_id","eye_colors_id","height","chest","bust","waist","hips","shoe","model_category_ids","ig","fb","tw"];
						}
						
						$db->addtable($table_name);
						$db->addfield("user_id");		$db->addvalue($user_id);
						foreach($fields_name as $field_name){
							$db->addfield($field_name);		$db->addvalue($_POST[$field_name]);
						}
						
						$inserting = $db->insert(); 
						// echo $inserting["sql"];
						if($inserting["affected_rows"] > 0){
							$success_link = "index.php?just_register_as=".$_regrole;
							if($_regrole == "2") $success_link = "?as=personal&step=2";
							if($_regrole == "3") $success_link = "?as=agency&step=2";
							if($_regrole == "4") $success_link = "?as=corporate&step=2";
							if($_regrole == "5") $success_link = "?as=model&step=2";
						}
					}
				} else {
					$_error_message = "Invalid Retype Password!";
				}
			} else {
				$_error_message = "Email ".$_POST["email"]." already used!";
			}
		}
		if($success_link != ""){ javascript("window.location='".$success_link."';"); exit(); }
	}
?>