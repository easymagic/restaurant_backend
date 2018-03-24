<?php 

 function logger_log_message(){
   
   $message = session('message');
   $error = session('error');

   if ($error != ''){
     
     if ($error){
      $cls = 'danger';
     }else{
      $cls = 'info';
     }

    ?>
     <div class="alert alert-<?php echo $cls; ?>"><?php echo $message; ?></div>
    <?php
     log_reset();
   }

 }
 add_listener('log_message','logger_log_message');


 function logger_g(){
  return 'Good Evening AKL.';
 }
 add_listener('nav_logger_greet','logger_g');