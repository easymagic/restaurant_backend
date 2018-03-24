<?php 
 
 function entity_add_filter($k,$v=''){
   
  db_where(array($k=>$v));

 }
 add_listener('entity_add_filter','entity_add_filter');

 function entity_reset_filter(){
 	db_where(array(),true);
 }
 add_listener('entity_reset_filter','entity_reset_filter');


 function entity_all($table){
    
    return __action('db_get',$table);

 }
 add_listener('entity_all','entity_all');



 function entity_create($table,$post){
   return __action('db_insert',$table,$post);
 }
 add_listener('entity_create','entity_create');


 function entity_update($table,$id,$post){
   __action('entity_add_filter','id',$id);
   return __action('db_update',$table,$post);
 }
 add_listener('entity_update','entity_update');


 function entity_delete($table,$id){
   __action('entity_add_filter','id',$id);
   return __action('db_delete',$table);
 }
 add_listener('entity_delete','entity_delete');

function entity_do_smart(){
 ///magic happens here
 $entity = env('uc_entity');
 $action = env('uc_action');

 if (!empty($entity)){
    if ($action == 'all'){
      return __action('entity_all',$entity);
    }else if ($action == 'create'){
      return __action('entity_create',$entity,$_REQUEST);
    }else if ($action == 'update'){
     list($id) = func_get_args();
     // echo $id . '<br />';
     return __action('entity_update',$entity,$id,$_REQUEST);
    }else if ($action == 'delete'){
     list($id) = func_get_args();	
     return __action('entity_delete',$entity,$id);
    }else{
    	return 0;
    } 
 }else{
 	return 0;
 } 	

}
add_listener('entity_do_smart','entity_do_smart');

