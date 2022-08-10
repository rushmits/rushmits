 <footer>
	<section class="footer-Content">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-6 col-xs-12 wow fadeIn" data-wow-delay="0">
					<div class="widget">
						<h3 class="block-title">About us</h3>
						<div class="textwidget">
							<p>
								Trendy Ludhiana is a search engine equipped with services like business promotion etc. search your favorite place, food and other essential needs in a categorized manner.   
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12 wow fadeIn" data-wow-delay="0.5">
					<div class="widget">
						<h3 class="block-title">Useful Links</h3>
						<ul class="menu">
							<li>
								<?php echo anchor("home", "Home"); ?>
							</li>
							<li>
								<?php echo anchor("", "Services"); ?>
							</li>
							<li>
								<?php echo anchor("home/FAQ", "FAQ"); ?>
							</li>
							<li>
								<?php echo anchor("home/aboutus", "About"); ?>
							</li>
							<li>
								<?php echo anchor("home/contactus", "Contact"); ?>
							</li>
							<li>
								<?php echo anchor("home/terms_of_use", "Terms of use"); ?>
							</li>
							<li>
								<?php echo anchor("home/privacy_policy", "Privacy Policy"); ?>
							</li>
							<li>
								<?php echo anchor("home/disclaimer", "Disclaimer"); ?>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12 wow fadeIn" data-wow-delay="1s">
					<h3 class="block-title">Catagories</h3>
					<ul class="menu">
						<?php
						foreach( $menus as $key=> $menu  ):?>
						<li class="child_cat">
							<?php
							echo anchor("home/ludhiana/$key/", $key);
							?>
						</li>
						<?php  endforeach; ?>
					</ul>	
					
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12 wow fadeIn" data-wow-delay="1.5s">
					<div class="widget">
						<h3 class="block-title">Stay Connected</h3>
						<div class="bottom-social-icons social-icon "> 
							<a class="facebook" target="_blank" href="https://web.facebook.com/GrayGrids">
								<i class="fa fa-facebook"></i>
							</a> 
							<a class="twitter" target="_blank" href="https://twitter.com/GrayGrids">
								<i class="fa fa-twitter"></i>
							</a> 
							<a class="google-plus" target="_blank" href="https://plus.google.com/">
								<i class="fa fa-google-plus"></i>
							</a>
							<a class="linkedin" target="_blank" href="https://www.linkedin.com/">
								<i class="fa fa-linkedin"></i>
							</a>
							<a class="skype" target="_blank" href="https://www.linkedin.com/">
								<i class="fa fa-skype"></i>
							</a>
						</div>
						<p><i class="fa fa-envelope"></i>  Email us</p>
						<p>trendyludhiana@gmail.com</p>
					</div>
				</div>
			</div>
		</div>
		<div id="copyright">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<p>&copy All rights reserved <?php echo date("Y") ;?></p>
					</div>
				</div>
			</div>
		</div>
	</section>
</footer>
<a href="#" class="back-to-top"> 
	<i class="fa fa-angle-up"></i>
</a> 

<script  src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script> 
<script  src="<?php echo base_url('assets/js/material.min.js') ?>"></script> 
<script  src="<?php echo base_url('assets/js/material-kit.js') ?>"></script> 
<script  src="<?php echo base_url('assets/js/jquery.parallax.js') ?>"></script>
<script  src="<?php echo base_url('assets/js/owl.carousel.min.js') ?>"></script>
<script  src="<?php echo base_url('assets/js/wow.js') ?>"></script>
<script  src="<?php echo base_url('assets/js/main.js') ?>"></script> 
<script  src="<?php echo base_url('assets/js/jquery.counterup.min.js') ?>"></script>
<script  src="<?php echo base_url('assets/js/waypoints.min.js') ?>"></script> 
<script  src="<?php echo base_url('assets/js/jasny-bootstrap.min.js') ?>"></script>
<script  src="<?php echo base_url('assets/js/form-validator.min.js') ?>"></script>
<script  src="<?php echo base_url('assets/js/contact-form-script.js') ?>"></script> 
<script  src="<?php echo base_url('assets/js/jquery.themepunch.revolution.min.js') ?>"></script> 
<script  src="<?php echo base_url('assets/js/jquery.themepunch.tools.min.js') ?>"></script> 
<script src="<?php echo base_url('assets/js/bootstrap-select.min.js') ?>"></script> 
<script src="<?php echo base_url('assets/js/jquery-ui.js') ?>"></script> 
<script src="<?php echo base_url('assets/js/starrr.js') ?>"></script> 
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script src="<?php echo base_url('assets/js/upload.js') ?>"></script> 
<script src="<?php echo base_url('assets/js/venobox.min.js') ?>"></script> 
<script src="<?php echo base_url('assets/js/alertify.min.js') ?>"></script> 
<script src="<?php echo base_url('assets/js/select2.min.js') ?>"></script> 
<script src="<?php echo base_url('assets/js/trendy.js') ?>"></script> 
</body>
</html>
