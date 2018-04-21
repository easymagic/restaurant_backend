<?php 


function db_get(){
  $query = call_user_func_array(array(_db(),'get'), func_get_args()); // ->get($table);
  return $query->result();
}
add_listener('entity_get','db_get');

function db_order_asc($k){
  //order_by
  _db()->order_by($k,'ASC');
}
add_listener('entity_order_asc','db_order_asc');


function db_order_desc($k){
  //order_by
  _db()->order_by($k,'DESC');
}
add_listener('entity_order_desc','db_order_desc');

//count_all
function db_count_all($table){
  //order_by
  _db()->from($table);
  return _db()->count_all_results();
}
add_listener('entity_count_all','db_count_all');

// select_sum
function db_sum_field($field){
 
 _db()->select_sum($field);

}
add_listener('entity_sum_field','db_sum_field');


function db_order_random($k){
  //order_by
  _db()->order_by($k,'RANDOM');
}
add_listener('entity_order_random','db_order_random');



function db_get_where($table,$criteria){
  $query = _db()->get_where($table,$criteria);
  return $query->result();
}
add_listener('entity_get_where','db_get_where');


function db_insert($table,$data){

  $query = _db()->insert($table,$data);
  return _db()->insert_id();

} 
add_listener('entity_create','db_insert');



function db_where(){
 call_user_func_array(array(_db(),'where'), func_get_args()); //  _db()->where($k,$v);
}
add_listener('entity_where','db_where');


function db_update($table,$data){
  $query = _db()->update($table,$data);
  // return $query->result();
}
add_listener('entity_update','db_update');


function db_delete($table){
  $query = _db()->delete($table);
  // return $query->result();
}
add_listener('entity_delete','db_delete');

