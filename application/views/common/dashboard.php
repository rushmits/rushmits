<div class="content mt-12">
	<div class="animated fadeIn">
		<?php ses_msg();?>
		<div class="row">
			<div class="col-sm-12 col-xs-12">
				<div class="card">
					<div class="card-header">
						<h3  class="text-primary">
							Dashboard
						</h3>
					</div>
					<div class="card-body card-block">
						<div class="row paddset">
							<?php
							foreach( $icons as $i ):  ?>
							<div class="col-sm-3 col-xs-12">
								<div class="card">
									<div class="card-body">
										<div class="stat-widget-one">
											<div class="stat-icon dib">
												<i class="<?php echo $i['fa_class'] ?>">
												</i>
											</div>
											<div class="stat-content dib">
												<div class="stat-text">
													<?php echo $i['heading'] ?>
												</div>
												<div class="stat-digit">
													<?php echo $i['count'] ?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php  endforeach ?>
						</div>
						<div class="row">
							<?php
							foreach( $boxes as $b ): ?>
							<div class="col-sm-3 col-xs-12 dash_box">
								<div class="card <?php echo $b['box_color_class'] ?> text-light">
									<div class="card-body card-block">
										<h3>
											<?php echo $b['heading'] ?>
										</h3>
										<h6>
											<?php echo $b['content'] ?>
										</h6>
									</div>
									<div class="card-header">
										<?php echo $b['page_link'] ?>
									</div>
								</div>
							</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php master_footer(); ?>