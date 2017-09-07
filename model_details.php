<?php include_once "homepage_header.php"; ?>
<?php $xmain_container_attr = 'position:relative;top:-450px;'; ?>	
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
			$talent_profile = $db->fetch_all_data("talent_profiles",[],"user_id='".$_GET["id"]."'")[0];
			$model = $db->fetch_all_data("talent_files",[],"user_id='".$_GET["id"]."'")[0];
		?>
		<h1><?=$talent_profile["first_name"];?> <?=$talent_profile["middle_name"];?> <?=$talent_profile["last_name"];?> </h1>
		<div class="col-sm-4 features wow fadeInRight animated">
			<img height="400" src="user_images/<?=$model["filename"];?>">
		</div>
		
		<div class="col-sm-4 features wow fadeInRight animated">
			<div class="container">
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#profile">Profile</a></li>
					<li><a data-toggle="tab" href="#work">Work</a></li>
					<li><a data-toggle="tab" href="#clients">Clients</a></li>
					<li><a data-toggle="tab" href="#news">News</a></li>
				</ul>
				<div class="tab-content">
					<div id="profile" class="tab-pane fade in active">
						<h3>Nationality : <b><?=$db->fetch_single_data("nationalities","name",["id" => $talent_profile["nationality_id"]]);?></b></h3>
						<div style="width:590px;border-top:1px solid #888;"></div>
							<table class="tbl_detail">
								<tr><td>Hair</td><td>Eyes</td><td>Height<br>(cm)</td><td>Bust<br>(cm)</td><td>Waist<br>(cm)</td><td>Hips<br>(cm)</td><td>Shoe<br>(us)</td></tr>
								<tr><td style="height:10px;"></td></tr>
								<tr style="font-weight:bolder;">
									<td><?=$db->fetch_single_data("hair_colors","name",["id" => $talent_profile["hair_color_id"]]);?></td>
									<td><?=$db->fetch_single_data("eye_colors","name",["id" => $talent_profile["eye_colors_id"]]);?></td>
									<td><?=$talent_profile["height"];?></td>
									<td><?=$talent_profile["bust"];?></td>
									<td><?=$talent_profile["waist"];?></td>
									<td><?=$talent_profile["hips"];?></td>
									<td><?=$talent_profile["shoe"];?></td>
								</tr>
							</table>
						<div style="width:590px;border-top:1px solid #888;"></div>
						
					</div><br>
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
						<h3>Menu 2</h3>
						<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
					</div>
					<div id="news" class="tab-pane fade">
						<h3>Menu 3</h3>
						<p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php include_once "main_container_end.php"; ?>
<?php include_once "footer.php"; ?>