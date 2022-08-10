<section id="main-content" class="animated fadeIn" style="animation-duration: 2s; opacity: 1;">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<header class="panel-heading ">
					Upload file
				</header>
				<section class="panel">
					<div class="panel-body bio-graph-info">
						<?php
						echo form_open_multipart("admin/upload_file_action", ['class'=>'form-horizontal'] );
						?>

						<div class="form-group">
							<label class="col-sm-2 col-xs-12 control-label"> Please Select File </label>
							<div class="col-sm-5 col-xs-12">
								<?php echo form_upload( ['name'=>'file', 'class'=>'form-control']) ?>
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-xs-7">
								<button type="submit" class="btn btn-primary pull-right">Submit</button>
							</div>
						</div>

						<div class="form-group">
							<div class="col-xs-12">
								<?php  echo anchor("sample.xls", "Donload Sample File", ['class'=>'btn btn-md btn-success pull-right']) ; ?>
							</div>
						</div>

						<?php
						echo form_close();
						
						if( isset( $img_data )){
							echo  "<span class='text-danger'>" .$img_data. "</span>";
						}
						?>
					</div>
				</section>
			</div>
		</div>
	</section>
</section>
<?php  master_footer(); ?>