<?php include_once "homepage_header.php"; ?>
<?php include_once "main_container.php"; ?>
	<script>
		$(document).ready(function(){
			$('[data-toggle="popover"]').popover({
				trigger : 'hover',
				html : true
			});
		});
	</script>
	<style>
		.tbl_detail td{
			padding-right:30px;
			text-align:center;
		}
	</style>
	<div class="row">
		<?php 
			$model_profile = $db->fetch_all_data("model_profiles",[],"user_id='".$_GET["user_id"]."'")[0];
			$model = $db->fetch_all_data("model_files",[],"user_id='".$_GET["user_id"]."'")[0];
		?>
		
		<div class="container">
			<h1 class="well"><?=$model_profile["first_name"];?> <?=$model_profile["middle_name"];?> <?=$model_profile["last_name"];?> </h1>
		</div>
		<div class="col-sm-4 fadeInRight animated">
			<img height="400" src="user_images/<?=$model["filename"];?>">
		</div>
		
		<div class="col-sm-8 fadeInRight animated">
			<div class="container">
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#profile">Profile</a></li>
					<li><a data-toggle="tab" href="#work">Work</a></li>
					<li><a data-toggle="tab" href="#clients">Clients</a></li>
					<?php if($__role == "2" || $__role == "3" || $__role == "4" || true) { ?>
						<li><a data-toggle="tab" href="#booking">Booking</a></li>
					<?php } ?>
				</ul>
				<div class="tab-content">
					<div id="profile" class="tab-pane fade in active">
						<h3>Nationality : <b><?=$db->fetch_single_data("nationalities","name",["id" => $model_profile["nationality_id"]]);?></b></h3>
						<div style="width:590px;border-top:1px solid #888;"></div>
							<table class="tbl_detail">
								<tr><td>Hair</td><td>Eyes</td><td>Height<br>(cm)</td><td>Bust<br>(cm)</td><td>Waist<br>(cm)</td><td>Hips<br>(cm)</td><td>Shoe<br>(us)</td></tr>
								<tr><td style="height:10px;"></td></tr>
								<tr style="font-weight:bolder;">
									<td><?=$db->fetch_single_data("hair_colors","name",["id" => $model_profile["hair_color_id"]]);?></td>
									<td><?=$db->fetch_single_data("eye_colors","name",["id" => $model_profile["eye_colors_id"]]);?></td>
									<td><?=$model_profile["height"];?></td>
									<td><?=$model_profile["bust"];?></td>
									<td><?=$model_profile["waist"];?></td>
									<td><?=$model_profile["hips"];?></td>
									<td><?=$model_profile["shoe"];?></td>
								</tr>
							</table>
						<div style="width:590px;border-top:1px solid #888;"></div>
						
					</div>
					<div id="work" class="tab-pane fade" style="width:590px;margin-top:10px">
						<?php 
							$work_categories = $db->fetch_select_data("work_categories","id","name"); 
							$work_categories[""] = "- All Categories -";
						?>
						<?=$f->select("sel_work_categories",$work_categories,null,"","form-control");?>
						<div style="width:590px;border-top:1px solid #888;margin-top:10px"></div>
						<?php
							$popover_content = "<div style='min-width:200px;'><img src='https://www.w3schools.com/bootstrap/img_avatar3.png'><br>Picture Credits:<br>Photographer: Pierre-Ange Carlotti<br>Model: Bella Hadid<br>Other Work Credits:<br>Model: Anwar Hadid<br>Model: Melodie Vaxelaire</div>";
						?>
						<div>
							<table>
								<tr>
									<td>									
										<div class="col-sm-4" data-toggle="popover" data-trigger="hover" data-content="<?=$popover_content;?>">
											<img style="margin-top:10px" src="https://www.w3schools.com/bootstrap/img_avatar3.png" width="100">
										</div>
										<div class="col-sm-8" data-toggle="popover" data-trigger="hover" data-content="<?=$popover_content;?>">
												Zadig &amp; Voltaire F/W 2017
											<div>Zadig &amp; Voltaire (Advertising)</div>
											<div>season: Fall/Winter 2017</div>
											<div>photographer: Pierre-Ange Carlotti</div>
										</div>
									</td>
								</tr>
								<tr>
									<td>									
										<div class="col-sm-4" data-toggle="popover" data-trigger="hover" data-content="<?=$popover_content;?>">
											<img style="margin-top:10px" src="https://www.w3schools.com/bootstrap/img_avatar3.png" width="100">
										</div>
										<div class="col-sm-8" data-toggle="popover" data-trigger="hover" data-content="<?=$popover_content;?>">
											<a href="#">Zadig &amp; Voltaire F/W 2017</a>
											<div>Zadig &amp; Voltaire (Advertising)</div>
											<div>season: Fall/Winter 2017</div>
											<div>photographer: Pierre-Ange Carlotti</div>
										</div>
									</td>
								</tr>
							</table>
						</div>
					</div>
					<div id="clients" class="tab-pane fade">
						<h3>Clients</h3>
						<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
					</div>
					<div id="booking" class="tab-pane fade">
						<h3>Booking Proposal</h3>
						<div class="col-lg-7 well">
							<?php if($__role == 2 || $__role == 3 || $__role == 4){ ?>
								<form role="form" action="model_booking.php?user_id=<?=$_GET["user_id"];?>" method="POST" autocomplete="off">
									<div class="form-group">
										<label>Job Description</label>
										<?=$f->textarea("description",$_POST["description"],"cols='75' rows='5'","form-control");?><br>
										
										<label>Casting At</label>
										<div class="col-md-12">
											<table cellpadding="0" cellspacing="0">
												<tr>
													<td><?=$f->input("casting_start",$_POST["casting_start"],"type='date'","form-control");?></td>
													<td>&nbsp;to&nbsp;</td>
													<td><?=$f->input("casting_end",$_POST["casting_end"],"type='date'","form-control");?></td>
												</tr>
											</table>
											<br>
										</div>
										
										<label>Casting Address</label>
										<?=$f->textarea("casting_address",$_POST["casting_address"],"cols='75' rows='5'","form-control");?><br>
										
										<label>Casting Location</label>
										<?=$f->select("casting_location",$db->fetch_select_data("locations","id","name_".$__locale,["province_id" => "0:>"],["name_".$__locale]),$_POST["casting_location"],"","form-control");?><br>
										
										<label>Fee (Rp)</label>
										<?=$f->input("fee",$_POST["fee"],"type='number' step='1'","form-control");?><br>
										<?=$f->input("booking","Booking","type='submit' style='width:100%;'","btn btn-lg btn-info");?>
									</div>
								</form>
							<?php } else { ?>
								<label style="color:red;">Anda harus terdaftar sebagai Agensi atau Corporate</label>
							<?php } ?>
						</div>
								
					</div>
				</div>
			</div>
		</div>
	</div>
	<br><br>
<?php include_once "main_container_end.php"; ?>
<?php include_once "footer.php"; ?>