
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-sm-offset-4 col-md-4 col-md-offset-4">
				<div class="page-login-form box">
					<h3>
						Login
					</h3>
					<?php echo form_open("Emp_login/login_action"); ?>
						<div class="form-group is-empty">
							<div class="input-icon">
								<i class="icon fa fa-user">
								</i>
								<input type="text" id="sender-email" class="form-control" name="l_email" placeholder="Username">
								<small> <?php echo form_error("l_email"); ?> </small>
							</div>
							<span class="material-input">
							</span>
						</div> 
						<div class="form-group is-empty">
							<div class="input-icon">
								<i class="icon fa fa-unlock-alt">
								</i>
								<input type="password" class="form-control" placeholder="Password" name="l_password">
								<small> <?php echo form_error("l_password"); ?> </small>
							</div>
							<span class="material-input">
							</span>
						</div>                  
						<div class="checkbox">
							<input type="checkbox" id="remember" name="rememberme" value="forever" style="float: left;">
							<label for="remember">
								Remember me
							</label>
						</div>
						<button class="btn btn-common log-btn">
							Submit
						</button>
					<?php echo form_close(); ?>
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
					
					<ul class="form-links">
						<li class="pull-left">
							<a href="signup.html">
								Don't have an account?
							</a>
						</li>
						<li class="pull-right">
							<a href="forgot-password.html">
								Lost your password?
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

<?php emp_footer(); ?>