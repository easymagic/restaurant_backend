<?php 

function uc_admin_logout(){
 session('admin_account','__unset__');
 log_success('Just logged out ...');
}
add_listener('uc_admin_logout','uc_admin_logout');