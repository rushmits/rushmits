	<div class="content mt-12">
	    <div class="animated fadeIn">
	        <?php ses_msg(); ?>
	        <div class="row">
	            <div class="col-sm-12 col-xs-12">
	                <div class="card master_card">
	                    <div class="card-header ">
	                        <h4 class="text-primary">Employee Onboarding </h4>
	                    </div>
	                    <div class="card-body">
	                    	<?php echo form_open("employee/on_board_action"); ?>
	                   		<div class="row paddset">
	                   			<div class="col-sm-12 col-xs-12 card paddbox">
	                   				<h5 class="text-dark"> Say Welcome to <span class="text-primary"> <?php echo $emp->emp_name ;?> </span> at <?php echo $emp->comp_name ;?></h5>
	                   			</div>
	                   		</div>
	                   		
	                   		<div class="row paddset">
	                   			<div class="col-sm-11 col-xs-12">
	                   				<?php 
	                   				echo anchor("employee/on_board_action/".
	                   				base64_encode($emp->id), "Submit", ['class'=>'btn btn-md btn-primary pull-right']) ?>
	                   			</div>
	                   			<div class="col-sm-1 col-xs-12">
	                   				<?php 
	                   				echo anchor("employee/emp_profile/".
	                   				base64_encode($emp->id), "Cancel", ['class'=>'btn btn-md btn-dark']) ?>
	                   			</div>
	                   			
	                   		</div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<?php master_footer(); ?>
