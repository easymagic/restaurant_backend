<?php 

function uc_admin_enable($id){
  // $post = request('post_data');
  
  // print_r($post);
  $post = array();
  $post['status'] = 1;

  __action('entity_where','id',$id);
  __action('entity_update','user',$post);
  
  log_success('Account enabled.');

}
add_listener('uc_admin_enable','uc_admin_enable');