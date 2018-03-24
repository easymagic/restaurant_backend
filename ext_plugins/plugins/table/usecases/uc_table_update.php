<?php 

 function uc_table_update($id=''){
  // __action('entity_where','id',$id);
  $post_data = request('post_data');
  __action('entity_where','id',$id);
  __action('entity_update','table_placeholder',$post_data);
  log_success('Table updated.');
 }
 add_listener('uc_table_update','uc_table_update');