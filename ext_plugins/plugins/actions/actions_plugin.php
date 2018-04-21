<?php 
header('Access-Control-Allow-Origin: *'); 

function actions_launch(){
  
  
  $args = func_get_args();
  __action('launch_usecase',$args);

  //echo 'location: ' . BASE_URL . history();

  
  header('location: ' . BASE_URL . history() );

}
add_listener('nav_actions_launch','actions_launch');


function actions_api(){
  
  
  $args = func_get_args();
  __action('launch_usecase',$args);

  echo json_encode(response());
  
  // header('location: ' . BASE_URL . history() );

}
add_listener('nav_actions_api','actions_api');

