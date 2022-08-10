<div style="background: url(<?php echo base_url("assets") ?>/img/banner1.jpg);" class="page-header">
	<div class="container">
		<div class="row">         
			<div class="col-md-12">
				<div class="breadcrumb-wrapper">
					<h2 class="page-title">My Listings</h2>
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
				<div class="row">
					<?php
					$feedback = $this->session->flashdata('feedback');
					$feedback_class = $this->session->flashdata('feedback_class');
					if($feedback):
					?>
					<div class="alert alert-dismissible <?php echo $feedback_class ?>">
						<h3>	<?php echo $feedback ?>  </h3>
					</div>
					<?php endif; 
					?>						
					<div class="col-xs-12 page-content">
						<?php
						$delay = "0";
						if($posts){
							foreach($posts as $post) :
							$delay+=0.05;
							?>
							<div class="row inner-box ">
								<div class="col-sm-10 col-xs-12 ">
									
									<div class="row">
										<div class="col-sm-12 col-xs-12"> 
											<h3 class="add-title title-2">
												<?php echo strtoupper( $post->post_title) ?>
											</h3>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12 col-xs-12"> 
											<label>  Reference No.  </label> 
											<span> <?php   echo "TL".rand(1,9).$post->ref_no   ?> </span>
										</div>
									</div>
									
									<div class="row">
										<div class="col-sm-12 col-xs-12"> 
											<label> Address -  </label> 
											<span> <?php echo $post->post_address   ?> </span>
										</div>
									</div>
									
									<div class="row">
										<div class="col-sm-6 col-xs-12"> 
											<label> Phone -  </label>
											<span> <?php echo $post->post_phone   ?>  </span>
										</div>
										<div class="col-sm-6 col-xs-12"> 
											<label> Email -  </label>
											<span>  <?php echo $post->post_email   ?>  </span>
										</div>
									</div>
									
									<div class="row">
										<div class="col-sm-6 col-xs-12"> 
											<label> Website -  </label>
											<span> <?php echo $post->post_website   ?> </span>
										</div>
										<div class="col-sm-6 col-xs-12"> 
											<label> Listed in -  </label>
											<span> <?php echo $post->catagory_name . " -> ". $post->sub_catagory_name ?> </span>
										</div>
									</div>
									
									<?php if(! empty($post->post_is_approved) ):  ?>
									
									<div class="row">
										<div class="col-sm-6 col-xs-12"> 
											<label>  Visible to public -</label>
											<span> 
												<?php  	
												if($post->post_is_visible == "1"){
													echo "<label class='label label-success'> <i class='fa fa-check'> </i>  Yes </label>";
												}else{
													echo "<label class='label label-warning'> <i class='fa fa-warning'> </i>
													No </label>";
												}
												?>  
											</span>
										</div>
										<div class="col-sm-6 col-xs-12">
											<ul class="list-inline">
												<li> 
													<label>  Views -</label>
													<span > <?php  	echo $post->counter;  ?>,  </span>
												</li>
												<li>  
													<label> Likes -  </label>
													<span> <?php echo check_if_empty( $post->post_likes  ) ?> </span>
												</li>
											</ul> 
	
										</div>
									</div>
									
									<?php endif ; ?>
									
									<div class="row">
										<div class="col-sm-6 col-xs-12"> 
											<label> Date -  </label>
											<span>   <?php echo custom_date_format( $post->post_added)  ?>  </span>
										</div>
									</div>
									
									
									
								</div>
								<div class="col-sm-2 col-xs-12 ">
									<div class="row">
										<h3 class="title-2">Options</h3>
										<div  class="col-xs-12">
											<p class="text-center">
												<?php
												if( $post->post_is_approved == "1"):
												echo anchor("home/MyLudhiana?refer=".$post->id, font_awesome("fa-eye")." view", 
													['class'=>'btn btn-sm btn-success']);
												endif;
												?>
											</p>
											<p class="text-center">
												<?php
												echo anchor("user_action/edit_post?refer=".$post->id, font_awesome("fa-pencil")."Edit", ['class'=>'btn btn-sm btn-info ']);
												?>
											</p>
											<p class="text-center">
												<?php
												echo anchor("user_action/move_trash?refer=".$post->id, font_awesome("fa-trash")."Delete", ['class'=>'btn btn-sm btn-danger del']);
												?>
											</p>
										</div>
									</div>
								</div>
							</div>
					
							<?php 
							endforeach;
							echo $this->pagination->create_links();
						}else{
							$div = "<div class='inner-box'>";
							$div .= "There is no Listings in your account";
							$div .="</div>";
							echo $div;
						}
						?>
					</div>
				</div>
			</div>
		</div>  
	</div>      
</section>

