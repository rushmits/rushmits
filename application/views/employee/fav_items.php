<div style="background: url(<?php echo base_url("assets") ?>/img/banner1.jpg);" class="page-header">
	<div class="container">
		<div class="row">         
			<div class="col-md-12">
				<div class="breadcrumb-wrapper">
					<h2 class="page-title">Favourite Items</h2>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-sm-3 page-sideabr">
				<?php include "side_menu.php" ; ?>
			</div>
			<div class="col-sm-9 page-content">
				<div class="inner-box">
					<div class="usearadmin">
						<h3>
							<img alt="" src="<?php echo base_url("assets") ?>/img/user.jpg" class="userimg">
							<?php echo $row->f_name ."&nbsp;&nbsp;". $row->l_name;  ?>	
						</h3>
					</div>
				</div>
				<div class="inner-box">
					<div class="panel-group" id="accordion">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title"> <a data-toggle="collapse" href="#collapseB1"> My details</a></h4>
							</div>
							<div id="collapseB1" class="panel-collapse collapse in">
								<div class="panel-body">
									<?php echo form_open("user/update_user", ['method'=>'post']); 
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
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title"> <a data-toggle="collapse" href="#collapseB2" class="collapsed" aria-expanded="false"> Settings</a></h4>
							</div>
							<div id="collapseB2" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
								<div class="panel-body">
									<?php echo form_open("user/update_user", ['method'=>'post']); ?>
									<div class="form-group">
										<div class="checkbox">
											<label><input type="checkbox"><span class="checkbox-material"><span class="check"></span></span>Comments are enabled on my ads</label>
										</div>
									</div>
									<div class="form-group is-empty">
										<label class="control-label">New Password</label>
										<input type="password" placeholder="" class="form-control">
										<span class="material-input"></span></div>
									<div class="form-group is-empty">
										<label class="control-label">Confirm Password</label>
										<input type="password" placeholder="" class="form-control">
										<span class="material-input"></span></div>
									<div class="form-group">
										<button class="btn btn-common" type="submit">Update</button>
									</div>
									<?php echo form_close() ; ?>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title"> <a data-toggle="collapse" href="#collapseB3" class="collapsed" aria-expanded="false"> Preferences</a></h4>
							</div>
							<div id="collapseB3" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
								<div class="panel-body">
									<div class="form-group">
										<div class="col-sm-12">
											<div class="checkbox">
												<label><input type="checkbox"><span class="checkbox-material"><span class="check"></span></span>I want to receive newsletter.</label>
											</div>
											<div class="checkbox">
												<label><input type="checkbox"><span class="checkbox-material"><span class="check"></span></span>I want to receive advice on buying and selling.</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>  
	</div>      
</div>