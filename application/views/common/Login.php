<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->

	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title> MyHR - Fastway Transmissions Pvt. Ltd.</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="apple-touch-icon" href="<?php echo base_url() ;?>apple-icon.html">
		<link rel="shortcut icon" href="<?php echo base_url() ;?>favicon.ico">
		<link rel="stylesheet" href="<?php echo base_url() ;?>assets/css/normalize.css">
		<link rel="stylesheet" href="<?php echo base_url() ;?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url() ;?>assets/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo base_url() ;?>assets/css/themify-icons.css">
		<link rel="stylesheet" href="<?php echo base_url() ;?>assets/css/flag-icon.min.css">
		<link rel="stylesheet" href="<?php echo base_url() ;?>assets/css/cs-skin-elastic.css">
		<link rel="stylesheet" href="<?php echo base_url() ;?>assets/scss/style.css">
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
		
		<style>
			body{
				font-family: 'Roboto', sans-serif;
			}
		</style>
	</head>
	<body class="bg-dark">
		<div class="sufee-login d-flex align-content-center flex-wrap">
		
			<div class="container">
	
				<div class="login-content">
				
					<div class="login-form">
						
						<div class="login-logo">
						
							<a href="<?php echo base_url() ;?>">
						
								<img class="align-content" src="<?php echo base_url() ;?>images/logo.png" alt="logo" width="60px;"></a>
						
							 <br />
							 <br />
						
							<h6 class="text-primary">
								Cliq HR - The Complete HR Solution
							</h6>
						</div>
						<?php echo form_open("login/login_action"); ?>
						
						<div class="form-group">
						
							<label> <i class="fa fa-user text-primary"></i> Username</label>
						
							<input type="text" class="form-control is-valid" placeholder="Type Here..." name="l_email"/>
							<?php  echo form_error('l_email') ; ?>
						</div>
						<div class="form-group">
						
							<label><i class="fa fa-key text-primary"></i> Password</label>
							<input type="password" class="form-control is-valid" placeholder="Type Here..." name="l_password"/>
							<?php  echo form_error('l_password') ; ?>
						</div>
						
						<div class="checkbox">
						
							<label>
								<input type="checkbox"> Remember Me
							</label>
							<label class="pull-right">
								<a href="<?php echo base_url() ;?>#">Forgotten Password? Contact Administrator.</a>
							</label>
						</div>
						<button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
						<br />
						<br />
						<div class="row">
						
							<div class="col-sm-12 col-xs-12"> <p class="text-center small"> © Fastway Transmissions Pvt. Ltd | All rights Reserved  2021</p> </div>
							<div class="col-sm-12 col-xs-12 text-center"> 
								<img class="align-content" src="<?php echo base_url() ;?>images/norton.png" alt="logo" width="80px;">
							</div>
						</div>
						
						<?php
						
						$feedback = $this->session->flashdata('login_msg');
						
						$feedback_class = $this->session->flashdata('login_class');
						
						if($feedback):
						
						?>
						<div class="login-wrap">
							<label class="text-center <?php echo $feedback_class ?>"><?php echo $feedback ?></label>
						</div>
						
						<?php endif; ?>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>
		</div>
		<script src="<?php echo base_url() ;?>assets/js/vendor/jquery-2.1.4.min.js" type="1854315db07448f3b02dafb3-text/javascript"></script>
		<script src="<?php echo base_url() ;?>assets/js/popper.min.js" type="1854315db07448f3b02dafb3-text/javascript"></script>
		<script src="<?php echo base_url() ;?>assets/js/plugins.js" type="1854315db07448f3b02dafb3-text/javascript"></script>
		<script src="<?php echo base_url() ;?>assets/js/main.js" type="1854315db07448f3b02dafb3-text/javascript"></script>

		
		<script src="<?php echo base_url() ;?>../../../ajax.cloudflare.com/cdn-cgi/scripts/95c75768/cloudflare-static/rocket-loader.min.js" data-cf-settings="1854315db07448f3b02dafb3-|49" defer=""></script></body>

</html>
