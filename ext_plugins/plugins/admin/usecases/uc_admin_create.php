<?php 

function uc_admin_create(){
  $post = request('post_data');

  if (__action("admin_exists",$post['email'])){
    log_error("An account with this email already exists!");
  }else{
    if (__action("admin_password_match")){
      __action('entity_create','user',$post);
      log_success('Account created.');
    }else{
      log_error('Passwords mismatch!');
    }
  }  

}
add_listener('uc_admin_create','uc_admin_create');


function uc_admin_exists($email){
  $resp = __action('entity_get_where','user',array("email"=>$email));
  return (count($resp) > 0);
}
add_listener('admin_exists','uc_admin_exists');


function uc_admin_password_match(){
  $post = request('post_data');
  $password = request('password');

  return (!empty($password) && $password == $post['password']);
}
add_listener('admin_password_match','uc_admin_password_match');


