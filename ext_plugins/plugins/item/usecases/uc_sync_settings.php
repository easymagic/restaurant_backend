<?php 

function uc_sync_settings(){
  
  $resp = __action('entity_get','user_option');

  response('data',$resp);


}
add_listener('uc_sync_settings','uc_sync_settings');