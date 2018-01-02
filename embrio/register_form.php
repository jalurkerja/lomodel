<?php if($_step == 1){ ?>
	<?php
		$_forms = array();
		if($_regrole == "2"){ 
			$_forms["ids"] = ["idcard","address","zipcode","phone","cellphone","web","nationality_id","gender_id","ig","fb","tw","about","photo"];
			$_forms["caption"] = ["ID Card","Address","Zip Code","Phone","Cellphone","Web","Nationality","Gender ID","Instagram","Facebook","Twitter","About","Photo"];
			$_forms["type"]["address"] = "textarea";
			$_forms["type"]["about"] = "textarea";
			$_forms["type"]["gender_id"] = "select";
			$_forms["type"]["nationality_id"] = "select";
			$_forms["type"]["photo"] = "file";
			$_forms["select_data"]["gender_id"] = [""=>"Gender...","1"=>"Male","2"=>"Female"];
			$nationalities = $db->fetch_select_data("nationalities","id","name",[],[],"",true);
			$nationalities[""] = "Nationality...";
			$_forms["select_data"]["nationality_id"] = $nationalities;
			$keyToNextCol = 6;
		} 
		if($_regrole == "3"){
			$_forms["ids"] = ["pic","idcard","address","zipcode","phone","cellphone","web","nationality_id","ig","fb","tw","about"];
			$_forms["caption"] = ["PIC","ID Card","Address","Zip Code","Phone","Cellphone","Web","Nationality","Instagram","Facebook","Twitter","About"];
			$_forms["type"]["address"] = "textarea";
			$_forms["type"]["about"] = "textarea";
			$_forms["type"]["nationality_id"] = "select";
			$_forms["isRequired"]["ig"] = "0";
			$_forms["isRequired"]["fb"] = "0";
			$_forms["isRequired"]["tw"] = "0";
			
			$nationalities = $db->fetch_select_data("nationalities","id","name",[],[],"",true);
			$nationalities[""] = "Nationality...";
			$_forms["select_data"]["nationality_id"] = $nationalities;
			
			if(!$keyToNextCol) $keyToNextCol = 6;
		} 
		if($_regrole == "4"){ 
			$_forms["ids"] = ["pic","address","zipcode","phone","cellphone","web","npwp","ig","fb","tw","about","logo"];
			$_forms["caption"] = ["PIC","Address","Zip Code","Phone","Cellphone","Web","NPWP","Instagram","Facebook","Twitter","About","Logo"];
			$_forms["type"]["address"] = "textarea";
			$_forms["type"]["about"] = "textarea";
			$_forms["type"]["logo"] = "file";
			$keyToNextCol = 6;
		} 
		if($_regrole == "5"){ 
			$_forms["ids"] = ["nationality_id","address","location_id","model_category_ids","hair_color_id","eye_colors_id","height","chest","bust","waist","hips","shoe","ig","fb","tw"];
			$_forms["caption"] = [v("nationality"),v("address"),v("location"),v("model_category"),v("hair_color"),v("eye_color"),v("height"),v("chest_size"),v("bust_size"),v("waist_size"),v("hips_size"),v("shoe_size"),"Instagram","Facebook","Twitter"];
			if($_mode == "editing"){
				array_unshift($_forms["ids"],"fullname");
				array_unshift($_forms["caption"],v("fullname"));
			}
			$_forms["type"]["nationality_id"] = "select";
			$_forms["type"]["location_id"] = "select";
			$_forms["type"]["model_category_ids"] = "select";
			$_forms["type"]["height"] = "select";
			$_forms["type"]["chest"] = "select";
			$_forms["type"]["bust"] = "select";
			$_forms["type"]["waist"] = "select";
			$_forms["type"]["hips"] = "select";
			$_forms["type"]["shoe"] = "select";
			$_forms["type"]["address"] = "textarea";
			$_forms["type"]["about"] = "textarea";
			$_forms["type"]["hair_color_id"] = "select";
			$_forms["type"]["eye_colors_id"] = "select";
			$_forms["type"]["photo"] = "file";
			$_forms["isRequired"]["bust"] = "0";
			$_forms["isRequired"]["ig"] = "0";
			$_forms["isRequired"]["fb"] = "0";
			$_forms["isRequired"]["tw"] = "0";
			$_forms["jsaction"]["model_category_ids"] = "onchange='model_category_change(this.value);'";
			if($_mode == "editing"){
				$_forms["value"]["nationality_id"] = $_data["nationality_id"];
				$_forms["value"]["fullname"] = $_data["first_name"]." ".$_data["middle_name"]." ".$_data["last_name"];
				$_forms["value"]["address"] = $_data["address"];
				$_forms["value"]["location_id"] = $_data["location_id"];
				$_forms["value"]["hair_color_id"] = $_data["hair_color_id"];
				$_forms["value"]["eye_colors_id"] = $_data["eye_colors_id"];
				$_forms["value"]["height"] = $_data["height"];
				$_forms["value"]["chest"] = $_data["chest"];
				$_forms["value"]["bust"] = $_data["bust"];
				$_forms["value"]["waist"] = $_data["waist"];
				$_forms["value"]["hips"] = $_data["hips"];
				$_forms["value"]["shoe"] = $_data["shoe"];
				$_forms["value"]["model_category_ids"] = $_data["model_category_ids"];
				$_forms["value"]["ig"] = $_data["ig"];
				$_forms["value"]["fb"] = $_data["fb"];
				$_forms["value"]["tw"] = $_data["tw"];
			}
			
			$nationalities = $db->fetch_select_data("nationalities","id","name",[],[],"",true);
			$nationalities[""] = v("nationality")."...";
			$_forms["select_data"]["nationality_id"] = $nationalities;
			
			$locations = $db->fetch_select_data("locations","id","name_".$__locale,[],["name_".$__locale],"",true);
			$locations[""] = v("location")."...";
			$_forms["select_data"]["location_id"] = $locations;
			
			$hair_colors = $db->fetch_select_data("hair_colors","id","name",[],[],"",true);
			$hair_colors[""] = v("hair_color")."...";
			$_forms["select_data"]["hair_color_id"] = $hair_colors;
			
			$eye_colors = $db->fetch_select_data("eye_colors","id","name",[],[],"",true);
			$eye_colors[""] = v("eye_color")."...";
			$_forms["select_data"]["eye_colors_id"] = $eye_colors;
			
			$heights[""] = v("height")."...";
			for($x=150;$x<=230;$x++){ 
				$inInch = number_format($x/2.54,2);
				$heights[$x] = $x." cm/".$inInch." inch";
			}
			$_forms["select_data"]["height"] = $heights;
			
			$chests[""] = v("chest_size")."...";
			for($x=80;$x<=150;$x++){ 
				$inInch = number_format($x/2.54,2);
				$chests[$x] = $x." cm/".$inInch." inch";
			}
			$_forms["select_data"]["chest"] = $chests;
			
			$waists[""] = v("waist_size")."...";
			for($x=70;$x<=100;$x++){ 
				$inInch = number_format($x/2.54,2);
				$waists[$x] = $x." cm/".$inInch." inch";
			}
			$_forms["select_data"]["waist"] = $waists;
			
			$hips[""] = v("hips_size")."...";
			for($x=80;$x<=120;$x++){ 
				$inInch = number_format($x/2.54,2);
				$hips[$x] = $x." cm/".$inInch." inch";
			}
			$_forms["select_data"]["hips"] = $hips;
			
			$shoes[""] = v("shoe_size")."...";
			for($x=38;$x<50;$x++){ 
				$shoes[$x] = $x;
			}
			$_forms["select_data"]["shoe"] = $shoes;
			
			$model_categories = $db->fetch_select_data("model_categories","id","name_".$__locale,[],[],"",true);
			$model_categories[""] = v("model_category")."...";
			$_forms["select_data"]["model_category_ids"] = $model_categories;
			
			$bust_sizes[""] = v("bust_size")."...";
			foreach($db->fetch_all_data("bust_size",["id","name"]) as $bust_size){
				$bust_sizes[$bust_size["name"]] = $bust_size["name"];
			}
			$_forms["select_data"]["bust"] = $bust_sizes;
			
			if(!$keyToNextCol) $keyToNextCol = 7;
		} 
	?>
	<script>
		function model_category_change(model_category_id){
			if(model_category_id == 1){
				$( "#bust" ).parent().css( "display", "none" );
			} else {
				$( "#bust" ).parent().css( "display", "block" );
			}
		}
	</script>
	<div class="col-sm-4 features wow fadeInRight animated">
		<?php 
			$labelClass = "";
			if($_mode != "editing") $labelClass = "class='sr-only'";
		?>
		<?php foreach($_forms["ids"] as $key => $_form_id){ ?>
			<div class="form-group">
				<label <?=$labelClass;?>><?=$_forms["caption"][$key];?> :</label>
				<?php
					$jsaction = $_forms["jsaction"][$_form_id];
					$isRequired = $_forms["isRequired"][$_form_id];
					if($isRequired == "") $isRequired = "required";
					if($isRequired == "0") $isRequired = "";
					$addAttr = $isRequired." ".$jsaction;
					if(!$_POST[$_form_id]) $_POST[$_form_id] = $_forms["value"][$_form_id];
					
					$_type = $_forms["type"][$_form_id];
					if(!$_type) $showinput = $f->input($_form_id,$_POST[$_form_id],$addAttr." placeholder='".$_forms["caption"][$key]."...'","form-control");
					else {
						if($_type == "number") $showinput = $f->input($_form_id,$_POST[$_form_id],"type='number' step='0.01' ".$addAttr." placeholder='".$_forms["caption"][$key]."...'","form-control");
						if($_type == "textarea") $showinput = $f->textarea($_form_id,$_POST[$_form_id],$addAttr." placeholder='".$_forms["caption"][$key]."...'","form-control");
						if($_type == "select") $showinput = $f->select($_form_id,$_forms["select_data"][$_form_id],$_POST[$_form_id],$addAttr,"form-control");
						if($_type == "select_multiple") $showinput = $f->select_multiple($_form_id,$_forms["select_data"][$_form_id],"",$addAttr,"form-control");
						if($_type == "file") $showinput = "<label>".$_forms["caption"][$key]." :</label>".$f->input($_form_id,"","type='file' accept='image/*'","form-control");
					}
					echo $showinput;
				?>
			</div>
		<?php 
				if(($key+1) % $keyToNextCol == 0 && $key > 0){
					echo "</div><div class='col-sm-4 features wow fadeInRight animated'>";
				}
			} 
		?>
	</div>
<?php } ?>
<?php 
	if($_step == 2){
		if($_regrole == 3) include_once "register_form_agency_2.php";
		if($_regrole == 5) include_once "register_form_model_2.php";
	} 
	if($_step == 3){
		if($_regrole == 5) include_once "register_form_model_3.php";
	} 
?>