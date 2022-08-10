<div class="content mt-12">
	<div class="animated fadeIn">
		<?php ses_msg(); ?>
		<div class="row">
			<div class="col-sm-12 col-xs-12"> 
				<div class="card ">
					<div class="card-header  ">
						<h4 class="text-primary"> Employee Wise  </h4>
					</div>
					<div class="card-body ">
						<div class="card-body card-block">
							<?php	
							echo form_open("atten/salary_filter_action/"); 
							?>
							<div class="row paddset">
								<div class="col-sm-4 col-xs-12">
									<label> Enter Employee Code </label>
									<?php echo form_dropdown("emp_code", $opt, set_value('emp_code'), ['class'=>'form-control report_to'] ); ?>
								</div>
								<div class="col-sm-4 col-xs-12">
									<label> Select Date </label>
									<?php echo form_input(['name'=>'q', 'value'=>'yyyy-mm', 'class'=>'form-control atn_date', 'readonly'=>TRUE]); ?>	
								</div>
								<div class="col-sm-2 col-xs-12">
									<br /><br />
									<?php echo form_submit("Fetch Report", "Fetch Report", ['class'=>'btn btn-sm btn-primary pull-left']); ?>
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
