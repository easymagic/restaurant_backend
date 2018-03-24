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

<div class="print-item" align="center">
 <b>
 	<?php echo __filter('option_get','business_name'); ?>
 </b>	
 <div>
 	<b>(Receipt)</b>
 </div>
</div>

<div class="print-item" align="center">
 <b>
 	<?php echo __filter('option_get','business_address'); ?>
 </b>		
</div>

<div class="print-item">
	<b>Date:</b> <?php echo date('Y-m-d h:i:s'); ?>
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
	<b><?php echo $v->name; ?> @ =N= <?php echo number_format($v->price) ; ?></b>
</div>
<?php 
 }
?>

<div class="print-item" style="
    border-top: 1px dashed;
    padding-top: 11px;
">
	<b>
		Total Amount : =N= <?php echo number_format($tot); ?>
	</b>
</div>

<div class="print-item" style="
    border-top: 1px dashed;
    padding-top: 11px;
">
	<b>VAT Inclusive</b> : <?php echo __filter('option_get','vat'); ?>
</div>

<div class="print-item">
	&nbsp;
</div>