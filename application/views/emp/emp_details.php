<?php
$path = base_url('/admin_assets')."/";
?>

<div class="content mt-12">
	<div class="animated fadeIn">
		<?php
		ses_msg();
		?>
		<div class="row">
			<div class="col-sm-12 col-xs-12"> 
				<div class="card">
					<div class="card-header  ">
						<h4 class="text-primary"> Employees</h4>
					</div>
					<div class="card-body ">
						<div class="row">
							<div class="col-xs-12">	
								<?php ses_msg(); ?>
									<div class="row">
										
										<div class="col-sm-6 col-xs-12"> 
											<div class="row">
												<div class="col-sm-4">Total Count:-  <?php echo $count; ?>  </div>
											</div>
										</div>
										
										<div class="col-sm-6 col-xs-12"> 
											<div class="row pull-right">
													<?php
													echo "<div class='col-sm-6'>". form_open("emp/emp_details", ['class'=>'']);
													echo  form_input("q", "", ['placeholder'=>'Enter Emp Code', 'class'=>'form-control']) . "</div>";
														
													echo "<div class='col-sm-6'>". form_submit("Search", "Search", ['class'=>'btn btn-md btn-primary']);
													echo form_close() ."</div>";
													?>	
										
										</div>
										</div>
									</div>

									<table class="table table-sthiped border-top" id="sample_1">
										<thead>
											<tr>
												<th>  #</th>
												<th> Base Location  </th>
												<th>  Zone 	</th>
												<th>  Emp Code</th>
												<th> Employee Name </th>
												<th> Desination </th>
												<th> Department </th>
												<th> Date Of Joining </th>
												<th> Salary </th>
												<th> Action </th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($data as $data): ?>
											<tr class="parent_tr">
												<td colspan=""> 
													<?php echo $data->id ?> 
												</td>
												<td> <?php echo $data->base_location ?></td>
												<td> <?php echo $data->zone_name ?></td>
												<td> <?php echo $data->emp_code ?></td>
												<td> <?php echo $data->emp_name ?></td>
												<td> <?php echo $data->desig_name ?></td>
												<td> <?php echo $data->dept_name ?></td>
												<td> <?php echo $data->d_o_j ?></td>
												<td> <?php echo $data->salary ?></td>
												<th>
												<?php
												echo anchor("emp/salary_filter/".base64_encode($data->emp_code),"Get Details" , ['class'=>'btn-success btn btn-sm']);?>
												
												</th>
											</tr>
											<?php endforeach; ?>
											<tr>
												<td colspan="10">
													<?php echo $this->pagination->create_links(); ?>
												</td>
											</tr>		
										</tbody>
									</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php master_footer(); ?>
