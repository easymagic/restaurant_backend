<?php 

function uc_table_order_sync(){
  
  $post_data = request('post_data');
  $table_id = request('current_table');

  $post = array();
  $post['table_placeholder_id'] = $table_id;
  $post['json_data'] = $post_data;

  $resp = __action('entity_get_where','table_order',array('table_placeholder_id'=>$table_id));
  
  if (count($resp) > 0){
    __action('entity_where','table_placeholder_id',$table_id);
    __action('entity_update','table_order',$post);
  }else{
  	__action('entity_create','table_order',$post);
  }

  log_success('Table updated.');


}
add_listener('uc_table_order_sync_up','uc_table_order_sync');



function uc_table_order_sync_down($table_id=''){
 
 $resp = __action('entity_get_where','table_order',array('table_placeholder_id'=>$table_id) );
 
 response('data',$resp);

}
add_listener('uc_table_order_sync_down','uc_table_order_sync_down');






function uc_table_order_create(){
  
  $post_data = request('post_data');
  $current_table = request('current_table');

  $post = array();
  $post['json_data'] = request('json_data');
  // order_checkout
  $post['date_created'] = date('Y-m-d h:i:s');
  $post['user_id'] = request('user_id');
  $post['customer_name'] = request('customer_name'); 
  $post['total_qty'] = request('total_qty');
  $post['total_price'] = request('total_price');
  $post['payment_type'] = request('payment_type');
  $post['card_split_value'] = request('card_split_value');
  $post['cash_split_value'] = request('cash_split_value');
  // $post['amount_tendered'] = request('amount_tendered');
  $post['status'] = request('status');

  $post['table_id'] = request('table_id'); // $current_table;  //$post_data['table_id'];




  __action('entity_create','customer_order',$post);

  log_success('Order created successfully');

}
add_listener('uc_table_order_create','uc_table_order_create');



//sync_to_cloud
function uc_table_order_sync_to_cloud(){

  $post_data = request('post_data');
  $post_data['table_id'] = request('table_id');

  $check = __action('entity_get_where','table_order',array("table_id"=>$post_data['table_id'] ));

  if (count($check) > 0){
    __action('entity_where','table_id',$post_data['table_id'] );
    __action('entity_update','table_order',$post_data); 
  }else{
    __action('entity_create','table_order',$post_data);
  }

  log_success('synced up');

}
add_listener('uc_table_order_sync_to_cloud','uc_table_order_sync_to_cloud');



//sync_from_cloud
function uc_table_order_sync_from_cloud(){
   
  $table_id = request('table_id');
  __action('entity_where','table_id',$table_id);
  $resp = __action('entity_get','table_order');

  if (count($resp) > 0){
    response('data',$resp[0]);
  }else{
    response('data',array());
  }
  
  log_success('synced down');
}
add_listener('uc_table_order_sync_from_cloud','uc_table_order_sync_from_cloud');



