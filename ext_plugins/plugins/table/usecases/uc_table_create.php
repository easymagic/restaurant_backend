<?php 

 function uc_table_create(){
  // __action('entity_where','id',$id);
  $post_data = request('post_data');

  // $post_data['date_created'] = date('Y-m-d h:i:s');
  // $post_data['created_by'] = session('admin_account')->id;

  __action('entity_create','table_placeholder',$post_data);
  log_success('Table added.');
 }
 add_listener('uc_table_create','uc_table_create');