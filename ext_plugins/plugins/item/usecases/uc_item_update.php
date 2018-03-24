<?php 

 function uc_item_update($id=''){
  // __action('entity_where','id',$id);
  $post_data = request('post_data');

  // $vat = __action('option_get','vat');
  // if ($vat != 'null'){
  //  $post_data['price']+=(1 * $vat);
  // }

  
  __action('entity_where','id',$id);
  __action('entity_update','item',$post_data);
  log_success('Item updated.');
 }
 add_listener('uc_item_update','uc_item_update');