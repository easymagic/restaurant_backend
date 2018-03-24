<!-- new panel start -->


<style type="text/css">
    input.form-control{
        width: 35%;
        margin-bottom: 11px;
    }
</style>


        
        <header>
            <div class="headerwrapper">
                <div class="header-left">
                    <a href="" class="logo">
                        <img src="<?php echo base_url(); ?>assets/images/logo.jpg" alt="" style="max-width: 34%;" /> 
                    </a>
                    <div class="pull-right">
                        <a href="" class="menu-collapse">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                </div><!-- header-left -->
                
                <div class="header-right">

                    <div class="pull-right">
                        

                        <div class="btn-group btn-group-option">
                      

                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                              <i class="fa fa-caret-down"></i>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu">
		 <?php 
           $menu_config = __action('admin_menu_top',array(array("Menu","")));
		 ?>                            	

<?php 
             foreach ($menu_config as $k=>$v){
?>
                              <li><a href="<?php echo base_url() . $v[1]; ?>">

                                <!-- <i class="glyphicon glyphicon-user"></i> -->

                                <?php echo $v[0]; ?></a></li>
<?php 
 }
?>
                              
                              <li class="divider"></li>
                              <li><a href="<?php echo __filter('admin_logout_url'); ?>"><i class="glyphicon glyphicon-log-out"></i><?php echo __filter('admin_logout_text','Signout'); ?></a></li>
                            </ul>
                        </div><!-- btn-group -->
                        
                    </div><!-- pull-right -->


<div style="color: #fff;padding-top: 7px;font-size: 14px;" class="pull-right">
	Welcome Admin
</div>                    

                    
                </div><!-- header-right -->
                
            </div><!-- headerwrapper -->
        </header>
        
        <section>
            <div class="mainwrapper">



                <div class="leftpanel">
                    <div class="media profile-left">
<!--                         <a class="pull-left profile-thumb">
                            <img class="img-circle" src="images/photos/profile.png" alt="">
                        </a>
 -->                        <div class="media-body">
                            <h4 class="media-heading">Welcome Admin</h4>
                            <!-- <small class="text-muted">Beach Lover</small> -->
                        </div>
                    </div><!-- media -->
                    
                    <h5 class="leftpanel-title">Navigation</h5>

		 <?php 
           $menu_config = __action('admin_menu',array());
		 ?>
		 <ul class="nav nav-pills nav-stacked">
		 	
<li><a href=""><i class="fa fa-home"></i> <span>Dashboard</span></a></li>		 	

		 	<?php 
             foreach ($menu_config as $k=>$v){
             	if (empty($v[1])){
                 $r = 'active';
             	}else{
             	 $r = '';	
             	}
		 	?>

    <li>
    	<a href="<?php echo base_url() . $v[1]; ?>">

            <?php 
             if (isset($v[2])){
            ?>
            <i class="<?php echo $v[2]; ?>"></i>
            <?php 
             }
            ?>
             <span><?php echo $v[0]; ?></span></a>
    </li>
		 			 	
		 	<?php 
             }
		 	?>

<!--     <li>
    	<a  style="color: red;" href="<?php echo __filter('admin_logout_url'); ?>"><i class="fa fa-map-marker"></i> <span><?php echo __filter('admin_logout_text','Signout'); ?></span></a>
    </li>
 -->
	</ul>
                    
                </div><!-- leftpanel -->
                
                <div class="mainpanel">
                    
                    <div class="pageheader">
                        <div class="media">
                            <div class="pageicon pull-left">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="media-body">
                                <ul class="breadcrumb">

                                    <!-- <li><a href=""><i class="glyphicon glyphicon-home"></i></a></li> -->
                                    
                                    <li><a href="">Pages</a></li>
                                    <li>Admin Panel</li>
                                </ul>
                                <h4>Admin Panel</h4>
                            </div>
                        </div><!-- media -->
                    </div><!-- pageheader -->
                    
                    <div class="contentpanel">
                        
                        <div class="row">
                    
	<div class="col-xs-12 col-md-12" style="min-height: 200px;">
	  <?php echo $content; ?>	
	</div>


                        </div><!-- row -->  
                    
                    </div><!-- contentpanel -->
                    
                </div>
            </div><!-- mainwrapper -->
        </section>





<!-- new panel stop -->