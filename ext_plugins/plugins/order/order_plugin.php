<?php 

init_usecases('order');

 function order_admin_menu($menu){
   $r = $menu;
   $role = session('admin_account')->role;

   $r = array_merge($r,array(array("Customer Orders","order/list","fa fa-shopping-cart")));

   // print_r($r);
   return $r;
 }
 add_listener('admin_menu','order_admin_menu');


 function order_transaction_id($id){
   $r = md5($id);
   $r = substr($r, -5);
   return $r;
 }
 add_listener('order_transaction_id','order_transaction_id');



function order_approve($id){
 
 __action('entity_where','id',$id);
 
 $post = array();
 $post['status'] = 1;
 $post['amount_tendered'] = request('amount_tendered');
 $post['approved_by'] = session('admin_account')->id;
 $post['payment_type'] = request('payment_type');
 $post['card_split_value'] = request('card_split_value');
 $post['cash_split_value'] = request('cash_split_value');
 

 __action('entity_update','customer_order',$post);
 
 log_success('Selected order approved successfully , <a id="print-option" class="btn btn-success" data-href="' . base_url() . 'order/print_receipt/' . $id . '">Print Receipt.</a> ...');

}
add_listener('uc_order_approve','order_approve');


function uc_order_get_invoice($id){
 
 // __action('entity_where','id',$id);
 
 // $post = array();
 // $post['status'] = 1;
 // $post['amount_tendered'] = request('amount_tendered');
 // $post['approved_by'] = session('admin_account')->id;

 // __action('entity_update','customer_order',$post);
 
 log_success('Invoice generated successfully , <a id="print-option" class="btn btn-success" data-href="' . base_url() . 'order/print_invoice/' . $id . '">Print Invoice.</a> ...');

}
add_listener('uc_order_get_invoice','uc_order_get_invoice');




function order_print_receipt($id){


  $item = __action('entity_get_where','customer_order',array("id"=>$id));
  start_buffer();
  include('template/print_receipt.php'); 
  return __filter('body',get_buffer());

}
add_listener('nav_order_print_receipt','order_print_receipt');


function order_print_invoice($id){


  $item = __action('entity_get_where','customer_order',array("id"=>$id));
  start_buffer();
  include('template/print_invoice.php'); 
  return __filter('body',get_buffer());

}
add_listener('nav_order_print_invoice','order_print_invoice');




function order_void($id){
 // $post['approved_by'] = session('admin_account')->id;
 __action('entity_where','id',$id);
 __action('entity_update','customer_order',array("status"=>"0",
  "approved_by"=>session('admin_account')->id
));
 log_success('Selected order voided successfully');
}
add_listener('uc_order_void','order_void');





function order_save_filter($k,$v=''){
  $filter = session('s_filter');
  if (!is_numeric($v) && empty($v)){
    $filter = array();
  }else{
    $filter[$k] = $v;
  }
  
  session('s_filter',$filter);
}
add_listener('uc_order_save_filter','order_save_filter');


function order_save_date_filter($start='',$stop=''){
 
 __action('uc_order_save_filter','date_created > ', $start);
 __action('uc_order_save_filter','date_created < ', $stop . ' 23:59:59');

}
add_listener('uc_order_save_date_filter','order_save_date_filter');



function order_test_csv(){
  // $data = array();
  
  // $data[] = array('name'=>'name1');
  // $data[] = array('name'=>'name2');
  // $data[] = array('name'=>'name3');
  __action('export_to_excel',__action('order_format_csv_data',session('csv_items') ) );
}
add_listener('nav_order_export_csv','order_test_csv');


function order_list($page=1){

  $check=session('s_filter');

  if ( empty($check) ){
    session('s_filter',array());
  }

  $where = session('s_filter');
   
  save_history();

  start_buffer();

  $result = __action('record_management',array(
   "table"=>"customer_order",
   "sums"=>array('total_price','total_qty'),
   "limit"=>30,
   "criteria"=>$where,
   "sort"=>array("id","desc")
  ));

  $items = $result['record'];

  session('csv_items',$items); 

    // print_r($resp);

    include('template/list.php');   
 
    return __filter('nav_admin_panel',get_buffer());

}
add_listener('nav_order_list','order_list');


function order_format_csv_data($items){
  
  $r = array();
  $keys = array();
  $keys[] = array('customer_name','Customer Name');
  $keys[] = array('total_qty','Total Qty.');
  $keys[] = array('total_price','Total Price');
  $keys[] = array('payment_type','Payment Type');
  $keys[] = array('table_id','Table Location');
  $keys[] = array('status','Order Status');
  $keys[] = array('date_created','Date Created');
  $keys[] = array('card_split_value','Card Split Value');
  $keys[] = array('cash_split_value','Cash Split Value');


  foreach ($items as $row){
    $col = array();     
    foreach ($keys as $field){

      // echo $field[0] . '<br />';
     
     if ($field[0] == 'table_id'){
      $col[$field[1]] = __filter('table_name', $row->{$field[0]} );
     }else if ($field[0] == 'status'){
      $col[$field[1]] = __filter('order_status', $row->{$field[0]} );
     }else{
       $col[$field[1]] = $row->{$field[0]};      
     }


    }

    $r[] = $col;

  }
  

  return $r;

}
add_listener('order_format_csv_data','order_format_csv_data');



function order_items(){
    start_buffer();

    include('template/items.php');   
 
    return __filter('nav_admin_panel',get_buffer());
}
add_listener('nav_order_items','order_items');



function order_status($status=0){
 if ($status == 0){
   return 'Voided';
 }else if ($status == 1){
   return 'Approved';
 }else{
   return 'Pending';
 }
}
add_listener('order_status','order_status');




