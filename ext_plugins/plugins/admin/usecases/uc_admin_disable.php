<?php 

function uc_admin_disable($id){
  // $post = request('post_data');
  
  // print_r($post);
  $post = array();
  $post['status'] = 0;

  __action('entity_where','id',$id);
  __action('entity_update','user',$post);
  
  log_success('Account disabled.');

}
add_listener('uc_admin_disable','uc_admin_disable');