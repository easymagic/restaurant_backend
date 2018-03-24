<div class="col-xs-12">

<div class="col-xs-12">
	<?php 
      __filter('log_message');
	?>
</div>
	
	
	<div class="col-xs-12">
		<h3>
			Settings / Prefs
		</h3>
	</div>


	<form method="post" action="<?php echo base_url(); ?>actions/launch/save/settings">
		
		<div class="col-xs-12">
			<b>Business Name</b>
		</div>

		<div class="col-xs-12">
			<input class="form-control" type="text" name="business_name" value="<?php echo __filter('option_get','business_name'); ?>">
		</div>


		<div class="col-xs-12">
			<b>Business Address</b>
		</div>

		<div class="col-xs-12">
			<input class="form-control" type="text" name="business_address" value="<?php echo __filter('option_get','business_address'); ?>">
		</div>



		<div class="col-xs-12">
			<b>VAT-Charge</b>
		</div>

		<div class="col-xs-12">
			<input type="number" class="form-control" name="vat" value="<?php echo __filter('option_get','vat'); ?>">
		</div>





		<div class="col-xs-12">
			<!-- <b>Business Name</b> -->
		</div>

		<div class="col-xs-12">
			<input type="submit"  value="Save Settings" class="btn btn-info">
		</div>


	</form>


</div>