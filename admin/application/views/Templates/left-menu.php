<?php  
     $menu = $this->session->userdata('admin');
      // $menu = $this->session->set_userdata('logged_in');
// echo  $menu;
//exit;
?>

<div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo base_url(); ?>" class="site_title"><img src="<?php echo base_url();?>/assets/images/logo-white.png" class="hidden-xs"/></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo base_url();?>/assets/images/user.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php
                    echo $this->session->userdata('logged_in')['username'];
					?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Main menu</h3>
                <ul class="nav side-menu">
                  <li><a href="<?php echo base_url(); ?>dashboard"><i class="glyphicon glyphicon-dashboard"></i>  Dashboard</a></li>
				  					
                  <li><a><i class="glyphicon glyphicon-briefcase"></i> Shops <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url(); ?>shop/add_shop"><i class="glyphicon glyphicon-briefcase"></i>  Add Shop</a></li>
                      <li><a href="<?php echo base_url(); ?>shop/view_shops"><i class="glyphicon glyphicon-briefcase"></i>  View Shop</a></li>
                      <li><a href="<?php echo base_url(); ?>shop/assign_service"><i class="glyphicon glyphicon-briefcase"></i>  Assign service</a></li>
                    </ul>
                  </li>
				  
				  <li><a><i class="glyphicon glyphicon-user"></i> Staffs<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url(); ?>Staff/add_staff"><i class="glyphicon glyphicon-briefcase"></i>  Add Staff</a></li>
                      <li><a href="<?php echo base_url(); ?>Staff/view_staff"><i class="glyphicon glyphicon-briefcase"></i>  View Staffs</a></li>
                    </ul>
                  </li>
				  
				         <!--  <li><a><i class="glyphicon glyphicon-user"></i> Sub category<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url(); ?>service/add_subcategory"><i class="glyphicon glyphicon-briefcase"></i>  Add Service category</a></li>
                      <li><a href="<?php echo base_url(); ?>service/view_subcategory"><i class="glyphicon glyphicon-briefcase"></i>  View Service category</a></li>
                    </ul>
                  </li> -->
                       <?php
                       if( $menu==1  )
                        {
                       ?>
                       <li><a><i class="glyphicon glyphicon-user"></i> Service category<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li><a href="<?php echo base_url(); ?>service/add_category"><i class="glyphicon glyphicon-briefcase"></i>  Add Service category</a></li>
                            <li><a href="<?php echo base_url(); ?>service/view_category"><i class="glyphicon glyphicon-briefcase"></i>  View Service category</a></li>
                          </ul>
                        </li>
                        <li><a href="<?php echo base_url(); ?>service/"><i class="glyphicon glyphicon-list-alt"></i>  Services</a></li>                     
                        
                       <?php
						} 
						?>
						
						 <li><a href="<?php echo base_url(); ?>shop/gallery"><i class="glyphicon glyphicon-picture"></i>  Gallery</a></li>  
						 
						  <?php 
						if( $menu==1 )
                        {
						?>
						
						<li><a><i class="glyphicon glyphicon-certificate"></i> Customers<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url(); ?>customer/add_customer"><i class="glyphicon glyphicon-briefcase"></i>  Add Customer</a></li>
                      <li><a href="<?php echo base_url(); ?>customer/view_customer"><i class="glyphicon glyphicon-briefcase"></i>  View Customers</a></li>
                    </ul>
                  </li>
				  
				  
						
						<li><a href="<?php echo base_url(); ?>user/view_user"><i class="glyphicon glyphicon-user"></i>  Users</a></li>  
                        <?php
						}
						?>
				  
				  
				  <li><a href="<?php echo base_url(); ?>booking"><i class="glyphicon glyphicon-book"></i>  Bookings</a></li> 
				  <li><a href="<?php echo base_url(); ?>review"><i class="glyphicon glyphicon-list"></i>  Reviews</a></li> 
				  
				  
				  
				  
				   <?php 
						if( $menu==1  )
                        {
						?>
                        
						
						<li><a><i class="glyphicon  glyphicon-fire"></i> Trending<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url(); ?>trend/add_trend"><i class="glyphicon glyphicon-briefcase"></i>  Add Trend</a></li>
                      <li><a href="<?php echo base_url(); ?>trend/view_trend"><i class="glyphicon glyphicon-briefcase"></i>  View Trends</a></li>
                    </ul>
                  </li>
						
						<li><a><i class="glyphicon  glyphicon-cog"></i> Settings<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url(); ?>settings/home_slider"><i class="glyphicon glyphicon-briefcase"></i>  Home Slider</a></li>
                      <li><a href="<?php echo base_url(); ?>settings/cycle_slider"><i class="glyphicon glyphicon-briefcase"></i>  Cycle Slider</a></li>
					  <li><a href="<?php echo base_url(); ?>settings/whats_new"><i class="glyphicon glyphicon-briefcase"></i>  What's New</a></li>
                    </ul>
                  </li>
				  
						
						 <li><a href="<?php echo base_url(); ?>ad"><i class="glyphicon glyphicon-bell"></i>  Ads</a></li> 

                        
                      

                          

						
						<li><a><i class="glyphicon  glyphicon-stats"></i> Testimonials<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url(); ?>testimonials/add_testimonials"><i class="glyphicon glyphicon-briefcase"></i>  Add Testimonials</a></li>
                      <li><a href="<?php echo base_url(); ?>testimonials/view_testimonials"><i class="glyphicon glyphicon-briefcase"></i>  View Testimonials</a></li>
                    </ul>
                  </li>
                        

   <?php
 }
?>   

						
						<li><a href="<?php echo base_url(); ?>offers"><i class="glyphicon glyphicon-briefcase"></i>  Offers</a></li>
                  
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>