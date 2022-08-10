	<div class="content mt-12">
	    <div class="animated fadeIn">
	        <?php ses_msg(); ?>
	        <div class="row">
	            <div class="col-sm-12 col-xs-12">
	                <div class="card master_card">
	                    <div class="card-header ">
	                        <h4 class="text-primary">Update Employee Family Details </h4>
	                    </div>
	                    <div class="card-body">
	                    	<?php echo form_open("employee/update_emp_family_action"); ?>
	                   		<div class="row paddset">
	                   			<div class="col-sm-6 col-xs-12">
	                   				<label> Father Name </label>
	                   				<?php 
	                   				echo form_input( ['name'=>'father_name',  'class'=>'form-control', 'value'=>$emp->father_name] ); 
	                   				echo form_error("father_name");
	                   				?>
	                   			</div>
	                   			<div class="col-sm-6 col-xs-12 paddset">
	                   				<label> Mother Name </label>
	                   				<?php 
	                   				echo form_input( ['name'=>'mother_name',  'class'=>'form-control', 'value'=>$emp->mother_name] ); 
	                   				echo  form_error("mother_name");
	                   				echo form_hidden("emp_id", $emp->emp_id);
	                   				?>
	                   			</div>
	                   		</div>
	                   		
	                   		<div class="row paddset">
	                   			<div class="col-sm-4 col-xs-12 paddset">
	                   				<label> Spouse </label>
	                   				<?php 
	                   				$opt = [
	                   					'' => "Please Select",
	                   					'Husband' => "Husband",
	                   					'Wife' => "Wife",
	                   				];
	                   				echo form_dropdown("spouse", $opt, $emp->spouse, ['class'=>'form-control'] );
	                   				?>
	                   			</div>
	                   			<div class="col-sm-4 col-xs-12">
	                   				<label> Spouse Name </label>
	                   				<?php 
	                   				echo form_input( ['name'=>'spouse_name',  'class'=>'form-control',  'value'=>$emp->spouse_name] ); 
	                   				echo form_error("spouse_name");
	                   				?>
	                   				
	                   			</div>
	                   			<div class="col-sm-4 col-xs-12">
	                   				<label> Spouse Age </label>
	                   				<?php 
	                   				echo form_input( ['name'=>'spouse_age',  'class'=>'form-control', 'value'=>$emp->spouse_age] ); 
	                   				?>
	                   				
	                   			</div>
	                   		</div>
	                   		
	                   		<div class="row paddset">
	                   			<div class="col-sm-6 col-xs-12">
	                   				<label> Child 1 Name </label>
	                   				<?php 
	                   				echo form_input( ['name'=>'child_1_name',  'class'=>'form-control', 'value'=>$emp->child_1_name] ); 
	                   				?>
	                   			</div>
	                   			<div class="col-sm-6 col-xs-12 paddset">
	                   				<label> Child 1 Age </label>
	                   				<?php 
	                   				echo form_input( ['name'=>'child_1_age',  'class'=>'form-control', 'value'=>$emp->child_1_age] ); 
	                   				?>
	                   			</div>
	                   		</div>
	                   		
	                   		<div class="row paddset">
	                   			<div class="col-sm-6 col-xs-12">
	                   				<label> Child 2 Name </label>
	                   				<?php 
	                   				echo form_input( ['name'=>'child_2_name',  'class'=>'form-control', 'value'=>$emp->child_2_name ] ); 
	                   				?>
	                   			</div>
	                   			<div class="col-sm-6 col-xs-12 paddset">
	                   				<label> Child 2 Age </label>
	                   				<?php 
	                   				echo form_input( ['name'=>'child_2_age',  'class'=>'form-control', 'value'=>$emp->child_2_age	] ); 
	                   				?>
	                   			</div>
	                   		</div>
	                   		
	                   		<div class="row paddset">
	                   			<div class="col-sm-11 col-xs-12">
	                   				<?php echo form_submit("btn","Update Family Details", ['class'=>'btn btn-md btn-primary pull-right'] ); ?>
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
	</div>
	<?php master_footer(); ?>
