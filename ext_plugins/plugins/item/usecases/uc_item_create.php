<?php 

 function uc_item_create($parent_id=''){
  // __action('entity_where','id',$id);
  $post_data = request('post_data');

  // $vat = __action('option_get','vat');
  // if ($vat != 'null'){
  //  $post_data['price']+=(1 * $vat);
  // }

  $post_data['date_created'] = date('Y-m-d h:i:s');
  $post_data['created_by'] = session('admin_account')->id;

  __action('entity_create','item',$post_data);
  log_success('Item added.');
 }
 add_listener('uc_item_create','uc_item_create');