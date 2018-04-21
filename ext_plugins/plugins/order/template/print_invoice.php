<?php 
 // print_r($item);
 $table = json_decode($item[0]->json_data);
 // print_r($table);

 // __action('option_set','vat',202);
 // __action('option_set','business_name','CREEK RESTAURANT');

?>

<style type="text/css">
	.print-item{
      margin-top: 14px;
      padding-left: 21px;
	}
</style>

<div style="padding-right: 11px;">

<div class="print-item" align="center">
 <b>
 	<?php echo __filter('option_get','business_name'); ?>
 </b>	
 <div>
 	<b>(Invoice)</b>
 </div>
</div>

<div class="print-item" align="center">
 <b>
 	<?php echo __filter('option_get','business_address'); ?>
 </b>		
</div>


<div class="print-item" align="right">

	<div>
		<b>Order# : </b> <?php echo __filter('order_transaction_id',$item[0]->id); ?>
	</div>

	<div>
		<b>Station# : </b> <?php echo __filter('table_name',$item[0]->table_id); ?>
	</div>


	<div>
		<b>Waiter : </b> <?php echo __filter('admin_user_name',$item[0]->user_id); ?>
	</div>


	<div>
		<b>Date : </b> <?php echo date('Y-m-d h:i:s'); ?>
	</div>


</div>





 
<div class="print-item" style="
    border-top: 1px dashed;
    border-bottom: 1px dashed;
    padding-top: 11px;
    padding-bottom: 11px;
">
	<b>Items</b>
</div>


<?php 
 $tot = 0;
 foreach ($table as $k=>$v){
 	$tot+=($v->price * 1);
?>
<div class="print-item">
	<b>
		<?php echo $v->name; ?> 
			
	</b>

	<b style="float: right;">
		@ =N= <?php echo number_format($v->price) ; ?>
	</b>
</div>
<div style="clear: both;"></div>
<?php 
 }
?>

<div class="print-item" style="
    border-top: 1px dashed;
    padding-top: 11px;
">

<div>
	<b>
		Sub-Total: 
	</b>
	<b style="float: right;">
		=N= <?php echo number_format($tot); ?>
    </b>		
</div>


<div>
	<b>
		Total Tax: 
	</b>
	<b style="float: right;">
		=N= <?php echo number_format($item[0]->total_price - $tot); ?>
    </b>		
</div>


</div>

<div class="print-item" style="
    border-top: 1px dashed;
    padding-top: 11px;
">

<div>
	<b>
		Total: 
	</b>
	<b style="float: right;">
		=N= <?php echo number_format($item[0]->total_price); ?>
    </b>		
</div>


<div>
	<span>
		<!-- Customer Paid <?php //echo strtoupper($item[0]->payment_type); ?>: -->
	</span>
<!-- 	<b style="float: right;">
		 =N= <?php //echo number_format($item[0]->total_price); ?>
    </b>		
 -->
</div>

<?php 
 if ($item[0]->payment_type == 'cash'){
?>
<!-- cash start -->
<div>
	<span>
		Amount Tenderred
	</span>
	<b style="float: right;">
		=N= <?php echo number_format($item[0]->amount_tendered); ?>
    </b>		
</div>

<div>
	<span>
		Amount Due
	</span>
	<b style="float: right;">
		=N= <?php echo number_format($item[0]->amount_tendered); ?>
    </b>		
</div>


<div>
	<span>
		Change
	</span>
	<?php 
      $due = abs($item[0]->amount_tendered - $item[0]->total_price);
	?>
	<b style="float: right;">
		=N= <?php echo number_format($due); ?>
    </b>		
</div>
<!-- cash stop -->
<?php 
 }
?>


<div>
	<span>
		Price includes Taxes
	</span>
</div>


<div>
	<span>
		Total Taxes Collected:
	</span>
	<b style="float: right;">
		=N= <?php echo number_format($item[0]->total_price - $tot); ?>
    </b>		
</div>


	<!-- <b>VAT Inclusive</b> : <?php //echo __filter('option_get','vat'); ?> -->
</div>


<div class="print-item" align="center">
	<b>Total Tax Breakdown</b>
</div>

<div class="print-item" style="
    border-top: 1px dashed;
    padding-top: 11px;
">
 

<div>
	<b>
		Rate:
	</b>
	<b style="float: right;">
		Total
    </b>		
</div>




</div>

<div class="print-item" style="
    border-top: 1px dashed;
    padding-top: 11px;
">
 

<div>
	<b>
		Tax[=N= <?php echo number_format($item[0]->total_price - $tot); ?> @ 
		<?php echo (+(__action('option_get','vat'))+(__action('option_get','service_charge'))+(__action('option_get','consumption_tax'))) ?>%]
	</b>
	<b style="float: right;">
		=N= <?php echo number_format($item[0]->total_price - $tot); ?>
    </b>		
</div>


<div style="margin-top: 11px;" align="center">
<div>
	Thank You. Please call again
</div>
<div>
	Customer Care : 
	<b><?php echo __action('option_get','business_contact'); ?></b>
</div>
</div>

</div>







<div class="print-item">
	&nbsp;
</div>

</div>
<script type="text/javascript">
	// window.print();
</script>