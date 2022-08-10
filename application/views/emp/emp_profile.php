<div class="content mt-12">
    <div class="animated fadeIn">
        <?php ses_msg(); ?>
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="card master_card ">
                    <div class="card-header ">
                        <h4 class="text-primary"> Employee Profile </h4>
                    </div>
                    <div class="card-body emp">
                        <div class="row">
                            <div class="col-sm-9 col-xs-12">
                            	<div class="row">
                            		<div class="col-sm-3 col-xs-12"><?php echo img("images\avatar/user.png", "Image", ['class'=>'emp_img']) ?> </div>
                            		<div class="col-sm-8 col-xs-12 ">
                            			<ul class="global_ul">
		                                    <li>
		                                        <h1 class="text-primary"> <?php echo $emp->emp_name ?> <span class="pull-right emp_status badge badge-<?php echo $emp_status->boot_class; ?>"> <?php echo $emp_status->name; ?></span> </h1>
		                                    </li>
		                                    <li>
		                                        <?php echo font_awesome("fa-briefcase text-primary"); ?><span class=""><?php echo $emp->desig_name .", <strong>".$emp->dept_name."</strong>" ?></span>
		                                    </li>
		                                    <li>
		                                        <?php echo font_awesome("fa-map-marker text-primary"); ?><span class=""><?php echo $emp->zone_name?></span>
		                                    </li>
		                                    <li>
		                                        <?php echo font_awesome("fa-building text-primary"); ?><span class=""><?php echo $emp->comp_name?></span>
		                                    </li>
		                                    
		                                </ul>
                            		</div>
                            	</div>	
                                
                                <div class="row ">
                                    <div class="col-sm-12 col-xs-12">
                                        <div class="card-body">
                                            <div class="custom-tab ">
                                                <nav>
                                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                        <a class="nav-item nav-link active" id="custom-nav-home-tab" data-toggle="tab" href="#custom-nav-home" role="tab" > <i class="fa fa-desktop"></i> Basic Deatils</a>
                                                        <a class="nav-item nav-link" id="custom-nav-profile-tab" data-toggle="tab" href="#custom-nav-family" ><i class="fa fa-users"></i> Family Deatils</a>
                                                        <a class="nav-item nav-link" id="custom-nav-profile-tab" data-toggle="tab" href="#custom-nav-address"  ><i class="fa fa-map-marker"></i> Address Deatils</a>
                                                        <a class="nav-item nav-link" id="custom-nav-contact-tab" data-toggle="tab" href="#custom-nav-contact" ><i class="fa fa-bank"></i> Bank Deatils</a>
                                                        <a class="nav-item nav-link" id="custom-nav-contact-tab" data-toggle="tab" href="#custom-nav-docs" ><i class="fa fa-file"></i> Joining Documents</a>
                                                    </div>
                                                </nav>
                                                <div class="tab-content pl-3 pt-2" 
                                                    id="nav-tabContent">
                                                    <div class="tab-pane fade show active" 
                                                        id="custom-nav-home" >
                                                        <ul class="list list-inline profile_ul">
                                                            <li> <label> Employee Code: </label> <span class="text-danger"> <?php echo $emp->emp_code ?> </span> </li>
                                                            <li> <label> Department: </label> <span class="text-danger"> <?php echo $emp->dept_name ?> </span> </li>
                                                            <li> <label> Designation: </label> <span class="text-danger"> <?php echo $emp->desig_name ?> </span> </li>
                                                            <li> <label> Role: </label> <span class="text-danger"> <?php echo $emp->role ?> </span> </li>
                                                            <li> <label> Shift: </label> <span class="text-danger"> <?php echo $emp->shift_name ?> </span> </li>
                                                            <li> <label> Zone: </label> <span class="text-danger"> <?php echo $emp->zone_name ?> </span> </li>
                                                            <li> <label> Base Location: </label> <span class="text-danger"> <?php echo $emp->base_location ?> </span> </li>
                                                            <li> <label>  Salary </label> <span class="text-danger"> <?php echo $emp->salary ?> </span> </li>
                                                            <li> <label>  Other Allownce </label> <span class="text-danger"> <?php echo "Test" ?> </span> </li>
                                                            <li> <label>  On/Off Role </label> <span class="text-danger"> <?php echo $emp->emp_type ?> </span> </li>
                                                            <li> <label>  Date of Joining </label> <span class="text-danger"> <?php echo $emp->d_o_j ?> </span> </li>
                                                            
                                                            <li> <label>  Mobile </label> <span class="text-danger"> <?php echo $emp->cont_phone ?></span> </li>
                                                             <li> <label>  Email </label> <span class="text-danger"> <?php echo $emp->cont_email ?></span> </li>
                                                        </ul>
                                                    </div>
                                                    <div class="tab-pane fade" id="custom-nav-family">
                                                        <ul class="list list-inline profile_ul">
                                                        <?php if( is_object($family) ){ ?>
                                                            <li> <label> Father Name </label> <span class="text-danger"> <?php echo $family->father_name ?> </span> </li>
                                                            <li> <label> Mother Name </label> <span class="text-danger"> <?php echo $family->mother_name ?> </span> </li>
                                                            <li> <label> Spouse </label> <span class="text-danger"> <?php echo $family->spouse ?> </span> </li>
                                                            <li> <label> Spouse Name </label> <span class="text-danger"> <?php echo $family->spouse_name ?> </span> </li>
                                                            <li> <label> Spouse Age </label> <span class="text-danger"> <?php echo $family->spouse_age ?> </span> </li>
                                                            <li> <label> Child 1 Name </label> <span class="text-danger"> <?php echo $family->child_1_name ?> </span> </li>
                                                            <li> <label> Child 1 Age </label> <span class="text-danger"> <?php echo $family->child_1_age ?> </span> </li>
                                                            <li> <label> Child 2 Name </label> <span class="text-danger"> <?php echo $family->child_2_name ?> </span> </li>
                                                            <li> <label> Child 2 Age </label> <span class="text-danger"> <?php echo $family->child_2_age ?> </span> </li>
                                                            
                                                        </ul>
                                                        <?php }
                                                        else{
															echo "No Data Available.";
														}
                                                        ?>
                                                    </div>
                                                    <div class="tab-pane fade" id="custom-nav-address" >
                                                        <?php if( is_object($addr) ){ ?>
                                                        <ul class="list list-inline profile_ul">
                                                            <li> <label> Address </label> <span class="text-danger"> <?php echo $emp->addr_line_1 .", ".$emp->addr_line_2 . ", ".$addr->area. ", ".$addr->divisionname. ", ".$addr->district. ", ".$addr->state. ", ".$addr->pincode;   ?> </span> </li>
                                                        </ul>
                                                        <?php }else{ echo "No Data Available"; } ?>
                                                    </div>
                                                    <div class="tab-pane fade" id="custom-nav-contact" >
                                                        <?php if( is_object($bank) ){ ?>
                                                        <ul class="list list-inline profile_ul">
                                                            <li> <label> Account No. </label> <span class="text-danger"> <?php echo $emp->bank_acc_no ?> </span> </li>
                                                            <li> <label> IFSC Code </label> <span class="text-danger"> <?php echo $emp->bank_ifsc_code ?> </span> </li>
                                                            <li> <label> Bank </label> <span class="text-danger"> <?php echo $bank->BANK ?> </span> </li>
                                                            <li> <label> Branch </label> <span class="text-danger"> <?php echo $bank->BRANCH ?> </span> </li>
                                                            <li> <label> Address </label> <span class="text-danger"> <?php echo $bank->ADDRESS ?> </span> </li>
                                                            <li> <label> City </label> <span class="text-danger"> <?php echo $bank->CITY ?> </span> </li>
                                                            <li> <label> District </label> <span class="text-danger"> <?php echo $bank->DISTRICT ?> </span> </li>
                                                            <li> <label> State </label> <span class="text-danger"> <?php echo $bank->STATE ?> </span> </li>
                                                        </ul>
                                                        <?php }else{ echo "No Data Available"; } ?>
                                                    </div>
                                                    <div class="tab-pane fade" id="custom-nav-docs">
                                                    	<table cellpadding="0" cellspacing="0" bgcolor="0" class="table table-stripped">
	                   				<tr>
	                   					<th> Document Name </th>
	                   					<th> Document No </th>
	                   					<th> Download </th>
	                   				</tr>
	                   				<?php foreach( $docs as $d ): ?>
	                   				<tr>
	                   					<td> <?php echo $d->name ?> </td>
	                   					<td> <?php echo $d->doc_no ?> </td>
	                   					<td> <?php echo anchor_popup($d->http_path, font_awesome("fa-download text-primary"), ['class'=>'text-center']); ?> </td>
	                   					
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
                            
                            <div class="col-sm-3 col-xs-12">
                            	<?php  
	                            if( $emp->emp_status == "on" || $emp->emp_status == "wt" ):
								?>
                                <div class="card bg-light border-primary">
                                    <div class="card-header text-white bg-primary"> <h6> <i class=" fa fa-user"></i> Edit Details </h6> </div>
                                    <div class="card-body">
                                        <ul class="list list-inline">
                                            <li class=""> <?php echo anchor("employee/edit_emp_details/".base64_encode($emp->id), "Basic Details", ['class'=>'text-dark']); ?>
                                            </li>
                                            <li class=""> <?php echo anchor("employee/create_emp_family/".base64_encode($emp->id), "Update family Details", ['class'=>'text-dark']); ?>
                                            </li>
                                            <li>
                                                <?php echo anchor("employee/add_bank_details/".base64_encode($emp->id), "Update Bank Details", ['class'=>'text-dark']) ;?>	
                                            </li>
                                            <li>
                                                <?php echo anchor("employee/add_addr_details/".base64_encode($emp->id), "Update Address Details", ['class'=>'text-dark']) ;?>	
                                            </li>
                                            <li>
                                                <?php echo anchor("employee/emp_join_docs/".base64_encode($emp->id), "Document Upload", ['class'=>'text-dark']) ;?>	
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <?php endif; ?>
                                
                                <?php  
                                if( $emp->emp_status == "wt" ):
								?>
                                <div class="card bg-light border-primary">
                                    <div class="card-header text-white bg-primary"></i> <h6> <i class=" fa fa-user"></i>  Onboarding</h6> </div>
                                    <div class="card-body">
                                        <ul class="list list-inline">
                                            <li class=""> Please make sure that the Documentation is completed. <?php echo anchor("employee/on_boarding/".base64_encode($emp->id), "Continue...", ['class'=>'text-primary']); ?>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </div>
                                
                                <?php endif; ?>
                                
                                <?php  
	                            if( $emp->emp_status == "on" || $emp->emp_status == "wt" ):
								?>
                                <div class="card bg-light border-danger">
                                    <div class="card-header text-white bg-danger"> <h6> <i class=" fa fa-user"></i> Offboarding</h6> </div>
                                    <div class="card-body">
                                        <ul class="list list-inline">
                                            <li class=""> <?php echo anchor("employee//off_boarding/".base64_encode($emp->id), "Close File", ['class'=>'text-dark']); ?>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </div>
                                <?php endif; ?>
                                
                                
                                <?php  
                                if( $emp->emp_status == "of" ):
								?>
                                <div class="card bg-light border-danger">
                                    <div class="card-header text-white bg-danger"></i> <h6> <i class=" fa fa-user"></i>  Employee Left</h6> </div>
                                    <div class="card-body paddbox	">
                                        <ul class="list list-inline">
                                            <li class=""><span class="text-danger"> Reason</span> - <?php echo $emp->left_reason ?>  </li>
                                            <li class=""><span class="text-danger"> L.W.D</span>  <?php echo $emp->left_lwd ?> </li>
                                            <li class=""><span class="text-danger">Remarks</span>  <?php echo $emp->left_remarks ?> </li>
                                            
                                        </ul>
                                    </div>
                                </div>
                                
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php master_footer(); ?>
