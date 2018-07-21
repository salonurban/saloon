<?php

$this->load->view('Templates/header');
//
?>
<div class="container body">
      <div class="main_container">
		
		<div class="col-md-3 left_col">
			<?php
$this->load->view('Templates/left-menu');
?>
       </div>
		
		
		<!-- top navigation -->
        <div class="top_nav">
          <?php
		  $this->load->view('Templates/header-menu');
		  ?>
        </div>
        <!-- /top navigation -->
		<div class="right_col" role="main">
		<ul class="breadcrumb">
              <li>
                  <a href="<?php echo base_url(); ?>dashboard">Dashboard</a>
              </li>
              <?php if($page_title != 'Dashboard') { ?>
              <li>
                  <a href="#"><?php echo $page_title; ?></a>
              </li>
              <?php } ?>
          </ul>
			<?php
$this->load->view($page);
?>
		</div>
		 <!-- footer content -->
       
            <?php
$this->load->view('Templates/footer');
?>
          
        <!-- /footer content -->
		
	  



</div>
	</div>