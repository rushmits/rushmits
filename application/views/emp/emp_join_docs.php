	<div class="content mt-12">
	    <div class="animated fadeIn">
	        <?php ses_msg(); ?>
	        <div class="row">
	            <div class="col-sm-12 col-xs-12">
	                <div class="card master_card">
	                    <div class="card-header ">
	                        <h4 class="text-primary"> Document Upload </h4>
	                    </div>
	                    <div class="card-body">
	                    	<?php echo form_open_multipart("employee/emp_join_docs_action"); ?>
	                   		<div class="row paddset">
	                   			<div class="col-sm-4 col-xs-12">
	                   				<label> Documnet Name </label>
	                   				<?php 
	                   				echo form_input( ['name'=>'name',  'class'=>'form-control', 'placeholder'=>'Adhar Card, PAN, 10th/12th Certificate '] ); 
	                   				echo form_error('name');
	                   				?>
	                   			</div>
	                   			<div class="col-sm-4 col-xs-12">
	                   				<label> Documnet No. (if Any, <small class="text-info">Optional</small>) </label>
	                   				<?php 
	                   				echo form_input( ['name'=>'doc_no',  'class'=>'form-control', 'placeholder'=>'DBXXUX78'] ); 
	                   				echo form_hidden("emp_id", $emp->id);
	                   				?>
	                   				
	                   			</div>
	                   			<div class="col-sm-4 col-xs-12 paddset upload_error">
	                   				<label> Select Document <small class="text-danger">Allowed filetype: PDF Only </small></label>
	                   				<?php 
	                   				echo form_upload( ['name'=>'file',  'class'=>'form-control'] ); 									
	                   				if(  $this->session->flashdata('upload_error') ) {
										echo $this->session->flashdata	('upload_error');
									}
	                   				?>
	                   				
	                   			</div>
	                   		</div>
	                   		
	                   		<div class="row paddset">
	                   			<div class="col-sm-11 col-xs-12">
	                   				<?php echo form_submit("btn","Upload Documet", ['class'=>'btn btn-md btn-primary pull-right'] ); ?>
	                   			</div>
	                   			<div class="col-sm-1 col-xs-12">
	                   				<?php echo anchor("employee/emp_profile/".base64_encode($emp->id), "Cancel", ['class'=>'btn btn-md btn-dark']) ?>
	                   			</div>
	                   			
	                   		</div>
	                   		<?php echo form_close(); ?>
	                   		
	                   		<div class="col-sm-12 col-xs-12">
			                        <h4 class="text-primary paddset"> Document List </h4>
	                   			<table cellpadding="0" cellspacing="0" bgcolor="0" class="table table-stripped">
	                   				<tr>
	                   					<th> Document Name </th>
	                   					<th> Document No </th>
	                   					<th> Download </th>
	                   					<th> Delete </th>
	                   				</tr>
	                   				<?php foreach( $docs as $d ): ?>
	                   				<tr>
	                   					<td> <?php echo $d->name ?> </td>
	                   					<td> <?php echo $d->doc_no ?> </td>
	                   					<td> <?php echo anchor_popup($d->http_path, font_awesome("fa-download text-primary"), ['class'=>'text-center']); ?> </td>
	                   					<td> <?php echo anchor("employee/doc_delete/".base64_encode($d->id), font_awesome("fa-trash text-danger"), ['class'=>'text-center can_delete']); ?> </td>
	                   				</tr>
	                   				<?php  endforeach;?>
	                   			</table>
	                   		</div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<?php master_footer(); ?>
