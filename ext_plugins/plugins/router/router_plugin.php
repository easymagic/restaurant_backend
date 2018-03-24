<?php 

 function router_do($args){
 
   // return __action('');
   $args = explode('/', $args);
   $package = 'home';
   $action = 'index';
   
   if (count($args) > 0){
     
     $package = array_shift($args);

     if (count($args) > 0){
      
      $action = array_shift($args);

     }

   }

   $file = "web_modules/$package/" . $package . '_module.php';
   if (file_exists($file)){
    require_once($file);
   }

   $args = array_merge(array('nav_' . $package . '_' . $action),$args);

   return call_user_func_array('__action', $args);

 }
 add_listener('route','router_do');

 //////////////////////////////////////

 function router_tpl(){
  start_buffer();
  include('template/template.php');
  return get_buffer();
 }
 add_listener('router_template','router_tpl');

 //////////////////////////////////

