<div class="content mt-12">
	<div class="animated fadeIn">
		<?php ses_msg(); ?>
		<div class="row">
			<div class="col-sm-12 col-xs-12"> 
				<div class="card master_card">
					<div class="card-header  ">
						<h4 class="text-primary"> Create Salary Slip  </h4>
					</div>
					<div class="card-body ">
						<div class="card-body card-block">
							<?php	
							echo form_open("Atten_sal_slip/create_pdf"); 
							?>
							<div class="row paddset">
								<div class="col-sm-4 col-xs-12">
									<label> Enter Employee Code </label>
									<?php echo form_input( ['name'=>'emp_code', 'value'=>'', 'class'=>'form-control '] ); ?>
								</div>
								<div class="col-sm-4 col-xs-12">
									<label> Select Date </label>
									<?php echo form_input(['name'=>'q', 'value'=>'yyyy-mm', 'class'=>'form-control atn_date', 'readonly'=>TRUE]); ?>	
								</div>
							</div>
							<div class="row">
								<div class="col-sm-8 col-xs-12">
									<?php echo form_submit("Fetch Report", "Fetch Report", ['class'=>'btn btn-md btn-primary pull-right']); ?>
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
</div>
<?php master_footer(); ?>
