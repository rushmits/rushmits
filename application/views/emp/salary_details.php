<div class="content mt-12">
	<div class="animated fadeIn">
		<?php ses_msg(); ?>
		<div class="row">
			<div class="col-sm-12 col-xs-12">
				<div class="card">
					<div class="card-header ">
						<h6 class="text-primary "> Payroll Processing </h6>
					</div>
					<div class="card-body">
						<?php foreach(  $payroll as $p ): ?>
						<div class="col-sm-4 col-xs-12">
							<div class="card">
								<div class="p-0 clearfix">
									<i class="fa fa-<?php echo $p['fa_class'] ?> bg-<?php echo $p['bg_class'] ?> p-4 font-2x2 mr-3 float-left text-light"></i>
									<div class="h5 text-primary mb-0 pt-3"> <?php echo $p['heading'] ?> </div>
									<span class="badge bg-flat badge-<?php echo $p['bg_class'] ?>  text-whit	e"> <?php echo $p['status'] ?>  </span>
								</div>
							</div>
						</div>	
						<?php  endforeach; ?>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-6 col-xs-12">
						<div class="card">
							<div class="card-header ">
								<h6 class="text-primary"> Employee Profile </h6>
							</div>
							<div class="card-body">
								<ul class="list-group list-group-item-heading">
									<li class="list-group-item"> Name
									<span class="pull-right text-danger"> <?php echo $emp->emp_name ?>  </span>
									</li>
									<li class="list-group-item"> Employee Code
									<span class="pull-right text-danger"> <?php echo $emp->emp_code ?>  </span>
									</li>
									<li class="list-group-item "> Payroll Month
									<?php
									$param     = $this->session->userdata('sal_filter');
									?>
									<span class="pull-right text-primary font-weight-bold "> <?php echo  date( "M, Y" ,strtotime( $param['atn_date'] )) ; ?>  </span>
									</li>
								</ul>
							</div>
						</div>
					</div>
					
					<?php if( isset( $salary ) ): ?>
					
					<div class="col-sm-6 col-xs-12">
						<div class="card">
							<div class="card-header">
								<h6 class="text-primary"> Calculation </h6>
							</div>
							<div class="card-body">
								<ul class="list-group list-group-item-heading">
									<li class="list-group-item"> Calculating on
									<span class="pull-right text-primary"> <?php echo $salary['days_in_month'] ?> Days  </span>
									</li>
									<li class="list-group-item"> Working
									<span class="pull-right text-primary font-weight-bold"> <?php echo $salary['working_days'] ?> Days  </span>
									</li>
									<li class="list-group-item"> Deduction / Absent
									<span class="pull-right text-danger font-weight-bold"> <?php echo $salary['absent'] ?> Days  </span>
									</li>
									<li class="list-group-item"> Total Payable
									<span class="pull-right text-primary"> <?php echo $salary['total_working_days'] ?> Days   </span>
									</li>

									</li>
									<li class="list-group-item"> Net Payable Amount
									<span class="pull-right text-success font-weight-bold"> INR. <?php echo  " ".$salary['amount'] ?>    </span>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<?php endif; ?>

				<!-- Card Closed -->
				
				<?php if( isset( $sunday )  ): ?>
				<div class="card">
					<div class="card-header">
						<h6 class="text-primary "> Missed Punch Management</h6>
					</div>
					<div class="card-body">
						<?php
						if (  count($sunday) > 0  ) { ?>
						<?php echo form_open("atten/add_missing_days"); ?>
						<div class="row paddset">
							<?php
							//echo $cal;
							foreach ( $sunday as $s ) {
								$off = date("l", strtotime($s));

								if ( $off == "Sunday" ) {
									$off = "<span class='badge badge-success'> $off </span>";
								} else {
									$off = "<strong class='text-primary'> $off </strong>";
								}

								$label = "<div class='col-sm-4 col-xs-6 paddset'>";
								$label .= "<span class='atn_span'>". date("Y-m-d", strtotime($s))." <br>".$off."</span>";
								$label .= form_hidden( "missed_days[]", date("Y-m-d", strtotime($s)) );

								$label .= form_dropdown("hr_atten_config_id[]", $hr_config, 4, ['class'=> '', 'required'=>TRUE] ) ;
								$label .= "</div>";
								echo $label;
							}
							?>
						</div>
						<div class="row">
							<div class="col-sm-12 col-xs-12">
								<button class="btn btn-sm btn-primary pull-right"> Save </button>
							</div>
						</div>
						<?php echo form_close(); ?>
						<?php 
						} 
						else {
						?>

						<div class="row">
							<div class="col-sm-12 col-xs-12">
								<?php echo anchor("atten/clear_hr_atn_logs/$emp->emp_code/$param[atn_date]", "Clear Logs & sattle again", ['class'=>'btn btn-sm btn-danger'] ); ?>
							</div>
						</div>
						<?php
						}
						?>
					</div>
				</div>
				<?php endif; ?>
				
				<?php if ( isset( $sunday )  ) : ?>
				<div class="card">
					<div class="card-header">
						<h6 class="text-primary pull-left"> Attendance Report
						</h6>
						<h6 class="text-primary pull-right">

						</h6>
					</div>
					<div class="card-body">
						<?php echo $table; ?>
					</div>
				</div>
				<?php endif; ?>
				
			</div>
		</div>
	</div>
</div>
<?php master_footer(); ?>