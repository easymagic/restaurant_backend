<?php 

function admin_get_all(){
  // echo 'Called...';
  response('data',__action('entity_get','user'));
}
add_listener('uc_admin_all','admin_get_all');


function uc_admin_login(){
 
  
  	
  $email = request('email');
  $password = request('password');

  $resp = __action('entity_get_where','user',array(
    "email"=>$email,
    "password"=>$password
  ));

  if (count($resp) > 0){
    if ($resp[0]->status == 1){
      session('admin_account',$resp[0]);
      response('admin_account',$resp[0]);
      // log_success('Access granted.'); 
    }else{
      log_error('Account deactivated!');
    }
  }else{
    log_error('Invalid login!');
  }
}
add_listener('uc_admin_login','uc_admin_login');