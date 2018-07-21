
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-plus"></i> <?php echo $page_title; ?></h2>

            </div>
            <div class="box-content">
                <form role="form" method="post" class="validate">
				
                    <div class="form-group">
                        <label class="control-label" for="parent_category">Choose Parent Category (Optional)</label>
                        <select name="parent_category" class="form-control" placeholder="">
                            <option value="">Choose Parent Category</option>
                            <?php foreach($parent_ctegories as $categories){ ?>
                                <option value="<?php echo $categories->id; ?>"><?php echo $categories->category_name; ?></option>
							<?php } ?>
						</select>
                    </div>
					<div class="form-group">
                        <label class="control-label" for="category_name">Add Service Category Name</label>
                        <input type="text" name="category_name" class="form-control required" placeholder="Enter Category Name">
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


