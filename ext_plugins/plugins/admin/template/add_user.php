<form method="post" action="<?php echo base_url(); ?>actions/launch/admin/create">
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
      	Add User
      </h3>
	</div>

<!-- 	<div class="col-xs-12">
		<input type="text" name="email" class="form-control" />
	</div>
 -->


	<div class="col-xs-12">
		<label>
			E-mail
		</label>
	</div>
	<div class="col-xs-12">
		<input type="email" name="post_data[email]" placeholder="Email" class="form-control" />
	</div>


	<div class="col-xs-12">
		<label>
			Password
		</label>
	</div>
	<div class="col-xs-12">
		<input type="password" name="post_data[password]" placeholder="Password" class="form-control" />
	</div>


	<div class="col-xs-12">
		<label>
			Confirm Password
		</label>
	</div>
	<div class="col-xs-12">
		<input type="password" name="password" placeholder="Confirm Password" class="form-control" />
	</div>



	<div class="col-xs-12">
		<label>
			Phone
		</label>
	</div>
	<div class="col-xs-12">
		<input type="text" name="post_data[phone]" placeholder="Phone" class="form-control" />
	</div>


	<div class="col-xs-12">
		<label>
			Address
		</label>
	</div>
	<div class="col-xs-12">
		<input type="text" name="post_data[address]" placeholder="Address" class="form-control" />
	</div>


	<div class="col-xs-12">
		<label>
			Role
		</label>
	</div>
	<div class="col-xs-12" style="margin-bottom: 11px;">
		<select name="post_data[role]" class="form-control">
			<option value="">--Select--</option>
			<option value="admin">Admin</option>
			<option value="waiter">Waiter</option>
		</select>
	</div>




	<div class="col-xs-12">
	</div>
	<div class="col-xs-12">
		<input type="submit" value="Add" class="btn btn-primary" />
	</div>



</div>
</form>