<?php 

 function uc_table_delete($id=''){
  __action('entity_where','id',$id);
  __action('entity_delete','table_placeholder');
  log_success('Table removed.');
 }
 add_listener('uc_table_delete','uc_table_delete');