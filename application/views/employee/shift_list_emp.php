<div style="background: url(<?php echo base_url("emp_assets") ?>/img/banner1.jpg);" class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">	
				<div class="breadcrumb-wrapper">
					<h2 class="page-title"> Roster Management </h2>
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
			<div class="col-sm-9 col-xs-12 page-content">
				<div class="card">
					<div class="card-header">
						<h3> Roster Summary  </h3>
					</<div>
					<div class="card-body">
						<div class="row">
							<div class="col-sm-4 col-xs-12">
								<div class="box color-2">
									<h3 class="text-white"> Total Employees </h3>	
									<h5 class="text-white t"> <?php echo $summ['total']; ?> </h5>	
								</div>
							</div>	
							<div class="col-sm-4 col-xs-12">
								<div class="box color-6">
									<h3 class="text-white"> Roster -In </h3>
									<h5 class="text-white i"> <?php echo $summ['in']; ?> </h5>
								</div>
							</div>
							<div class="col-sm-4 col-xs-12">
								<div class="box color-5">
									<h3 class="text-white"> Roster -Out </h3>
									<h5 class="text-white o"> <?php echo $summ['out']; ?> </h5>
								</div>
							</div>		
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-body">
						<?php echo $data['content'] ?>
					</div>	
				</div>
			</div>
		</div>
	</div>
</section>
<?php emp_footer(); ?>