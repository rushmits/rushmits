	<div class="content mt-12">
	    <div class="animated fadeIn">
	        <?php ses_msg(); ?>
	        <div class="row">
	            <div class="col-sm-12 col-xs-12">
	                <div class="card master_card">
	                    <div class="card-header ">
	                        <h4 class="text-danger">Employee Offboarding </h4>
	                    </div>
	                    <div class="card-body">
	                    	<?php echo form_open("employee/off_board_action"); ?>
	                   		<div class="row paddset">
	                   			<div class="col-sm-6 col-xs-12">
	                   				<label class="text-danger"> Reason </label>
	                   				<?php 
	                   				$opt = [
	                   					'' =>"Please Select",
	                   					"Resignation"=>'Resignation',
	                   					"Terminated"=>'Terminated'
	                   				];
	                   				echo form_dropdown("left_reason", $opt, '', ['class'=>'form-control']);
	                   				echo form_error("left_reason");
	                   			
	                   				echo form_hidden("id", $emp->id);
	                   				echo form_hidden("emp_status", "of");
	                   				?>
	                   			</div>
	                   			
	                   			<div class="col-sm-6 col-xs-12">
	                   				<label class="text-danger"> Last Working Day </label>
	                   				<?php 
	                   				
	                   				echo form_input("left_lwd", '',['class'=>'form-control calender', 'readonly'=>TRUE], set_value("left_lwd"));
	                   				echo form_error("left_lwd");
	                   				?>
	                   			</div>
	                   			
	                   			<div class="col-sm-12 col-xs-12 paddbox">
	                   				<label class="text-danger"> Remarks </label> <small class="text-info">Optional</small>
	                   				<?php 
	                   				echo form_textarea("left_remarks","", ['class'=>'form-control']);
	                   				?>
	                   			</div>
	                   		</div>
	                   		<div class="row paddset">
	                   			<div class="col-sm-11 col-xs-12">
	                   				<?php echo form_submit("btn","Submit", ['class'=>'btn btn-md btn-primary pull-right'] ); ?>
	                   			</div>
	                   			<div class="col-sm-1 col-xs-12">
	                   				<?php echo anchor("employee/emp_profile/".base64_encode($emp->id), "Cancel", ['class'=>'btn btn-md btn-dark']) ?>
	                   			</div>
	                    	</div>
	                    	<?php form_close(); ?>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<?php master_footer(); ?>
