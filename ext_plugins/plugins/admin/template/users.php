<?php 
 $role = session('admin_account')->role;
?>
<div class="col-xs-12">
	<h3>Admin (Users)</h3>
</div>

<?php 
 if ($role == 'admin'){
?>
<div class="col-xs-12" align="right">
	<a href="<?php echo base_url(); ?>admin/add_user" class="btn btn-primary"> + Add User</a>
</div>
<?php 
 }
?>

<div class="col-xs-12">
	<?php 
      __filter('log_message');
	?>
</div>


<div class="col-xs-12">
	<table class="table">
		<tr>
			<th>
				E-mail
			</th>
			<th>
				Phone
			</th>
			<th>
				Role
			</th>
			<th>
				Table
			</th>
			<th>
				Status
			</th>
		</tr>
		<?php 
         foreach ($users as $k=>$v){

         	?>
            
            <tr>
            	<td>
            		<?php echo $v->email; ?>
            	</td>


            	<td>
            		<?php echo $v->phone; ?>
            	</td>


            	<td>
            		<?php echo $v->role; ?>
            	</td>

            	<td>
            		<?php
                      echo __filter('table_name',$v->table_id);
            		?>
            	</td>


            	<td>
            		<?php echo $v->status; ?>
            	</td>

            	<td>
<?php 


 if ($role == 'admin'){
?>

<a href="<?php echo base_url(); ?>actions/launch/admin/enable/<?php echo $v->id; ?>">Enable</a>&nbsp;|&nbsp;<a href="<?php echo base_url(); ?>actions/launch/admin/disable/<?php echo $v->id; ?>">Disable</a>

            		<a href="<?php echo base_url(); ?>admin/edit/<?php echo $v->id; ?>" class="btn btn-success">Edit</a>
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