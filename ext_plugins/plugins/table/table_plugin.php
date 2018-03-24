<?php 

   init_usecases('table');


 function table_admin_menu($menu){
   $r = $menu;
   $role = session('admin_account')->role;

   $r = array_merge($r,array(array("Table Management","table/list","fa fa-table")));

   // print_r($r);
   return $r;
 }
 add_listener('admin_menu','table_admin_menu');


  
  function table_list($parent_id=0){
    
    // __action('entity_where','parent_id',$parent_id);
    __action('entity_where','parent_id',$parent_id);
    __action('launch_usecase',array("table","list"));
    
    $items = response('data');

    start_buffer();

     include('template/list.php');   
 
    return __filter('nav_admin_panel',get_buffer());
  }
  add_listener('nav_table_list','table_list');



  function table_add($parent_id=0){

    save_history();
    
    start_buffer();

     include('template/add.php');   
 
    return __filter('nav_admin_panel',get_buffer());


  }
  add_listener('nav_table_add','table_add');


  function table_edit($id=''){

    save_history();

    __action('launch_usecase',array("table","list",$id));
    
    $items = response('data');



    start_buffer();

     if (count($items) > 0){
       include('template/edit.php');   
     }else{
       echo '<h2>Invalid selection!!!</h2>';
     }
     // include('template/edit.php');   
 
     return __filter('nav_admin_panel',get_buffer());

  }
  add_listener('nav_table_edit','table_edit');

  function table_name($id){
   __action('launch_usecase',array('table','list',$id));
   
   $resp = response('data');

   if (isset($resp[0])){
    return $resp[0]->name;
   }else{
    return 'null';
   }
  }
  add_listener('table_name','table_name');


  // function table_name($id=''){

  //   if (!empty($id)){
  //     __action('entity_where','id',$id);
  //     $resp = __action('entity_get','table_placeholder');
  //     if (count($resp) > 0){
  //       return $resp[0]->name;
  //     }else{
  //       return 'No-Name';
  //     }
  //   }else{
  //     return 'No-Name';
  //   }

  // }
  // add_listener('table_name','table_name');


  // function item_name($id=0){
  //  if ($id > 0){
  //    __action('launch_usecase',array("item","list",$id));
  //    $response = response('data');
  //    if (count($response) > 0){
  //      return $response[0]->name; 
  //    }else{
  //      return 'Unknown Parent';
  //    }
  //  }else{
  //    return 'Parent';
  //  }
  // }
  // add_listener('item_name','item_name');

  // function item_currency_format($v){
  //   return number_format($v);
  // }
  // add_listener('currency','item_currency_format');