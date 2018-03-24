<?php 

 function uc_item_delete($id=''){
  __action('entity_where','id',$id);
  __action('entity_delete','item');
  log_success('Item removed.');
 }
 add_listener('uc_item_delete','uc_item_delete');