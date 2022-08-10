<div class="content mt-12">
	<div class="animated fadeIn">
		<?php ses_msg();?>
		<div class="row">
			<div class="col-sm-12 col-xs-12">
				<div class="card">
					<div class="card-header">
						<strong> Create Department 	</strong>
					</div>
					<div class="card-body card-block">
						<div class="card-body card-block">
							<?php echo form_open("master/create_dept_ac"); ?>
							<div class="form-group">
								<label for="company" class=" form-control-label">
									Name
								</label>
								<?php
								echo form_input("name", "", ['class'=>'form-control'], set_value('name'));
								echo form_error("name");
								?>
							</div>
							<div class="form-group text-right">
								<?php
								echo form_button(['type'=>'submit', 'content'=>'Submit', 'class'=>' btn btn-md btn-primary']);
								echo form_button(['type'=>'reset', 'content'=>'Reset', 'class'=>' btn btn-md btn-danger']); ?>
							</div>
							<?php echo form_close() ; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php master_footer(); ?>
