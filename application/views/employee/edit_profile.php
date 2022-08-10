<div style="background: url(<?php echo base_url("assets") ?>/img/banner1.jpg);" class="page-header">
	<div class="container">
		<div class="row">         
			<div class="col-md-12">
				<div class="breadcrumb-wrapper">
					<h2 class="page-title">Edit Profile</h2>
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
								<?php echo form_open("user/update_user", ['method'=>'post']); 
								?>
								
								<div class="form-group is-empty">
									<label class="control-label"> Company </label>
									<?php
									echo form_input( ['name'=>'company', 'class'=>'form-control', 'value'=>$row->company] 
										,set_value('company'));
									echo form_error('company');
								?>
										
								<div class="form-group is-empty">
									<label class="control-label">First Name</label>
									<?php
									echo form_input( ['name'=>'f_name', 'class'=>'form-control', 'value'=>$row->f_name] 
										,set_value('f_name'));
									echo form_hidden('refer', $row->id);
									echo form_error('f_name');
								?>
									
									<span class="material-input"></span>
								</div>
								<div class="form-group is-empty">
									<label class="control-label">Last name</label>
									<?php
									echo form_input( ['name'=>'l_name', 'class'=>'form-control', 'value'=>$row->l_name] 
										,set_value('l_name'));
									echo form_error('l_name');
									?>
											
									<span class="material-input"></span>
								</div>
								<div class="form-group is-empty">
									<label class="control-label">Email</label>
									<?php
									echo form_input( ['name'=>'email', 'class'=>'form-control', 'value'=>$row->email] 
										,set_value('email'));
									echo form_error('email');
									?>
											
									<span class="material-input"></span>
								</div>
								<div class="form-group is-empty">
									<label class="control-label" for="Phone">Phone</label>
									<?php
									echo form_input( ['name'=>'phone', 'class'=>'form-control', 'value'=>$row->phone] 
										,set_value('phone'));
									echo form_error('phone');
									?>
											
									<span class="material-input"></span>
								</div>
								<div class="form-group">
									<button class="btn btn-common" type="submit">Update</button>
								</div>
								<?php echo form_close() ; ?>
							</div>
					</div>
				</div>
			</div>
		</div>  
	</div>      
</section>