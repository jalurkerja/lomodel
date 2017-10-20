<?php include_once "homepage_header.php"; ?>
	<!-- Top content -->
	<div class="top-content" id="videoContainer">
		<div class="container">
			<div id="div_video" style="left:0px;top:0px;overflow:hidden;margin:0px;padding:0px;height:660px;width:100%;position:absolute;">
				<div align="center" class="embed-responsive embed-responsive-16by9">
					<video id="mainVideo" Xautoplay loop class="embed-responsive-item">
						<source src="images/LoModel.mp4" type="video/mp4">
					</video>
				</div>
				<?php if(!$__isloggedin){ ?>
				<div class="container">
					<center>
						<h2><?=v("discover_models_or_be_discovered");?></h2>
						<h2><?=v("the_easier_way_to_find_models");?></h2>
						<button class="benjamin" id="btn_im_a_model"><?=v("im_a_model");?></button>
						<button class="benjamin" id="btn_im_looking_models"><?=v("im_looking_models");?></button>
					</center>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<script> 
		$("#mainVideo").ready( function(){ $("#videoContainer").height($("#mainVideo").height()); }); 
		$( window ).resize( function() { $("#videoContainer").height($("#mainVideo").height()); });
		$("#btn_im_a_model").click(function(){
			window.location = "register.php?as=model";
		});
		$("#btn_im_looking_models").click(function(){
			window.location = "register.php?as=nomodel";
		});
	</script>
	<div class="container">
		<div class="row" id="everyone">
			<div class="col-xs-4 animated" id="everyone_models" onmouseout="this.classList.remove('fadeInLeft');">
				<div id="everyone_models_loader" class="loader"><i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i></div>
				<img class="img-responsive" src="icons/models.png">
				<span>Models</span>
			</div>
			<div class="col-xs-4 animated" id="everyone_castings" onmouseover="this.classList.add('fadeInUp');" onmouseout="this.classList.remove('fadeInUp');">
				<div id="everyone_castings_loader" class="loader"><i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i></div>
				<img class="img-responsive" src="icons/castings.png">
				<span>Castings</span>
			</div>
			<div class="col-xs-4 animated" id="everyone_agencies" onmouseover="this.classList.add('fadeInRight');" onmouseout="this.classList.remove('fadeInRight');">
				<div id="everyone_agencies_loader" class="loader"><i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i></div>
				<img class="img-responsive" src="icons/agencies.png">
				<span>Agencies</span>
			</div>
		</div>
	</div>
	
	<div class="col-md-12" id="everyone_preview">
		<i id="everyone_close" class="close fa fa-times"></i>
		<div class="container">
			<div id="everyone_container">
				<br><br><br><br><br>
			</div>
		</div>
	</div>
	<br>
	<script> 
		function load_everyone_area(mode){
			$("#everyone_preview").css({display:"none"});
			$("#"+mode+"_loader").css({display:"block"});			
			$.get( "ajax/"+mode+".php", function(data) {
				$("#everyone_container").html(data);
				$("#everyone_preview").fadeIn("slow").css("display", "block");
				$("#"+mode+"_loader").css({display:"none"});
			});
		}
		
		$("#everyone_close").click(function(){
			$("#everyone_preview").fadeOut("slow", function () {
				$(this).css({display:"none"});
			});
		});
		
		$("#everyone_models").click(		function() { load_everyone_area(this.id); });
		$("#everyone_models").mouseover(	function() { this.classList.add('fadeInLeft'); });
		$("#everyone_castings").click(		function() { load_everyone_area(this.id); });
		$("#everyone_castings").mouseover(	function() { this.classList.add('fadeInUp'); });
		$("#everyone_agencies").click(		function() { load_everyone_area(this.id); });
		$("#everyone_agencies").mouseover(	function() { this.classList.add('fadeInRight'); });
		
	</script>
	
	<div id="connect">
		<div class="container">
			<h3 class="header3"><?=v("connect_socially_with_us");?></h3>
			<ul>
				<li><a class="facebook" href="https://www.facebook.com/lomodel/" title="Ikuti kami di Facebook" target="_blank" rel="nofollow"><i class="fa fa-facebook"></i></a></li>
				<li><a class="twitter" href="https://twitter.com/lomodel/" title="Ikuti kami di Twitter" target="_blank" rel="nofollow"><i class="fa fa-twitter"></i></a></li>
				<li><a class="instagram" href="https://instagram.com/lomodel" title="Follow us on Instagram" target="_blank" rel="nofollow"><i class="fa fa-instagram"></i></a></li>
				<li><a class="youtube" href="https://www.youtube.com/user/lomodel/" title="Ikuti kami di YouTube" target="_blank" rel="nofollow"><i class="fa fa-youtube-play"></i></a></li>
				<li><a class="pinterest" href="https://pinterest.com/lomodel/boards/" title="Follow us on Pinterest" target="_blank" rel="nofollow"><i class="fa fa-pinterest"></i></a></li>
				<li><a class="gplus" href="https://plus.google.com/u/0/lomodel/" title="Follow us on Google+" target="_blank" rel="nofollow"><i class="fa fa-google-plus"></i></a></li>
			</ul>
		</div>
	</div>
	
<?php include_once "footer.php"; ?>