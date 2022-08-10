<aside>
	<div class="inner-box">
		<div class="user-panel-sidebar">
			<div class="collapse-box">
		
				<ul class="acc-list">
					
					<li <?php if($this->uri->segment(2)=="dashboard"){echo 'class="active"';}?> >
						<a href="<?php echo site_url(); ?>Emp_home/dashboard" ><i class="fa fa-dashboard"></i> Dashboard
						</a>
					</li>
					
					<li <?php if($this->uri->segment(2)=="shift_list_emp"){echo 'class="active"';}?> >
						<a href="<?php echo site_url(); ?>Emp_home/dashboard" ><i class="fa fa-dashboard"></i> Shift Management
						</a>
					</li>
					
					
					<!--<li <?php if($this->uri->segment(2)=="my_attendance"){echo 'class="active"';}?> >
						<a href="<?php echo site_url(); ?>Emp_home/my_attendance" ><i class="fa fa-clock-o"></i> My Attendance
						</a>
					</li>
					
					<li <?php if($this->uri->segment(2)=="my_profile"){echo 'class="active"';}?> >
						<a href="<?php echo site_url(); ?>Emp_home/my_profile" ><i class="fa fa-user"></i> My Profile
						</a>
					</li>

					
					<li <?php if($this->uri->segment(2)=="change_pass"){echo 'class="active"';}?> >
						<a href="<?php echo site_url(); ?>Emp_home/change_pass" ><i class="fa fa-lock "></i> Change Password 
						</a>
					</li>-->
						
				</ul>
			</div>
		</div>
	</div>
</aside>