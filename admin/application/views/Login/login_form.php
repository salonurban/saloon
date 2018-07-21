<div class="login-wrapper"> 

    <div class="row">
    
        <div class="well col-md-6 col-md-offset-3 text-center login-box">
        <div class="text-center login-header" style="padding-top:0px;">
            <img src="<?php echo base_url(); ?>assets/images/login_logo.png" alt="">
        </div>
        	<?php if(validation_errors()) { ?>
            <div class="alert alert-info">
                <?php echo validation_errors(); ?>
            </div>
          	<?php } ?>
            <form class="form-horizontal validate" action="" method="post">
                <fieldset>
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                        <input type="text" name="username" class="form-control required" placeholder="Username">
                    </div>
                    <div class="clearfix"></div><br>

                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                        <input type="password" name="password" class="form-control required" placeholder="Password">
                    </div>
                    <div class="clearfix"></div>

                    <div class="clearfix"></div>

                    <p class="text-center">
                        <button type="submit" class="btn btn-custom btn-md">Login</button>
                    </p>
                </fieldset>
            </form>
        </div>
        <!--/span-->
    </div><!--/row-->
</div>
