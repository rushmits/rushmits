<?php echo  form_open("home/search", ['class'=> 'search-form', 'method'=> 'GET']) ?>
<div class="col-md-9 col-sm-9 col-xs-12 search-col"> 
	<input class="form-control keyword" name="q" value="" 
	placeholder="i,e Pizza, Movies, Parks, Local Business, Doctors, Clothing" type="text">
	<i class="fa fa-search"></i>
	<input type="hidden" value="<?php echo base_url("home/autocomplete") ?>" class="url"/>
</div>
<!--
<div class="col-md-3 col-sm-6 col-xs-12 search-col">
<div class="input-group-addon search-category-container">
<label class="styled-select">
<?php
$options = [
''=>'All Catagories'
];
foreach( $cats as $key=>$cat ){
$options[base64_encode($cat->id)] = $cat->name;
}
//	echo form_dropdown('refer', $options, '', [
//			'class'=>' dropdown-product selectpicker',
//		]);
?>
</label>
</div> 
</div> -->
							
<div class="col-md-3 col-sm-6 col-xs-12 search-col"> 
	<button class="btn btn-common btn-search btn-block"><strong>Search</strong></button>
</div>
<?php echo form_close(); ?>