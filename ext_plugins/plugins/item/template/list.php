<?php 
 $role = session('admin_account')->role;
?>
<div class="col-xs-12">
	<h3>Menu Items For <?php echo __filter('item_name',$parent_id); ?></h3>
</div>


<div class="col-xs-12" align="right" style="margin-bottom: 11px;">

<?php 
 if ($parent_id != 0){
?>
   <a href="<?php echo base_url(); ?>item/list/0" class="btn btn-info"> Back</a>
<?php 
 }
?>

<?php 
 if ($role == 'admin'){
?>

	<a href="<?php echo base_url(); ?>item/add/<?php echo $parent_id;  ?>" class="btn btn-primary"> + Add Item</a>

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
         <?php 
           if ($parent_id != 0){
         ?>
			<th>
				Price
			</th>
         <?php 
          }
         ?>
			<th>
				Date Created
			</th>
		</tr>
		<?php 
         foreach ($items as $k=>$v){

         	?>
            
            <tr>
            	<td>
            		<?php echo $v->name; ?>
            	</td>

               <?php 
                if ($parent_id != 0){
               ?>
            	<td>
            		<?php echo __filter('currency',$v->price); ?>
            	</td>
               <?php 
                 }
               ?>


            	<td>
            		<?php echo $v->date_created; ?>
            	</td>



            	<td>

                 <?php 
                   if ($parent_id == 0){
                 ?>
            		<a href="<?php echo base_url(); ?>item/list/<?php echo $v->id; ?>" class="btn btn-success">Manage Sub-Items</a>
                 <?php 
                  }
                 ?> 

<?php 
 if ($role == 'admin'){
?>

            		<a href="<?php echo base_url(); ?>item/edit/<?php echo $v->id; ?>" class="btn btn-success">Edit</a>
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