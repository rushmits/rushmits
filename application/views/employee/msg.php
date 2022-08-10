<div style="background: url(<?php echo base_url("assets") ?>/img/banner1.jpg);" class="page-header">
	<div class="container">
		<div class="row">         
			<div class="col-md-12">
				<div class="breadcrumb-wrapper">
					<h2 class="page-title">Message</h2>
				</div>
			</div>
		</div>
	</div>
</div>	
<section id="content" class="main">
	<div class="container">
		<div class="row big_blue">
			<div class="col-md-12 col-xs-12">
						<?php
						$feedback = $this->session->flashdata('feedback');
						$feedback_class = $this->session->flashdata('feedback_class');
						if($feedback):
						?>
						<div class="alert alert-dismissible <?php echo $feedback_class ?>">
							<h3>	<?php echo $feedback ?>  </h3>
						</div>
						<?php endif; 
						?>
				</div>
		</div>
	</div>
</section>