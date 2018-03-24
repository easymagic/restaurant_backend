<form method="post" action="<?php echo base_url(); ?>actions/launch/admin/update/<?php echo $id; ?>">
<div class="col-xs-12">
	

<div class="col-xs-12">
	<?php 
      __filter('log_message');
	?>
</div>

	<div class="col-xs-12">
      <h3>
      	Your Profile
      </h3>
	</div>

<!-- 	<div class="col-xs-12">
		<input type="text" name="email" class="form-control" />
	</div>
 -->

	<div class="col-xs-12">
		<label>
			Phone
		</label>
	</div>
	<div class="col-xs-12">
		<input type="text" value="<?php echo $item->phone; ?>" name="post_data[phone]" placeholder="Phone" class="form-control" />
	</div>


	<div class="col-xs-12">
		<label>
			Address
		</label>
	</div>
	<div class="col-xs-12">
		<input type="text" name="post_data[address]" value="<?php echo $item->address; ?>" placeholder="Address" class="form-control" />
	</div>


	<div class="col-xs-12" style="margin-bottom: 11px;">

		<label>
			Role (<?php echo $item->role; ?>)
		</label>

	</div>




	<div class="col-xs-12">
	</div>
	<div class="col-xs-12">
		<input type="submit" value="Update Profile" class="btn btn-primary" />
	</div>



</div>
</form>