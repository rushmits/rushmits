<div class="content mt-12">
	<div class="animated fadeIn">
		<?php ses_msg();?>
		<div class="row">
			<div class="col-sm-12 col-xs-12">
				<div class="card">
					<div class="card-header">
						<h4 class="text-primary"> <?php echo $page['heading']; ?> 	</h4>
					</div>
					<div class="card-body card-block">
						<?php echo $page['data']; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php master_footer(); ?>
