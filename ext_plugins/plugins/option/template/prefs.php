<?php 
 $role = session('admin_account')->role;
?>
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


<?php 
 if ($role == 'admin'){
?>
	<form method="post" action="<?php echo base_url(); ?>actions/launch/save/settings">
<?php 
 }
?>		
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
			<b>Business E-mail</b>
		</div>

		<div class="col-xs-12">
			<input class="form-control" type="text" name="business_email" value="<?php echo __filter('option_get','business_email'); ?>">
		</div>


		<div class="col-xs-12">
			<b>Business Contact</b>
		</div>

		<div class="col-xs-12">
			<input class="form-control" type="text" name="business_contact" value="<?php echo __filter('option_get','business_contact'); ?>">
		</div>



		<div class="col-xs-12">
			<b>VAT</b>
		</div>

		<div class="col-xs-12">
			<input type="number" class="form-control" name="vat" value="<?php echo __filter('option_get','vat'); ?>">
		</div>



		<div class="col-xs-12">
			<b>Service-Charge</b>
		</div>

		<div class="col-xs-12">
			<input type="number" class="form-control" name="service_charge" value="<?php echo __filter('option_get','service_charge'); ?>">
		</div>



		<div class="col-xs-12">
			<b>Consumption-Tax</b>
		</div>

		<div class="col-xs-12">
			<input type="number" class="form-control" name="consumption_tax" value="<?php echo __filter('option_get','consumption_tax'); ?>">
		</div>



		<div class="col-xs-12">
			<!-- <b>Business Name</b> -->
		</div>

		<?php 
         if ($role == 'admin'){
		?>

		<div class="col-xs-12">
			<input type="submit"  value="Save Settings" class="btn btn-info">
		</div>
		<?php 
         } 
		?>

<?php 
 if ($role == 'admin'){
?>
	</form>
<?php 
 }
?>	

</div>