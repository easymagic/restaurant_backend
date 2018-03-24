<form method="post" action="<?php echo base_url(); ?>actions/launch/table/create">
<div class="col-xs-12">
	
<div class="col-xs-12" align="right">
	<a href="<?php echo base_url(); ?>table/list/<?php echo $parent_id; ?>" class="btn btn-primary">Back</a>
</div>

<div class="col-xs-12">
	<?php 
      __filter('log_message');
	?>
</div>


<input type="hidden" name="post_data[parent_id]" value="<?php echo $parent_id; ?>" />

	<div class="col-xs-12">
      <h3>
      	Add Table 
      	<?php 
         if ($parent_id > 0){
?>
Under <?php echo __filter('table_name',$parent_id); ?>
<?php 
         }
      	?>
      </h3>
	</div>


	<div class="col-xs-12">
		<label>
			Name
		</label>
	</div>
	<div class="col-xs-12">
		<input type="text" value="" name="post_data[name]" placeholder="Name" class="form-control" />
	</div>




	<div class="col-xs-12">
	</div>
	<div class="col-xs-12">
		<input type="submit" value=" + Add" class="btn btn-primary" />
	</div>



</div>
</form>