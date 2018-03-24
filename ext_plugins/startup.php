<?php 
 // $ext_plugin_path = 'ext_plugins/';
 // echo 'SU.';

function listeners($tag,$cb=''){

  static $listeners_arr = array();

  if (!isset($listeners_arr[$tag])){
    $listeners_arr[$tag] = array();
  }

  if (!empty($cb))$listeners_arr[$tag][] = $cb;

  if ($cb == '__unset__'){
    unset($listeners_arr[$tag]);
  }


  if (isset($listeners_arr[$tag])){
    return $listeners_arr[$tag];
  }else{
    return array();
  }

   

}




 function scan_plugins(){
  
  // global $ext_plugin_path;
  $path = 'ext_plugins/plugins';
    // echo $path . '<br />';
    // echo 'scnplg.';
  $dir = scandir($path);
  $dir = array_diff($dir, array('.','..'));
  
  // print_r(array(2,3,4,3900));

  foreach ($dir as $k=>$v){

      $file = 'ext_plugins/plugins/' . $v . '/' . $v . '_plugin.php';
      
      if (file_exists($file)){
        require_once($file);
      }

  }
  // print_r($dir);
 }
 
 function __filter(){
   $args = func_get_args();
   // global $_listeners_;

   


   if (count($args) > 0){

     $hook = array_shift($args);

     $listeners_ = listeners($hook);

     foreach ($listeners_ as $k=>$fn){
       if (function_exists($fn) || is_array($fn)){

        $args = call_user_func_array($fn, $args);
        
        // if (!is_array($args)){
             $args = array($args);
             // if (empty($args)){
             //   $args = array();
             // }
        // }
        
       }
     }

   }

   if (isset($args[0])){
    return $args[0];
   }else{
    return '';
   }

   

 }


 function __action(){
  return call_user_func_array('__filter', func_get_args());
 }


 function add_listener($tag,$cb){
  listeners($tag,$cb);
 }

 function remove_listener($tag){
   listeners($tag,'__unset__');
 }

 // function fetch_template($__template__='',$__data__=array()){
 //  extract($__data__);
 //  ob_start();
 //  include($__template__ . ".php");
 //  $r = ob_get_contents();
 //  ob_end_clean();
 //    return $r;  
 // }

 function start_buffer(){
  ob_start();
 }

 function get_buffer(){
  $r = ob_get_contents();
  ob_end_clean();
  return $r;
 }


 function response($k='',$v=''){
   
   static $resp = array();

   if (empty($k) && empty($v)){
     return $resp;
   }

   session($k,$v);
   
   if (is_array($v) || is_numeric($v) || !empty($v)){
     $resp[$k] = $v;
   }

   if ($v == '__unset__'){
    unset($resp[$k]);
   }

   if (isset($resp[$k])){
    return $resp[$k];
   }else{
    return '';
   } 

 }


 function env($k,$v=''){
   
   static $resp = array();

   if (empty($k) && empty($v)){
     return $resp;
   }
   
   if (is_array($v) || is_numeric($v) || !empty($v)){
     $resp[$k] = $v;
   }

   if ($v == '__unset__'){
    unset($resp[$k]);
   }

   if (isset($resp[$k])){
    return $resp[$k];
   }else{
    return '';
   } 

 }


 function request($k='',$v=''){
   
   static $resp;

   if (!isset($resp)){
    $resp = &$_REQUEST;
   }
   
   if (empty($k) && empty($v)){
     return $resp;
   }

   if (is_array($v) || is_numeric($v) || !empty($v)){
     $resp[$k] = $v;
   }

   if ($v == '__unset__'){
    unset($resp[$k]);
   }

   if (isset($resp[$k])){
    return $resp[$k];
   }else{
    return '';
   } 

 }

 function post($k,$v=''){
   static $resp;

   if (!isset($resp)){
    $resp = &$_POST;
   }

   if (empty($k) && empty($v)){
     return $resp;
   }
   
   if (is_array($v) || is_numeric($v) || !empty($v)){
     $resp[$k] = $v;
   }


   if ($v == '__unset__'){
    unset($resp[$k]);
   }


   if (isset($resp[$k])){
    return $resp[$k];
   }else{
    return '';
   } 
 }

 function session($k='',$v=''){
   static $resp;

   if (!isset($resp)){
    // print_r($_SESSION);
    $resp = &$_SESSION;
   }
   
   if (empty($k) && empty($v)){
     return $resp;
   }

   if (is_array($v) || is_numeric($v) || !empty($v)){
     $resp[$k] = $v;
   }

   if ($v == '__unset__'){
    unset($resp[$k]);
   }

   if (isset($resp[$k])){
    return $resp[$k];
   }else{
    return '';
   }

 }

 function history($v=''){
   // echo $v;
   return session('__history__',$v);
 }

 function save_history(){
  history(env('__history__'));
 }

 function log_error($msg){
   response('message',$msg);
   response('error','1');
 }

 function log_success($msg){
   response('message',$msg);
   response('error','0');
 }

 function log_reset(){
   response('message','__unset__');
   response('error','__unset__');  
 }

 function redirect($route){
  header('location:' . BASE_URL . $route);
  exit();
 }

 function controller($obj=null){
   static $ref = null;

   if ($ref == null && $obj != null){
     $ref = $obj;
   }

   return $ref;
 }

 function _db(){
   return controller()->db;
 }

 function init_usecases($dir_){
   $dir = scandir('ext_plugins/plugins/' . $dir_ . '/usecases');
   $dir = array_diff($dir, array('.','..'));

   foreach ($dir as $k=>$v){
    require_once("ext_plugins/plugins/$dir_/usecases/$v");
   }  
 }
 

 scan_plugins();

