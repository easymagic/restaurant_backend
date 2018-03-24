<form method="post" action="<?php echo base_url(); ?>actions/launch/admin/change_password/<?php echo $id; ?>">
<div class="col-xs-12">
	
<div class="col-xs-12">
	<?php 
      __filter('log_message');
	?>
</div>

	<div class="col-xs-12">
      <h3>
      	Password Change
      </h3>
	</div>

<!-- 	<div class="col-xs-12">
		<input type="text" name="email" class="form-control" />
	</div>
 -->


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
	</div>
	<div class="col-xs-12">
		<input type="submit" value="Change Password" class="btn btn-primary" />
	</div>



</div>
</form>