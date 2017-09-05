<?php include_once "common.php"; ?>
<!DOCTYPE html>
<html lang="<?=$_COOKIE["locale"];?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?=$__title_project;?></title>

	<link rel="stylesheet" href="styles/azmind_style.css">
    <link href="styles/app.css" rel="stylesheet">
    <link href="styles/additional.css" rel="stylesheet">
    <link href="styles/font-awesome.min.css" rel="stylesheet">
    <link href="styles/footer-distributed-with-address-and-phones.css" rel="stylesheet">
	
	<script src="scripts/jquery-3.2.1.min.js"></script>
	<script src="public/bootstrap-4.0.0/js/bootstrap.min.js"></script>
	<script src="scripts/app.js"></script>
	<script src="scripts/jquery.js"></script>
	<script src="scripts/toastr.min.js"></script>
	
	<link rel="stylesheet" href="styles/toastr.min.css">
	<link rel="stylesheet" href="styles/animate.css">
	<link rel="stylesheet" href="styles/media-queries.css">
	<link rel="Shortcut Icon" href="images/logo.png">
	
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
<body style="margin:0px;padding:0px;">
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
		.content_area { padding:1px 20px 20px 20px;background-color:white; }
		
		.dropdown-menu li #separator {
			/* border-left:1px solid grey; */
			height:100px;
			width:20px;
			float:left;
		}
		
		.dropdown-menu li #desc {
			text-transform: none;
			padding:10px;
			color:#777;
			float:left;
			max-width:250px;
		}

		.dropdown-menu li #btn {
			float:right;
		}
	</style>
	
	<nav class="navbar navbar-default navbar-fixed-top">
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
					<img src="images/logo.png" style="position:relative;top:-7px;height:40px;max-width: 200%;cursor:pointer;border:0px;" alt="<?=$__title_project;?>" title="<?=$__title_project;?>" onclick="window.location='index.php';">
				</a>
				<div style="float:left;font-size:30px;position:relative;left:-10px;"><a style="color:#888;text-decoration:none;" href="index.php">LoModel</a></div>
			</div>
				
			<!--div class="header-search-input">
				<form action="/search" method="GET">
					<input type="text" class="header-search-drop" placeholder="Cari Judul, Nama, atau isi Campaign" name="keyword" value="" autocomplete="off">
					<span class="fa fa-search"></span>
				</form>
			</div-->
			

			<div class="collapse navbar-collapse" id="app-navbar-collapse">
				<!-- Left Side Of Navbar -->
				<ul class="nav navbar-nav">
					&nbsp;
				</ul>

				<!-- Right Side Of Navbar -->
				<ul class="nav navbar-nav navbar-right">
					<li><a href="news.php">News</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
							Models <span class="caret"></span>
						</a>
						<ul class="dropdown-menu wow fadeInLeft animated" role="menu">
							<li><a href="models.php?category=men">Men</a></li>
							<li><a href="models.php?category=women">Women</a></li>
							<li><a href="models.php?category=hijab">Hijab</a></li>
							<li><a href="models.php">Show All</a></li>
						</ul>
					</li>
					<li><a href="jobs.php">Jobs</a></li>
					<li><a href="agencies.php">Agencies</a></li>
					<li style="width:100px;"><a></a></li>
					<?php if(!$__isloggedin){ ?>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								Register <span class="caret"></span>
							</a>
							<ul class="dropdown-menu" role="menu">
								<li>
									<div style="margin:10px;width:1000px;" class="wow fadeInLeft animated">
										<div class="col-sm-4" id="desc">
											<b>PERSONAL</b><br>
											Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
											<div id="btn"><?=$f->input("btn_reg_peronal","Register","type='button' onclick=\"window.location='register.php?as=personal';\"","btn btn-link-1");?></div>
										</div>
										<div class="col-sm-4" id="desc">
											<b>AGENCY</b><br>
											Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
											<div id="btn"><?=$f->input("btn_reg_peronal","Register","type='button' onclick=\"window.location='register.php?as=agency';\"","btn btn-link-1");?></div>
										</div>
										<div class="col-sm-4" id="desc">
											<b>CORPORATE</b><br>
											Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
											<div id="btn"><?=$f->input("btn_reg_peronal","Register","type='button' onclick=\"window.location='register.php?as=corporate';\"","btn btn-link-1");?></div>
										</div>
										<div class="col-sm-4" id="desc">
											<b>TALENT/MODEL</b><br>
											Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
											<div id="btn"><?=$f->input("btn_reg_peronal","Register","type='button' onclick=\"window.location='register.php?as=talent';\"","btn btn-link-1");?></div>
										</div>
									</div>
								</li>
							</ul>
						</li>
						
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								Masuk <span class="caret"></span>
							</a>
							<ul class="dropdown-menu" role="menu">
								<li>
									<div class="col-sm-5 wow fadeInLeft animated">
									<style> .this_form_login input[type='text'], input[type='password']{padding:0px 10px 0px 10px;} </style>
									<style> .this_form_login input{height:40px;} </style>
									<?php $f->setAttribute("class='this_form_login'");?>
									<?=$f->start();?>
										<?=$t->start("style='color:#888;' ");?>
											<?=$t->row(["Username","&nbsp;&nbsp;&nbsp;".$f->input("username")]);?>
											<?=$t->row(["Password","&nbsp;&nbsp;&nbsp;".$f->input("password","","type='password'")]);?>
											<?=$t->row(["","&nbsp;&nbsp;&nbsp;".$f->input("login_action","Login","type='submit'","btn btn-link-1")]);?>
										<?=$t->end();?>
									<?=$f->end();?>
									</div>
								</li>
							</ul>
						</li>
					<?php } else { ?>
					
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								<?=$__fullname;?> <span class="caret"></span>
							</a>
							<ul class="dropdown-menu" role="menu">
								<?php if($__role == 2){ ?>
									<li><a href="#investor_profile.php">Profile</a></li>
								<?php } ?>
								<?php if($__role == 3){ ?>
									<li><a href="#developer_profile.php">Profile</a></li>
								<?php } ?>
								<li><a href="?logout_action=1">Logout</a></li>
							</ul>
						</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</nav>