<form method="post" action="<?php echo base_url(); ?>actions/launch/item/update/<?php echo $id; ?>">
<div class="col-xs-12">
	
<div class="col-xs-12" align="right">
	<a href="<?php echo base_url(); ?>item/list/<?php echo $items[0]->parent_id; ?>" class="btn btn-primary">Back</a>
</div>

<div class="col-xs-12">
	<?php 
      __filter('log_message');
	?>
</div>

	<div class="col-xs-12">
      <h3>
      	Edit Item Under <?php echo __filter('item_name',$items[0]->parent_id); ?>
      </h3>
	</div>

<!-- 	<div class="col-xs-12">
		<input type="text" name="email" class="form-control" />
	</div>
 -->


	<div class="col-xs-12">
		<label>
			Name
		</label>
	</div>
	<div class="col-xs-12">
		<input type="text" value="<?php echo $items[0]->name; ?>" name="post_data[name]" placeholder="Name" class="form-control" />
	</div>
  <?php 
   if ($items[0]->parent_id != 0){
  ?>
	<div class="col-xs-12">
		<label>
			Price
		</label>
	</div>
	<div class="col-xs-12">
		<input type="text" value="<?php echo $items[0]->price_default; ?>" name="post_data[price]" placeholder="Price" class="form-control" />
		<b> ( VAT Inclusive Of: =N= <?php echo number_format( __filter('option_get','vat') ); ?> )</b>
	</div>
<?php 
 }
?>




	<div class="col-xs-12">
	</div>
	<div class="col-xs-12">
		<input type="submit" value="Update" class="btn btn-primary" />
	</div>



</div>
</form>