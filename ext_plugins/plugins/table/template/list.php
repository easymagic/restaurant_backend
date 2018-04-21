<?php 
 $role = session('admin_account')->role;
?>
<div class="col-xs-12">
	<h3>Table Management

         <?php 
         if ($parent_id > 0){
?>
Under <?php echo __filter('table_name',$parent_id); ?>
<?php 
         }
         ?>


   </h3>
</div>


<div class="col-xs-12" align="right" style="margin-bottom: 11px;">

<?php 
 if ( (+$parent_id) > 0){
?>
 <a href="<?php echo base_url(); ?>table/list/0" class="btn btn-success">Back</a>
<?php 
 }
?>
<?php 
 if ($role == 'admin'){
?>

	<a href="<?php echo base_url(); ?>table/add/<?php echo $parent_id; ?>" class="btn btn-primary"> + Add Table</a>
<?php 
 }
?>

</div>

<div class="col-xs-12">
	<?php 
      __filter('log_message');
	?>
</div>


<div class="col-xs-12">
	<table class="table">
		<tr>
			<th>
				Name
			</th>
		</tr>
		<?php 
         foreach ($items as $k=>$v){

         	?>
            
            <tr>
            	<td>
            		<?php echo $v->name; ?>
            	</td>

            	<td>

                  <?php 
                   if ((+$parent_id) == 0){
?>
                  <a href="<?php echo base_url(); ?>table/list/<?php echo $v->id; ?>" class="btn btn-success"> + Add Sub-Tables</a>
<?php        
                   }
                  ?>


<?php 
 if ($role == 'admin'){
?>
            		<a href="<?php echo base_url(); ?>table/edit/<?php echo $v->id; ?>" class="btn btn-success">Edit</a>
<?php 
 }
?>                  
            		
            	</td>
            </tr>

         	<?php 

         }
		?>
	</table>
</div>