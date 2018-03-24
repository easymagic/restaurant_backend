<form method="post" action="<?php echo base_url(); ?>actions/launch/admin/update/<?php echo $id; ?>">
<div class="col-xs-12">
	
<div class="col-xs-12" align="right">
	<a href="<?php echo base_url(); ?>admin/users" class="btn btn-primary">Back</a>
</div>

<div class="col-xs-12">
	<?php 
      __filter('log_message');
	?>
</div>

	<div class="col-xs-12">
      <h3>
      	Edit Profile
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


	<div class="col-xs-12">
		<label>
			Role
		</label>
	</div>
	<div class="col-xs-12" style="margin-bottom: 11px;">
		<select name="post_data[role]" class="form-control" data-value="<?php echo $item->role; ?>">
			<option value="">--Select--</option>
			<option value="admin">Admin</option>
			<option value="waiter">Waiter</option>
		</select>
	</div>

<!-- tables -->

	<div class="col-xs-12">
		<label>
			Assign Table
		</label>
	</div>
	<div class="col-xs-12" style="margin-bottom: 11px;">
		<select name="post_data[table_id]" class="form-control" data-value="<?php echo $item->table_id; ?>">
			<option value="">--Select--</option>
			<?php 
             foreach ($tables as $k=>$v){

             	?>
                 <option value="<?php echo $v->id; ?>"><?php echo $v->name; ?></option> 	
             	<?php 

             }
			?>
			
		</select>
	</div>



	<div class="col-xs-12">
	</div>
	<div class="col-xs-12">
		<input type="submit" value="Update" class="btn btn-primary" />
	</div>



</div>
</form>