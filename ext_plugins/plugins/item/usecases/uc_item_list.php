<?php 

 function uc_item_list($id=''){

  // __action('entity_where','id',$id);

  if (!empty($id)){
   
    $record = __action('entity_get_where','item',array("id"=>$id));
    
  }else{
    
    $record = __action('entity_get','item');

  }

  $r = $record;
  $vat = __action('option_get','vat');

  foreach ($record as $k=>$v){
   if ($vat != 'null'){
    $record[$k]->price_default = $v->price;
    $record[$k]->price = $v->price + $vat;
   }
    
  }

  response('data',$record);

  // log_success('Item updated.');
 }
 add_listener('uc_item_list','uc_item_list');