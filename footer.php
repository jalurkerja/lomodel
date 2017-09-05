	<footer>
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-3 footer-about wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
						<h3>About</h3>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
						</p>
						<p><a class="scroll-link" href="#about-us">Our Team</a></p>
					</div>
					<div class="col-sm-4 col-sm-offset-1 footer-contact wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">
						<h3>Contact</h3>
						<p><i class="fa fa-map-marker"></i> consectetur adipiscing 10, 10136 eiusmod tempor</p>
						<p><i class="fa fa-phone"></i> Phone: (0039) 333 12 xx xxx</p>
						<p><i class="fa fa-envelope"></i> Email: <a href="mailto:hello@domain.com">hello@domain.com</a></p>
						<p><i class="fa fa-skype"></i> Skype: eiusmod</p>
					</div>
					<div class="col-sm-4 footer-links wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
						<div class="row">
							<div class="col-sm-12">
								<h3>Links</h3>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<p><a class="scroll-link" href="#top-content">Home</a></p>
								<p><a class="scroll-link" href="#features">Features</a></p>
								<p><a class="scroll-link" href="#video">How it works</a></p>
								<p><a class="scroll-link" href="#testimonials">Our clients</a></p>
							</div>
							<div class="col-sm-6">
								<p><a class="scroll-link" href="#pricing">Plans &amp; pricing</a></p>
								<p><a href="#">Affiliates</a></p>
								<p><a class="launch-modal" href="#" data-modal-id="modal-terms">Terms</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<script>
		<?php if(isset($_POST["login_is_success"])){ ?> toastr.success('Login Success');<?php  } ?>
		<?php if(isset($_POST["login_action"]) && !$_login_action){ ?> toastr.warning('Login Failed');<?php  } ?>
	</script>
</body>
</html>