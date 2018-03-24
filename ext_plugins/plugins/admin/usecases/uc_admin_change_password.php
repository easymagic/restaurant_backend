<?php 

function uc_admin_change_password($id){
  $post = request('post_data');

    if (__action("admin_password_match")){
      __action('entity_where','id',$id);
      __action('entity_update','user',$post);
      log_success('Password changed successfully.');
    }else{
      log_error('Passwords mismatch!');
    }

}
add_listener('uc_admin_change_password','uc_admin_change_password');
