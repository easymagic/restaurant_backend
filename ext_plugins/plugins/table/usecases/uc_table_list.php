<?php 

 function uc_table_list($id=''){

  // __action('entity_where','id',$id);

  if (!empty($id)){
   
    $record = __action('entity_get_where','table_placeholder',array("id"=>$id));
    
  }else{
    
    $record = __action('entity_get','table_placeholder');

  }

  response('data',$record);

  // log_success('Item updated.');
 }
 add_listener('uc_table_list','uc_table_list');