<?php 

function uc_admin_update($id){
  $post = request('post_data');
  
  // print_r($post);
  __action('entity_where','id',$id);
  __action('entity_update','user',$post);
  
  log_success('Profile saved.');

}
add_listener('uc_admin_update','uc_admin_update');