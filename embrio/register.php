<?php include_once "head.php";?>
<?php include_once "main_container.php"; ?>
	<?php
		if(($__isloggedin || !isset($_GET["as"])) && $_GET["step"] < 2){
			?> <script>window.location="index.php";</script> <?php
			exit();
		}
		if($_GET["step"] >= 2){
			if($__role == ""){
				?> <script>window.location="index.php";</script> <?php
				exit();
			}
			if($__role == "2") $_GET["as"] = "personal";
			if($__role == "3") $_GET["as"] = "agency";
			if($__role == "4") $_GET["as"] = "corporate";
			if($__role == "5") $_GET["as"] = "model";
		}
		$_step = (isset($_GET["step"])) ? $_GET["step"] : "1";
		$_add_name_placeholder = "";
		if($_GET["as"] == "personal"){
			$registeras = v("personal");
			$_regrole = "2";
		}
		if($_GET["as"] == "agency"){
			$registeras = v("agency");
			$_add_name_placeholder = "Agency ";
			$_regrole = "3";
		}
		if($_GET["as"] == "corporate"){
			$registeras = v("corporate");
			$_add_name_placeholder = "Corporate ";
			$_regrole = "4";
		}
		if($_GET["as"] == "model"){
			$registeras = "Model";
			$_regrole = "5";
		}
		
		include_once "scripts/register_js.php";
		include_once "register_action.php";
		
		if($_error_message != ""){
			?><script> toastr.warning('<?=$_error_message;?>','',toastroptions); </script> <?php
		}
		
		$selectRegisterAs = "";
		$titleClass = "col-md-12";
		if($_GET["as"] == "nomodel" || $_GET["as"] == "null"){
			$selectRegisterAs .= "<div class='col-md-2'>";
			$selectRegisterAs .= "<select class='form-control' onchange=\"window.location='?as='+this.value;\">";
			$selectRegisterAs .= "<option value=''></option>";
			if($_GET["as"] == "null"){
				$selectRegisterAs .= "<option value='model'>".v("model")."</option>";
			}
			$selectRegisterAs .= "<option value='personal'>".v("personal")."</option>";
			$selectRegisterAs .= "<option value='agency'>".v("agency")."</option>";
			$selectRegisterAs .= "<option value='corporate'>".v("corporate")."</option>";
			$selectRegisterAs .= "</select>";
			$selectRegisterAs .= "</div>";
			$titleClass = "col-md-3";
		}
	?>
	<?php if($_step == 1){ ?>
		<div class="container fadeInLeft animated">
			<h2 class="well col-md-12"><div class="<?=$titleClass;?>"><?=v("register_as");?> <?=$registeras;?> </div><?=$selectRegisterAs;?></h2>
			<?php if($_GET["as"] != "nomodel" && $_GET["as"] != "null"){ ?>
				<div class="col-lg-12 well">
					<form role="form" method="POST" autocomplete="off" onsubmit="return validation()" enctype="multipart/form-data">				
						<div class="col-sm-4 features wow fadeInRight animated">
							<div class="form-group">
								<label class="sr-only">Name</label>
								<?=$f->input("name",$_POST["name"],"required placeholder='".$_add_name_placeholder."Name...'","form-control");?>
							</div>
							<div class="form-group">
								<label class="sr-only">Email</label>
								<?=$f->input("email",$_POST["email"],"type='email' required placeholder='Email...'","form-control");?>
							</div>
							<div class="form-group">
								<label class="sr-only">Password</label>
								<?=$f->input("password_","","pattern='.{6,}' title='6 characters minimum' required type='password' placeholder='Password (minimum 6 character)...' autocomplete='new-password'","form-control");?>
							</div>
							<div class="form-group">
								<label class="sr-only">Retype Password</label>
								<?=$f->input("repassword","","required type='password' placeholder='Retype Password...'","form-control");?>
							</div>
						</div>
						<?php include_once "register_form.php"; ?>
						<table width="100%"><tr><td align="right"> <?=$f->input("register","Register","type='submit' style='width:100%;'","btn btn-lg btn-info");?> </td></tr></table>
					</form>
				</div>
			<?php } ?>
		</div>
	<?php 
		} else {
			include_once "register_form.php";
		}
	?>
<?php include_once "main_container_end.php"; ?>
<br>
<?php include_once "footer.php";?>
