<form method="post" action="<?php echo base_url(); ?>actions/launch/table/update/<?php echo $id; ?>">
<div class="col-xs-12">
	
<div class="col-xs-12" align="right">
	<a href="<?php echo base_url(); ?>table/list/<?php echo $items[0]->parent_id; ?>" class="btn btn-primary">Back</a>
</div>

<div class="col-xs-12">
	<?php 
      __filter('log_message');
	?>
</div>

	<div class="col-xs-12">
      <h3>
      	Edit Table

      	<?php 
         if ($items[0]->parent_id > 0){
?>
Under <?php echo __filter('table_name',$items[0]->parent_id); ?>
<?php 
         }
      	?>

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




	<div class="col-xs-12">
	</div>
	<div class="col-xs-12">
		<input type="submit" value="Update" class="btn btn-primary" />
	</div>



</div>
</form>