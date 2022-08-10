<div style="background: url(<?php echo base_url("assets") ?>/img/banner1.jpg);" class="page-header">
	<div class="container">
		<div class="row">         
			<div class="col-md-12">
				<div class="breadcrumb-wrapper">
					<h2 class="page-title">Change Password</h2>
				</div>
			</div>
		</div>
	</div>
</div>
<section class="main">
	<div class="container">
		<div class="row">
			<div class="col-sm-3 page-sideabr">
				<?php include "side_menu.php" ; ?>
			</div>
			<div class="col-sm-9 page-content">
				<div class="box">
					<div class="inner-box">
						<div class="panel-body">
							<?php echo form_open("user/change_pass_action", ['method'=>'post', 'id'=>'change_pass']); ?>
									
							<div class="form-group is-empty">
								<label class="control-label">New Password</label>
								<?php 
								echo form_password( ['name'=>'new_pass', 'class'=>'form-control']);
								echo form_error('new_pass');
								echo form_hidden('refer', $row->id);
										
								?>
								<span class="material-input"></span></div>
							<div class="form-group is-empty">
								<label class="control-label">Confirm Password</label>
								<?php
								echo form_password( ['name'=>'con_pass', 'class'=>'form-control']);
								echo form_error('con_pass');
										
								?>	
								<span class="material-input"></span></div>
							<div class="form-group">
								<button class="btn btn-common change_pass_btn" type="submit">Update</button>
							</div>
							<?php echo form_close() ; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>  
</section>