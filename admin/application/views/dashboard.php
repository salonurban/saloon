<div class="page-container-wrap"><?php
if($this->session->flashdata('message')) {
  $message = $this->session->flashdata('message');

  ?>
<div class="alert alert-<?php echo $message['class']; ?>">
<button class="close" data-dismiss="alert" type="button">×</button>
<?php echo $message['message']; ?>
</div>
<?php
}
$menu = $this->session->userdata('admin');
?>

<div class="page-title">
              <div class="title_left">
                <h3>Dashboard</h3>
              </div>
            </div>

            <div class="clearfix"></div>
<div class="row top_tiles">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  <a href="<?php base_url(); ?>shop/view_shops">
                <div class="tile-stats">
                  <div class="icon"><i class="glyphicon glyphicon-briefcase"></i></div>
                  <div class="count"><?php echo $shops; ?></div>
                  <h3>Total Shops</h3>
                  <p>Total number of shops available overall</p>
                </div>
				</a>
              </div>
			  <?php
	if($menu=='1'){
		?>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
			   <a href="<?php base_url(); ?>customer/view_customer">
                <div class="tile-stats">
                  <div class="icon"><i class="glyphicon glyphicon-user"></i></div>
                  <div class="count"><?php echo $customers; ?></div>
                  <h3>Total Customers</h3>
                  <p>Total number of customers available overall</p>
                </div>
				</a>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="<?php base_url(); ?>user/view_user">
				<div class="tile-stats">
                  <div class="icon"><i class="glyphicon glyphicon-user"></i></div>
                  <div class="count"><?php echo $users; ?></div>
                  <h3>Total Users</h3>
                  <p>Total number of users available overall</p>
                </div>
				</a>
              </div>
			  <?php
	}
	?>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="<?php base_url(); ?>booking">
				<div class="tile-stats">
                  <div class="icon"><i class="glyphicon glyphicon-shopping-cart"></i></div>
                  <div class="count"><?php echo $bookings; ?></div>
                  <h3>Total Bookings</h3>
                  <p>Total number of bookings available overall</p>
                </div>
				</a>
              </div>
            </div>
</div>