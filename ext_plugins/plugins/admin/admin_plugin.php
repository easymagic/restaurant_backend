<?php 
 
 //load usecases
 init_usecases('admin');


 function admin_menu($menu){
   $r = $menu;
   $role = session('admin_account')->role;

   if ($role == 'admin'){
     $r = array_merge($r,array(array("Admin Users","admin/users","fa fa-user")));     
   }

   // $r = array_merge($r,array(array("Admin Acct.","admin/profile")));
   // $r = array_merge($r,array(array("Change Pwd.","admin/change_password")));

   // print_r($r);
   return $r;
 }
 add_listener('admin_menu','admin_menu');


 function admin_menu_top($menu){
   $r = array();
   $role = session('admin_account')->role;

   // if ($role == 'admin'){
   //   $r = array_merge($r,array(array("Admin Users","admin/users")));     
   // }

   $r = array_merge($r,array(array("Admin Acct.","admin/profile","fa fa-user")));
   $r = array_merge($r,array(array("Change Pwd.","admin/change_password","fa fa-lock")));

   // print_r($r);
   return $r;
 }
 add_listener('admin_menu_top','admin_menu_top');



 
 function admin_login(){

  save_history();
  $check=session('admin_account');

  if (!empty($check)){
    redirect('order/list');
  }
  // print_r(_db());	
  start_buffer();
  include('template/login.php');
  return __filter('default_theme',get_buffer());
 }
 add_listener('nav_admin_login','admin_login');
 add_listener('nav_home_index_new','admin_login');
 add_listener('nav_admin_index','admin_login');
 add_listener('nav_admin_','admin_login');


 function admin_welcome(){
  $user_obj = session('admin_account');

  return __filter('nav_admin_panel','<b>Welcome ,<i>Administrator.</i></b>');

 }
 add_listener('nav_admin_welcome','admin_welcome');

 
 function admin_title(){
  
  return 'Restaurant Admin';

 }
 add_listener('admin_title','admin_title');

 
 function admin_logout_text(){
   return 'Log-Out';
 }
 add_listener('admin_logout_text','admin_logout_text');


 function admin_logout_url(){
   return BASE_URL . 'actions/launch/admin/logout';
 }
 add_listener('admin_logout_url','admin_logout_url');


 function admin_panel($content=''){
 	// echo 'Called.';
  $check=session('admin_account');
  if (empty($check)){
    redirect('home/index_new');
  }	
  start_buffer();
  include('template/panel.php');
  return __filter('default_theme',get_buffer());
 }
 add_listener('nav_admin_panel','admin_panel');


// function admin_logout(){
//  session('admin_account','__unset__');
//  log_success('Just logged out.');
// } 
// add_listener('uc_admin_logout','admin_logout');


 //pages
 function admin_users(){

  save_history();
  
  __action('launch_usecase',array('admin','all'));
  $users = response('data');

  start_buffer();
  include('template/users.php');	
  return __filter('nav_admin_panel',get_buffer());
 
 }
 add_listener('nav_admin_users','admin_users');


function admin_edit($id=''){
 $item = __action('entity_get_where','user',array("id"=>$id));
 $item = $item[0];

 __action('entity_where','parent_id','0');
 __action('launch_usecase',array('table','list'));
 $tables = response('data');
 // print_r($tables);
 // print_r($item);
 start_buffer();
 include('template/edit.php');
 return __filter('nav_admin_panel',get_buffer());
}
add_listener('nav_admin_edit','admin_edit');



function admin_profile(){

 save_history(); 
 $id = session('admin_account')->id;  
 $item = __action('entity_get_where','user',array("id"=>$id));
 $item = $item[0];
 // print_r($item);
 start_buffer();
 include('template/profile.php');
 return __filter('nav_admin_panel',get_buffer());

}
add_listener('nav_admin_profile','admin_profile');


function admin_change_password(){
  save_history();
  $check=session('admin_account');

  if (!empty($check)){
    $id = session('admin_account')->id;
  }
  start_buffer();
  include('template/change_password.php');
  return __filter('nav_admin_panel',get_buffer());

}
add_listener('nav_admin_change_password','admin_change_password');



function admin_add_user(){
 save_history(); 
 start_buffer();
 include('template/add_user.php');
 return __filter('nav_admin_panel',get_buffer());
}
add_listener('nav_admin_add_user','admin_add_user');



function admin_js_support($footer=''){
  start_buffer();
  include('template/admin_js.php');
 return $footer . get_buffer();
}
add_listener('footer','admin_js_support');


function admin_user_name($id){
 $resp = __action("entity_get_where","user",array("id"=>$id));
 if (count($resp) > 0){
  return $resp[0]->first_name;
 }else{
  return 'null';
 }
}
add_listener('admin_user_name','admin_user_name');

