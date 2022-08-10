<div style="background: url(<?php echo base_url("assets") ?>/img/banner1.jpg);" class="page-header">
	<div class="container">
		<div class="row">         
			<div class="col-md-12">
				<div class="breadcrumb-wrapper">
					<h2 class="page-title">DASHBOARD</h2>
				</div>
			</div>
		</div>
	</div>
</div>
<section class="main">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-xs-12 ">
				<div class="row box">
					<div class="col-sm-3 col-xs-12"> 	
						<div class="dash color-1 "> 
							<a href="<?php echo base_url("user/my_list"); ?>">
								<h4 >  <i class="fa fa-heart "></i> Live Listings  <span class="pull-right"><?php echo $side_count['my_list_count']; ?></span> </h4> 
							</a>
						</div>
					</div>
					<div class="col-sm-3 col-xs-12 "> 
						<div class="dash color-2 "> 
							<a href="<?php echo base_url("user/pending_apr"); ?>">
								<h4> <i class="fa fa-clock-o "></i> Pending Approval <span class="pull-right"><?php echo $side_count['pending_apr_count']; ?></span> </h4> 
							</a>
						</div>
					</div>
					<div class="col-sm-3 col-xs-12 "> 
						<div class="dash color-6"> 
							<a href="<?php echo base_url("user_action/my_noti"); ?>">
							<h4> <i class="fa fa-bell "></i> Notifications  <span class="pull-right"> 
									<?php echo $noti_count['my_noti'] ?> </span></h4> 
						</div>
					</div>
					<div class="col-sm-3 col-xs-12 "> 
						<div class="dash color-5"> 
							<a href="<?php echo base_url("user"); ?>">
								<h4> <i class="fa fa-commenting-o "></i> Messages   <span class="pull-right">0</span></h4> 
							</a>
						</div>
					</div>
				</div>   
			</div>   
		</div>  
		<div class="row profile inner-box">
			<div class="col-sm-12 col-xs-12">
				<label> Company- </label>
				<span> <?php echo $row->company ; ?> </span>
			</div>
			<div class="col-sm-12 col-xs-12">
				<label> Name- </label>
				<span> <?php echo $row->f_name ." ".$row->l_name; ?> </span>
			</div>
			<div class="col-sm-12 col-xs-12">
				<label> Email -</label>
				<span> <?php echo $row->email ?> </span>
				<?php
				$email = base64_encode($row->email);
				if( empty( $row->is_verified ) ){
					$label = "<label class='label label-danger'>"; 
					$label .= "Not Verified"; 
					$label .= "</label>"; 
					$label .= " <span> <strong>"; 
					$label .=  anchor("public_action/verify_email?refer=$email", "Click Here", ['class'=>'text-info'])." to verify your email"; 
					$label .= "  </strong> </span>"; 
				}else{
					$label = "<label class='label label-success'>"; 
					$label .= "Verified"; 
					$label .= "</label>"; 
				}
				echo $label;
				?>
			</div>
			<div class="col-sm-12 col-xs-12">
				<label> Mobile -</label>
				<span>  <?php echo $row->phone ?> </span>
			</div>
			<div class="col-sm-12 col-xs-12">
				<label> Member from -</label>
				<span>  <?php echo  date("d-M-Y",  strtotime($row->added));   ?> </span>
				
				<ul class="nav nav-pills pull-right">
					<li> <?php echo anchor("user/edit_profile", "Edit pofile") ; ?>  </li>
					<li>  <?php echo anchor("user/change_pass", "Change Password") ; ?> </li>
				</ul>
			</div>
		</div>
	</div>      
</section>