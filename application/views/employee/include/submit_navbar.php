<div class="row">

	<div class="col-xs-12">
		<?php
		if($this->session->has_userdata('user_id')){
			$list = [
				"<a href=".base_url('users/add_link')."> Submit your  link </a>",
				"<a href=".base_url('users/add_post')."> Submit your  Post </a>",
				"<a href=".base_url('users/add_article')."> Submit your  Artical </a>",
				"<a href=".base_url('users/add_website')."> Submit your  Website </a>",
				"<a href=".base_url('home/logreg')."> Complaints </a>",
				"<a href=".base_url('home/contact')."> Contact Us</a>",
			];
		}else{
			$list = [
				"<a href=".base_url('home/logreg')."> Submit your  link </a>",
				"<a href=".base_url('home/logreg')."> Submit your  Post </a>",
				"<a href=".base_url('home/logreg')."> Submit your  Artical </a>",
				"<a href=".base_url('home/logreg')."> Submit your  Website </a>",
				"<a href=".base_url('home/logreg')."> Advertise with us</a>",
				"<a href=".base_url('home/logreg')."> Complaints </a>",
				"<a href=".base_url('home/contact')."> Contact Us</a>",
			];
		}

		$attributes = [
			'class'=>'post_links av nav-pills nav-stacked'
		];

		echo ul($list, $attributes);
		?>

		
	</div>
	
	<div class="col-xs-12 filter">
		<h4 class="high">Top Rated</h4>	
		<?php 
		foreach($random_posts as $rand_post){
			$lists[] = anchor("home/single/$rand_post->id/0", "$rand_post->title", 
				['class'=>'list_member']) ; 			
		}
		$attributes = [
			'class'=>'filter_list'
		];
		echo ul($lists, $attributes);
		?>
	</div>
	
	<div class="col-xs-12 filter">
		<h4 class="high">Most Visited</h4>	
		<?php 
		foreach($random_posts as $rand_post){
			$visited[] = anchor("home/single/$rand_post->id/0", "$rand_post->title", 
				['class'=>'list_member']) ; 			
		}
		$attributes = [
			'class'=>'filter_list'
		];
		echo ul($visited, $attributes);
		?>
	</div>
	
	

</div>