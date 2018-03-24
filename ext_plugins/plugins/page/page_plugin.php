<?php 

 function page_header(){
  //bulma.css
  start_buffer();
  include('template/header.php');
  return get_buffer();
 }
 add_listener('header','page_header');


 function page_footer($footer=''){
  start_buffer();
  include('template/footer.php');
  return get_buffer() . $footer;
 }
 add_listener('footer','page_footer');


 function page_body($content=''){
  start_buffer();
  include('template/body.php');
  return get_buffer();
 }
 add_listener('body','page_body');


 function page_default_theme($content=''){
  start_buffer();
  
  include('template/default_theme.php');

  $r = get_buffer();

  return __filter('body',$r);
  
 }
 add_listener('default_theme','page_default_theme');


 function page_admin_login_header(){
  return '<div style="
    font-size: 20px;
    text-align: center;">Restaurant Admin Panel.</div>';
 }
 add_listener('admin_login_header','page_admin_login_header');


 function page_bold($vl){
  return __filter('default_theme','<b>' . $vl . '</b>');
 }
 add_listener('page_bold','page_bold');



function page_one($a='...'){
  return 'This is ' . $a;
}
add_listener('nav_one_index','page_one');

