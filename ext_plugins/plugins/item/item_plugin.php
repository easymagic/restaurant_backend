<?php 

   init_usecases('item');


 function item_admin_menu($menu){
   $r = $menu;
   $role = session('admin_account')->role;

   //Recipe Items
   $r = array_merge($r,array(array("Menu","item/list/0","fa fa-spoon")));

   // print_r($r);
   return $r;
 }
 add_listener('admin_menu','item_admin_menu');


  
  function item_list($parent_id=0){
    
    __action('entity_where','parent_id',$parent_id);
    __action('launch_usecase',array("item","list"));
    
    $items = response('data');

    start_buffer();

     include('template/list.php');   
 
    return __filter('nav_admin_panel',get_buffer());
  }
  add_listener('nav_item_list','item_list');



  function item_add($parent_id=0){

    save_history();
    
    start_buffer();

     include('template/add.php');   
 
    return __filter('nav_admin_panel',get_buffer());


  }
  add_listener('nav_item_add','item_add');


  function item_edit($id=''){

    save_history();

    __action('launch_usecase',array("item","list",$id));
    
    $items = response('data');



    start_buffer();

     if (count($items) > 0){
       include('template/edit.php');   
     }else{
       echo '<h2>Invalid selection!!!</h2>';
     }
     return __filter('nav_admin_panel',get_buffer());

  }
  add_listener('nav_item_edit','item_edit');

  function item_name($id=0){
   if ($id > 0){
     __action('launch_usecase',array("item","list",$id));
     $response = response('data');
     if (count($response) > 0){
       return $response[0]->name; 
     }else{
       return 'Unknown Parent';
     }
   }else{
     return 'Parent';
   }
  }
  add_listener('item_name','item_name');

  function item_currency_format($v){
    return number_format($v);
  }
  add_listener('currency','item_currency_format');