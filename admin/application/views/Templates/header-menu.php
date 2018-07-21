<div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo base_url();?>/assets/images/user.png" alt=""><?php
                    echo $this->session->userdata('logged_in')['username'];
					?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">                    
                    <?php if($this->session->userdata('admin')!='1'){ ?>
                    <li><a href="<?php echo base_url(); ?>user/profile"><i class="glyphicon glyphicon-user pull-right"></i> Profile</a></li>					
                    <?php } ?>
					<li><a href="<?php echo base_url(); ?>logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

				
				<li role="presentation" class="dropdown">
                  
					<a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="glyphicon glyphicon-cog"></i>  Quick Links<span
                            class="caret"></span>
                  </a>
				  <ul id="menu1" class="dropdown-menu list-unstyled " role="menu">
                        <li><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></li>
                        <li><a href="<?php echo base_url(); ?>shop/view_shops">View Shops</a></li>
                        <li><a href="<?php echo base_url(); ?>user/view_user">View Users</a></li>
                        <li><a href="<?php echo base_url(); ?>booking">View Bookings</a></li>
                        <li><a href="<?php echo base_url(); ?>logout">Logout</a></li>
                    </ul>
				    
                    
                </li>
				
				<li><a href="#" target="_blank"><i class="glyphicon glyphicon-star"></i> Visit Site</a></li>
                <!--<li>
                    <form class="navbar-search pull-left">
                        <input placeholder="Search" class="search-query form-control col-md-10" name="query"
                               type="text">
                    </form>
                </li>-->
				
              </ul>
            </nav>
          </div>