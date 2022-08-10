<?php
foreach( $refers as $refer ):
			 
?>
<div class="row global-bg ">
	<div class="col-xs-12">
		<div class="row">
			<div class="col-sm-2 col-xs-3">
				<img src="https://demos.appthemes.com/classipress/files/2012/07/577547-250x250.jpg" align="image" class="post_image"/>
			</div>
			<div class="col-sm-10 col-xs-9 details">
				<h5> <?php echo $refer->post_title ?></h5>
				<p>
					<strong>Description <i class="fa fa-file-text" aria-hidden="true"></i></strong>: 										<?php echo $refer->post_descrip ?></p>
							
				<p>
					<strong>Address <i class="fa fa-map-marker" aria-hidden="true"></i>
					</strong> <?php echo $refer->post_address .$refer->location_name ;?> 
				</p>
								
				<p>
					<strong>Phone <i class="fa fa-phone" aria-hidden="true"></i>
					</strong> 
					<?php echo $refer->post_phone ;?> 
				</p>
				<p>
					<strong>Email <i class="fa fa-envelope" aria-hidden="true"></i>
					</strong> 
					<?php echo $refer->post_email ;?> 
				</p>
				<p>
					<strong>Website <i class="fa fa-globe" aria-hidden="true"></i>
					</strong> 
					<?php echo $refer->post_website ;?> 
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-6">
				<ul class="pull-left post_ul global_ul">
					<li>
						<a href="#" >
							<i class="fa fa-eye"></i>
							<span> 114</span></a>
					</li>
					<li>
						<a href="#">
							<i class="fa fa-heart"></i>
							<span> 250</span></a>
					</li>
				</ul>
			</div>
			<div class="col-xs-6">
				<?php echo anchor("home/single", "Read More...", ['class'=>'pull-right']) ; ?>
			</div>
		</div>
	</div>
</div>
<?php endforeach; ?>