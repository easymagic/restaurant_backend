<?php 

 function usecase_loader_launch_usecase($arg){
   
   $entity = array_shift($arg);
   $method = array_shift($arg);

   // $file = "usecases/$entity/uc_$entity" . '_' . $method . '.php';

   // if (file_exists($file)){
	  //  require_once($file);
	  //  call_user_func_array('__action', array_merge(array('uc_' . $entity . '_' . $method),$arg));
   // }else{
   // //array();
   // }

      call_user_func_array('__action', array_merge(array('uc_' . $entity . '_' . $method),$arg));
   

   // return __action('uc_' . $entity . '_' . $method,$arg);

 }
 add_listener('launch_usecase','usecase_loader_launch_usecase');

