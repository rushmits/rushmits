<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta name="author" content="Team Trendy Ludhiana">
	<title>Employee Care | Fastway Transmissions Pvt. Ltd </title>
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/themes/default.rtl.min.css"/>
	<?php
	meta_tags( $this->uri->segment(2));
	echo link_tag('emp_assets/css/alertify.min.css');
	echo link_tag('emp_assets/css/bootstrap.min.css'); 
	//echo link_tag('emp_assets/css/jasny-bootstrap.min.css'); 
	echo link_tag('emp_assets/css/material-kit.css'); 
	echo link_tag('emp_assets/css/venobox.css');
	echo link_tag('emp_assets/css/font-awesome.min.css'); 
	echo link_tag('emp_assets/fonts/line-icons/line-icons.css'); 
	echo link_tag('emp_assets/css/main.css'); 
	echo link_tag('emp_assets/extras/animate.css'); 
	echo link_tag('emp_assets/extras/owl.carousel.css'); 
	echo link_tag('emp_assets/extras/owl.theme.css'); 
	echo link_tag('emp_assets/css/responsive.css'); 
	echo link_tag('emp_assets/css/slicknav.css'); 
	//echo link_tag('emp_assets/css/bootstrap-select.min.css');
	
	echo link_tag('emp_assets/css/jquery-ui.css');
	echo link_tag('emp_assets/css/starrr.css');
	echo link_tag('emp_assets/css/hover-min.css');
	echo link_tag('emp_assets/css/select2.min.css');
	echo link_tag('emp_assets/css/trendy.css');
	echo link_tag('emp_assets/css/bootstrap-select.min.css');
	?>    
	<script  src="<?php echo base_url('emp_assets/js/jquery-min.js') ?>"> </script> 
</head>
<body>
<!--<div class="loader">
	<img src="<?php echo base_url('emp_assets/img/loader.gif') ?>"/>
</div>-->
<?php include "modal.php" ?>
<div class="top_bar">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-xs-6"> 
				<h5 class="E"> Employee Self Care Portal </h5>
			</div>			
			<div class="col-sm-6 col-xs-6 ">
				<ul class="list-inline  account-links  soc_top">
					<li>
						 <h5> Welcome, <?php echo "Admin" ?> </h5>
					</li>
					<li>
						 <h4 class="text-danger">  <?php echo anchor("emp_home/logout", font_awesome("fa-sign-out")) ?> </h4>
					</li>				
				</ul>
			</div>			
		</div>
	</div>
</div>
<div class="header">
	<nav class="navbar navbar-default main-navigation" role="navigation">
		<div class="container">
			<div class="row">
				<div class="col-sm-3 col-xs-12"> 
					<div class="row">
						<div class="col-sm-11 col-xs-6"> 
							<a class=" logo" href="<?php echo base_url("home"); ?>">
							<img src="<?php echo base_url() ?>/images/logo.png" alt="logo" class="logo" style="width: 70px; float: left;">
						</a>
						</div>	
						<div class="col-sm-1 col-xs-6"> 
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>
						 </div>	
					</div>
					
				</div>
				<div class="col-sm-9 col-xs-12"> 
					<div class="collapse navbar-collapse" id="navbar">
						
					</div>
				</div>
			</div>
		</div>
	</nav>
</div>