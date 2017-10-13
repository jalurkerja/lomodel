<?php if($_step == 1){ ?>
	<?php
		$_forms = array();
		$keyToNextCol = 6;
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
			$keyToNextCol = 5;
		} 
		if($_regrole == "3"){ 
			$_forms["ids"] = ["pic","idcard","address","zipcode","phone","cellphone","web","nationality_id","gender_id","ig","fb","tw","about","photo"];
			$_forms["caption"] = ["PIC","ID Card","Address","Zip Code","Phone","Cellphone","Web","Nationality","Gender ID","Instagram","Facebook","Twitter","About","Photo"];
			$_forms["type"]["address"] = "textarea";
			$_forms["type"]["about"] = "textarea";
			$_forms["type"]["gender_id"] = "select";
			$_forms["type"]["nationality_id"] = "select";
			$_forms["type"]["photo"] = "file";
			$_forms["select_data"]["gender_id"] = [""=>"Gender...","1"=>"Male","2"=>"Female"];
			$nationalities = $db->fetch_select_data("nationalities","id","name",[],[],"",true);
			$nationalities[""] = "Nationality...";
			$_forms["select_data"]["nationality_id"] = $nationalities;
		} 
		if($_regrole == "4"){ 
			$_forms["ids"] = ["pic","address","zipcode","phone","cellphone","web","npwp","ig","fb","tw","about","logo"];
			$_forms["caption"] = ["PIC","Address","Zip Code","Phone","Cellphone","Web","NPWP","Instagram","Facebook","Twitter","About","Logo"];
			$_forms["type"]["address"] = "textarea";
			$_forms["type"]["about"] = "textarea";
			$_forms["type"]["logo"] = "file";
			$keyToNextCol = 5;
		} 
		if($_regrole == "5"){ 
			$_forms["ids"] = ["nationality_id","address","hair_color_id","eye_colors_id","height","bust","waist","hips","shoe","model_category_ids","ig","fb","tw"];
			$_forms["caption"] = ["Nationality","Address","Hair Color","Eye Color","Height","Bust","Waist","Hips","Shoe","Model Category","Instagram","Facebook","Twitter"];
			$_forms["type"]["nationality_id"] = "select";
			$_forms["type"]["height"] = "number";
			$_forms["type"]["bust"] = "number";
			$_forms["type"]["waist"] = "number";
			$_forms["type"]["hips"] = "number";
			$_forms["type"]["shoe"] = "number";
			$_forms["type"]["address"] = "textarea";
			$_forms["type"]["about"] = "textarea";
			$_forms["type"]["hair_color_id"] = "select";
			$_forms["type"]["eye_colors_id"] = "select";
			$_forms["type"]["model_category_ids"] = "select_multiple";
			$_forms["type"]["photo"] = "file";
			$nationalities = $db->fetch_select_data("nationalities","id","name",[],[],"",true);
			$nationalities[""] = "Nationality...";
			$_forms["select_data"]["nationality_id"] = $nationalities;
			$hair_colors = $db->fetch_select_data("hair_colors","id","name",[],[],"",true);
			$hair_colors[""] = "Hair Color...";
			$_forms["select_data"]["hair_color_id"] = $hair_colors;
			$eye_colors = $db->fetch_select_data("eye_colors","id","name",[],[],"",true);
			$eye_colors[""] = "Eye Color...";
			$_forms["select_data"]["eye_colors_id"] = $eye_colors;
			$model_categories = $db->fetch_select_data("model_categories","id","name_".$__locale,[],[],"",true);
			$model_categories[""] = "Model Categories...";
			$_forms["select_data"]["model_category_ids"] = $model_categories;
			$keyToNextCol = 6;
		} 
	?>
	<div class="col-sm-4 features wow fadeInRight animated">
		<?php foreach($_forms["ids"] as $key => $_form_id){ ?>
			<div class="form-group">
				<label class="sr-only"><?=$_forms["caption"][$key];?></label>
				<?php
					$_type = $_forms["type"][$_form_id];
					if(!$_type) $showinput = $f->input($_form_id,$_POST[$_form_id],"required placeholder='".$_forms["caption"][$key]."...'","form-control");
					else {
						if($_type == "number") $showinput = $f->input($_form_id,$_POST[$_form_id],"type='number' step='0.01' required placeholder='".$_forms["caption"][$key]."...'","form-control");
						if($_type == "textarea") $showinput = $f->textarea($_form_id,$_POST[$_form_id],"required placeholder='".$_forms["caption"][$key]."...'","form-control");
						if($_type == "select") $showinput = $f->select($_form_id,$_forms["select_data"][$_form_id],$_POST[$_form_id],"","form-control");
						if($_type == "select_multiple") $showinput = $f->select_multiple($_form_id,$_forms["select_data"][$_form_id],"","","form-control");
						if($_type == "file") $showinput = "<label>".$_forms["caption"][$key]." :</label>".$f->input($_form_id,"","type='file' accept='image/*'","form-control");
					}
					echo $showinput;
				?>
			</div>
		<?php 
				if($key >= $keyToNextCol && $key < $keyToNextCol + 1){
					echo "</div><div class='col-sm-4 features wow fadeInRight animated'>";
				}
			} 
		?>
	</div>
<?php } ?>
<?php if($_step == 2){ ?>
	<?php if($_regrole == 5){ ?>
		<div class="container fadeInLeft animated">
			<h1 class="well">Upload Your Photos</h1>
			<div class="col-lg-12 well">
				<form role="form" method="POST" autocomplete="off" enctype="multipart/form-data">
					<?php $ii = -1; ?>
					<?php for($col = 0; $col < 2; $col++){ ?>
					<div class="col-sm-6 features wow fadeInRight animated">
						<?php for($row = 0; $row < 5; $row++){ ?>
							<?php $ii++; ?>
							<div class="form-group">
								<label class="sr-only">Photo</label>
								<?=$f->input("title[".$ii."]","","placeholder='Title...'","form-control");?>
								<?=$f->input("filename[".$ii."]","","type='file'","form-control");?>
							</div>
						<?php } ?>
					</div>
					<?php } ?>
					<table width="100%"><tr><td align="right"> <?=$f->input("register","Register","type='submit' style='width:100%;'","btn btn-lg btn-info");?> </td></tr></table>
				</form>
			</div>
		</div>
	<?php } ?>
<?php } ?>