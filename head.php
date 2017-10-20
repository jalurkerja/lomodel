<?php include_once "common.php"; ?>
<!DOCTYPE html>
<html lang="<?=$_COOKIE["locale"];?>">
<head>
	<title><?=$__title_project;?></title>
	<meta charset="utf-8">
	<meta name="description" content="<?=$__project_description;?>">
	<meta name="author" content="<?=$__title_project;?>">
	<meta name="format-detection" content="telephone=no">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	
	<link rel="canonical" href="http://www.lomodel.id">
	<link rel="shortcut icon" type="image/x-icon" href="images/logo.png">
	<link rel="stylesheet" href="styles/style.css">
	<link rel="stylesheet" href="styles/bootstrap.min.css">
	<link rel="stylesheet" href="styles/bootstrap-slider.css">
	<link rel="stylesheet" href="styles/animate.css">
	<link rel="stylesheet" href="styles/toastr.min.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
	
	<script src="scripts/jquery.min.js"></script>
	<script src="scripts/bootstrap.min.js"></script>
	<script src="scripts/toastr.min.js"></script>
	<script src="scripts/bootstrap-slider.js"></script>
	<script src="scripts/newWaterfall.js"></script>
	
	<script>
		function ajaxLoad(filename, content) {
			content = typeof content !== 'undefined' ? content : 'content';
			$('.loading').show();
			$.ajax({
				type: "GET",
				url: filename,
				contentType: false,
				success: function (data) {
					$("#" + content).html(data);
					$('.loading').hide();
				},
				error: function (xhr, status, error) {
					$("#" + content).html(xhr.responseText);
					$('.loading').hide();
				}
			});
		}
	</script>
</head>
<body style="margin:0px;">
	<style>
		.loading {
			background: lightgoldenrodyellow url('icons/processing.gif') no-repeat center 65%;
			height: 120px;
			width: 120px;
			position: fixed;
			border-radius: 4px;
			left: 50%;
			top: 50%;
			margin: -40px 0 0 -50px;
			z-index: 2000;
			display: none;
		}
	</style>
	
	<!-- Modal -->
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title" id="modalTitle"></h4>
				</div>
				<div class="modal-body" id="modalBody"></div>
				<div class="modal-footer" id="modalFooter"></div>
			</div>
		</div>
	</div>
	
	<nav class="navbar navbar-default navbar-fixed-top fadeInLeft animated">
		<div class="container">
			<div class="navbar-header">
				<!-- Collapsed Hamburger -->
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<!-- Branding Image -->
				<a class="navbar-brand" href="index.php">
					<img src="images/logo.png" style="position:relative;top:-10px;height:40px;max-width: 200%;cursor:pointer;border:0px;" alt="<?=$__title_project;?>" title="<?=$__title_project;?>" onclick="window.location='index.php';">
				</a>
				<div style="float:left;font-size:30px;position:relative;left:-10px;top:5px;"><a style="color:#888;text-decoration:none;" href="index.php">LoModel</a></div>
			</div>
			

			<div class="collapse navbar-collapse" id="app-navbar-collapse">
				<!-- Right Side Of Navbar -->
				<ul class="nav navbar-nav navbar-right">
					<!--li><a href="news.php"><?=v("news");?></a></li-->
					<li class="dropdown">
						<a href="models.php" class="dropdown-toggle"><?=v("models");?> <span class="caret"></span></a>
						<ul class="dropdown-menu wow fadeInLeft animated" role="menu">
							<?php 
								$model_categories = $db->fetch_all_data("model_categories");
								foreach($model_categories as $model_category){
									echo "<li><a href='models.php?filter_model_category=".$model_category["id"]."&filter_search=Search'>".$model_category["name_".$__locale]."</a></li>";
								}
							?>
						</ul>
					</li>
					<li class="dropdown">
						<a href="castings.php" class="dropdown-toggle"><?=v("castings");?> <span class="caret"></span></a>
						<ul class="dropdown-menu wow fadeInLeft animated" role="menu">
							<li><a href="castings.php"><?=v("see_all_castings");?></a></li>
							<li><a href="dashboard.php?tabActive=post_a_casting"><?=v("post_casting");?></a></li>
						</ul>
					</li>
					<li><a href="agencies.php"><?=v("agencies");?></a></li>
					<li style="width:100px;"><a></a></li>
					<?php if(!$__isloggedin){ ?>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle"><?=v("signup");?> <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li>
									<div style="margin:10px;width:1000px;" class="wow fadeInLeft animated">
										<div class="col-sm-4" id="desc">
											<b><?=strtoupper(v("model"));?></b><br><?=v("model_description");?><br>
											<?=$f->input("btn_reg_peronal","Register","type='button' onclick=\"window.location='register.php?as=model';\"","btn-link-1");?>
										</div>
										<div class="col-sm-4" id="desc">
											<b><?=strtoupper(v("personal"));?></b><br><?=v("personal_description");?><br>
											<?=$f->input("btn_reg_peronal","Register","type='button' onclick=\"window.location='register.php?as=personal';\"","btn-link-1");?>
										</div>
										<div class="col-sm-4" id="desc">
											<b><?=strtoupper(v("agency"));?></b><br><?=v("agency_description");?><br>
											<?=$f->input("btn_reg_peronal","Register","type='button' onclick=\"window.location='register.php?as=agency';\"","btn-link-1");?>
										</div>
										<div class="col-sm-4" id="desc">
											<b><?=strtoupper(v("corporate"));?></b><br><?=v("corporate_description");?><br>
											<?=$f->input("btn_reg_peronal","Register","type='button' onclick=\"window.location='register.php?as=corporate';\"","btn-link-1");?>
										</div>
									</div>
								</li>
							</ul>
						</li>
						
						<li>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=v("signin");?> <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li>
									<div class="col-sm-5 fadeInLeft animated">
										<div style="width:200px;" class="text-center">
											<?php $f->setAttribute("class='this_form_login'");?>
											<?=$f->start();?>
												<img width="100" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
												<p id="profile-name" class="profile-name-card"></p>
												<form class="form-signin">
													<input name="username" class="form-control" placeholder="Username" required autofocus>
													<div style="height:5px;"></div>
													<input name="password" type="password" class="form-control" placeholder="Password" autocomplete="new-password" required>
													<div style="height:5px;"></div>
													<?=$t->row([$f->input("login_action","Login","type='submit'","btn btn-link-1")]);?>
												</form>
											<?=$f->end();?>
										</div>
									</div>
								</li>
							</ul>
						</li>
					<?php } else { ?>
					
						<li class="dropdown">
							<a href="#" class="dropdown-toggle">
								<?=$__fullname;?> <span class="caret"></span>
							</a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="dashboard.php"><?=v("my_dasboard");?></a></li>
								<li><a href="?logout_action=1">Logout</a></li>
							</ul>
						</li>
					<?php } ?>
						<li><a href="?locale=<?=$__anti_locale;?>"><img class="localeFlag" height="20" src="icons/<?=$__anti_locale;?>.png"></a></li>
				</ul>
			</div>
		</div>
	</nav>