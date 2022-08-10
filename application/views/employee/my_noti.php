<div style="background: url(<?php echo base_url("assets") ?>/img/banner1.jpg);" class="page-header">
	<div class="container">
		<div class="row">         
			<div class="col-md-12">
				<div class="breadcrumb-wrapper">
					<h2 class="page-title">My Notification</h2>
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
				<div class="col-sm-12 page-content">
					<div class="inner-box">              
						<div class="table-responsive">
							<table class="table  table-hover ">
								<thead>
									<tr>
										<th><i class="fa fa-bell "></i> Notifications</th>
									</tr>
								</thead>
								<?php foreach( $noti as $n ): ?>
									<tr>
										<td> 
											<?php echo $n->name ?> 
											<p class="text-right"> <i class="fa fa-clock-o"></i> <?php echo date("d-M-Y, h:i:A", strtotime($n->added)) ;?> </p>
										</td>
									</tr>
								<?php  endforeach; ?>
							</table> 
							<?php echo $this->pagination->create_links(); ?>	
						</div>               
					</div>
				</div>
			</div>
		</div>  
	</div>      
</section>