
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-plus"></i> <?php echo $page_title; ?></h2>

            </div>
            <div class="box-content">
                <form role="form" method="post" class="validate">
				
                    <div class="form-group">
                        <label class="control-label" for="service_name">Service Name</label>
						
                        <select name="service_name" class="form-control required" placeholder="Enter Service Name">
						<?php foreach($data as $services){ ?>
							<option value="<?php echo $services->id; ?>"><?php echo $services->service_name; ?></option>
							<?php } ?>
						</select>
						
                    </div>
					  <div class="form-group">
                        <label class="control-label" for="service_name">Add Service Category Name</label>
						
                       <input type="text" name="sub_cat_name" class="form-control required" placeholder="Enter Sub Category Name">
						
                    </div>
					 <!--<div class="form-group">
                        <label class="control-label" for="service_name">Add Sub Category price</label>
						
                       <input type="text" name="price" class="form-control required" placeholder="Enter Sub Category Name">
						
                    </div>-->
                    
                    <button type="submit" class="btn btn-custom"><i class="glyphicon glyphicon-plus"></i> Add Service</button>
                </form>

            </div>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->


