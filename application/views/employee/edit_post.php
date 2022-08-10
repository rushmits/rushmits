<div style="background: url(<?php echo base_url("assets") ?>/img/banner1.jpg);" class="page-header">
	<div class="container">
		<div class="row">         
			<div class="col-md-12">
				<div class="breadcrumb-wrapper">
					<h2 class="page-title">Edit Post</h2>
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
					<?php
					$feedback       = $this->session->flashdata('feedback');
					$feedback_class = $this->session->flashdata('feedback_class');
					if($feedback):
					?>
					<div class="alert alert-dismissible <?php echo $feedback_class ?>"><?php echo $feedback ?></div>
					<?php endif; ?>
					<div class="inner-box"
						<div class="panel-body">
							<?php 
							echo form_open("user/upload_image", ['method'=>'post', 
									'id'=>'uploadForm', 'class'=>'form-horizontal']);?>	
							<div class="form-group ">
								<label class="col-sm-3 col-xs-12 control-label"> Add Image</label>
							</div>
							<div class="form-group ">
								<div class="col-sm-5 col-xs-12">
									<input name="post_image" id="userImage" type="file" 
									class="demoInputBox" accept=".jpg,.jpeg,.gif,.png" required="true"/>
								</div>
								<div class="col-sm-4 col-xs-12">
									<div class="row">
										<div class="col-sm-6 col-xs-12">
											<button type="submit" id="btnSubmit" 
										class="btn btn-success btn-sm"><i class="fa fa-upload"></i>  Upload</button>
										</div>	
									</div>
								</div>
								<div class="col-sm-2 col-xs-12 text-info">
								</div>
							</div>
							<div class="form-group ">
								<input type="hidden" id="targetLayer"/>
								
								<div class="col-xs-12 upload_error">
									<div id="progress-div"><div id="progress-bar"></div></div>
									<?php 
									if(isset($images)){
																										
										foreach($images as $key=>$all ){
											$src = base_url() . "upload/post_images/".$all->name;
											$img = "<div class='col-sm-3 col-xs-12 '> <div class='img_heght box'>";
											$img.=  "<img src ='$src'/>";
											$img .= anchor("user_action/del_image?key=$all->id&refer=upload/post_images/$all->name&post_id=$data->id", "<i class='fa fa-trash'> </i>");
											$img.= "</div> </div>";
											echo $img;
										}
									} 
												
									?>
											
											
								</div>
							</div>
							<?php echo form_close() ; ?>	
							<?php
							echo form_open("user_action/update_post", ['class'=>'form-horizontal'] );
							?>

							<div class="form-group">
								<label class="col-sm-12 col-xs-12 control-label"> Title</label>
								<div class="col-sm-12 col-xs-12">
									<?php echo form_input( ['name'=>'title', 'class'=>'form-control', 'value'=>$data->post_title],
										set_value('title')); ?>
									<?php echo form_error('title'); ?>
									<?php echo form_hidden( "id", $data->id); ?>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-12 col-xs-12 control-label"> Description</label>
								<div class="col-sm-12 col-xs-12">
									<?php echo form_textarea( ['name'=>'descrip', 'class'=>'form-control tiny', 'row'=> '20', 'value'=>$data->post_descrip],
										set_value('descrip')); ?>
									<?php echo form_error('descrip'); ?>
								</div>
							</div>
								
							<div class="form-group">
								<div class="col-sm-4 col-xs-12"> 
									<div class="row">
										<label class="col-sm-12 col-xs-12 control-label"> Pincode</label>
										<div class="col-sm-12 col-xs-12 ">
											<select class="location form-control" name="location_id" style="width:250px" name="itemName" 
								id="<?php echo base_url('public_action/loc') ;?>" data-tab="<?php echo base_url('public_action/loc_data') ;?>">
												
												<option selected="<?php echo $location->id ?>" value="1"> <?php echo $location->name ?></option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-sm-4 col-xs-12"> 
									<label class="col-sm-12 col-xs-12 control-label"> District</label>
									<div class="col-sm-12 col-xs-12 ">
										<select class="form-control loc_dist" disabled="true">
											<option selected="true">Not Seletced </option>
										</select>
									</div>
								</div>
								<div class="col-sm-4 col-xs-12">
									<label class="col-sm-12 col-xs-12 control-label"> State</label>
									<div class="col-sm-12 col-xs-12 ">
										<select class="form-control loc_state" disabled="true">
											<option selected="true" >Not Seletced </option>
										</select>
									</div>
								</div>
							</div>
						
							<div class="form-group">
								<label class="col-sm-12 col-xs-12 control-label"> Address</label>
								<div class="col-sm-12 col-xs-12">
									<?php echo form_input( ['name'=>'address', 'class'=>'form-control', 'value'=>$data->post_address],
										set_value('address')); ?>
									<?php echo form_error('address'); ?>
								</div>
							</div>						

							<div class="form-group">
								<label class="col-sm-12 col-xs-12 control-label"> Phone</label>
								<div class="col-sm-12 col-xs-12">
									<?php echo form_input( ['name'=>'phone', 'class'=>'form-control', 'value'=>$data->post_phone],
										set_value('phone')); ?>
									<?php echo form_error('phone'); ?>
								</div>
							</div>
						
							<div class="form-group">
								<label class="col-sm-12 col-xs-12 control-label"> Email</label>
								<div class="col-sm-12 col-xs-12">
									<?php echo form_input( ['name'=>'email', 'class'=>'form-control', 'value'=>$data->post_email],
										set_value('email')); ?>
									<?php echo form_error('email'); ?>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-12 col-xs-12 control-label"> Website</label>
								<div class="col-sm-12 col-xs-12">
									<?php echo form_input( ['name'=>'website', 'class'=>'form-control', 'value'=>$data->post_website],
										set_value('website')); ?>
									<?php echo form_error('website'); ?>
								</div>
							</div>
						
						
						
						
							<div class="form-group">
								<label class="col-sm-12 col-xs-12 control-label">  Category</label>
								<div class="col-sm-12 col-xs-12">
									<?php
									foreach( $catagory as $key=>$location ){
										$options[ base_url("user/get_subcats/").$location->id] = $location->name;
									}
									echo form_dropdown('catagory_id', $options, $data->catagory_id, [
											'class'=>' form-control cats',
										]);
									echo form_error('catagory_id');
									?>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-12 col-xs-12 control-label">  Sub Category</label>
								<div class="col-sm-12 col-xs-12">
									<?php
								
									$options = [
										''=>'Please Select'
									];
									foreach( $sub_catagory as $key=>$location ){
										$options[$location->id] = $location->name;
									}
									echo form_dropdown('sub_catagory_id', $options, $data->sub_catagory_id, [
											'class'=>' form-control sub_cat',
										]);
									echo form_error('sub_catagory_id');
									?>
								</div>
							</div>

								
								

							<div class="form-group">
								<div class="col-xs-12">
									<button type="submit" class="btn btn-primary pull-right">Submit</button>
								</div>
							</div>

							<?php
							echo form_close();
							?>
						</div>
					</div>
				</div>
			</div>
		</div>  
	</div>      
</section>