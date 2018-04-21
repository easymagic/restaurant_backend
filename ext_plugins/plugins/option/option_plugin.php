<?php 

function option_set($k,$v){
  
  $res = __action('option_get',$k);
  
  if ($res == 'null'){
    __action('entity_create','user_option', array("name"=>$k,"value"=>$v) );
  }else{
   __action('entity_where','name',$k);	
   __action( 'entity_update','user_option' , array("name"=>$k,"value"=>$v) );
  }

}
add_listener('option_set','option_set');


function option_get($k){
 $resp = __action('entity_get_where','user_option',array("name"=>$k));
 if (count($resp) > 0){
   return $resp[0]->value;
 }else{
   return 'null';
 }
}
add_listener('option_get','option_get');



 function pref_admin_menu($menu){
   $r = $menu;
   $role = session('admin_account')->role;

   $r = array_merge($r,array(array("Site Settings","edit/prefs","fa fa-gear")));

   // print_r($r);
   return $r;
 }
 add_listener('admin_menu','pref_admin_menu');



function option_prefs(){
 
 save_history();

 start_buffer();
 include('template/prefs.php');
 return __filter('nav_admin_panel',get_buffer());
}
add_listener('nav_edit_prefs','option_prefs');



function save_settings(){
 
 __action('option_set','business_name',request('business_name'));
 __action('option_set','business_address',request('business_address'));
 __action('option_set','vat',request('vat'));

 __action('option_set','service_charge',request('service_charge'));
 __action('option_set','consumption_tax',request('consumption_tax'));
 
 __action('option_set','business_contact',request('business_contact'));

 //business_email
 __action('option_set','business_email',request('business_email'));


 log_success('Settings saved');
}
add_listener('uc_save_settings','save_settings');

