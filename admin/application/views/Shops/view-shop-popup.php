<div class="row">
	<div class="col-md-12">
	<div class="x_panel">
                 <div class="x_title">
                    <h2>General Shop Details</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <!--<li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>-->
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
					<div class="col-md-9">
					<div class="form-group col-md-4">
						<div class="title-model">
							Shop Name
						</div>
						<div class="content-model">
							<?php echo $data->shop_name; ?>
						</div>
					</div>
					
					<div class="form-group col-md-4">
						<div class="title-model">
							Category
						</div>
						<div class="content-model">
							<?php 
                        if($data->category == 1) {
                        echo "Unisex"; 
                        }
                        else if($data->category == 2) {
                        echo "Male"; 
                        }
                        else if($data->category == 3) {
                        echo "Female"; 
                        }
                        ?>
						</div>
					</div>
					
					
					<div class="form-group col-md-4">
						<div class="title-model">
							Phone
						</div>
						<div class="content-model">
							<?php echo $data->phone_no; ?>
						</div>
					</div>

					<div class="form-group col-md-4">
						<div class="title-model">
							Email
						</div>
						<div class="content-model">
							<?php echo $data->email_id; ?>
						</div>
					</div>
					
					<div class="form-group col-md-4">
						<div class="title-model">
							Website
						</div>
						<div class="content-model">
							<?php echo $data->website; ?>
						</div>
					</div>
					
					<div class="form-group col-md-4">
						<div class="title-model">
							Working Hours
						</div>
						<div class="content-model">
							<?php echo $data->working_time; ?>
						</div>
					</div>
					
					<div class="form-group col-md-4">
						<div class="title-model">
							Create Date
						</div>
						<div class="content-model">
							<?php echo date("d-M-Y", strtotime($data->created_date)); ?>
						</div>
					</div>
					
					</div>
					
					
					<div class="col-md-3">
						<div class="content-model">
							<ul class="thumbnails gallery"><li class="thumbnail" data-id="<?php echo $data->image; ?>">
                            <a style="background:url(<?php echo $data->image; ?>) no-repeat; background-size:200px; width:190px; height:190px; display:block;margin:0 auto;"
                                   title="<?php echo $data->shop_name; ?>" href="<?php echo $data->image; ?>"></a></li>
                    </ul>
						</div>
					</div>
					<div class="clearfix"></div>
					
				  </div>
	</div>
	</div>
	<div class="col-md-12">
	<div class="x_panel">
                 <div class="x_title">
                    <h2>Services Offered</h2>
                    <ul class="nav navbar-right panel_toolbox">
                     <!-- <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li> <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>-->
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
						<?php
				if($services) {
					?>
						<div class="col-md-offset-3 col-md-6 col-sm-12 col-xs-12">
							<div class="table-outline">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>Name</th>
											<th>Price</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
								
					<?php
				foreach($services as $service) {
				?>
                    <tr>
                    	<td>
                        	<?php echo $service->service_name; ?>
                        </td>                       
                        <td>
                        	<?php echo $service->price; ?>
                        </td>
                        <td>
                        	<a href="javascript:void(0);" data-id="<?php echo $service->id; ?>" class="remove_services btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash icon-white"></i> Remove</a>
                        </td>
                    </tr>
                <?php
				} ?>
				</tbody>
				</table>
							</div>
						</div>
						
				<?php }
				else {
					echo '<p>No services added yet <a class="mar-left-20 btn btn-xs btn-primary" href="'.base_url().'shop/assign_service">Assign Service</a></p>';					
				}
				?>
				  </div>
				 </div>
				</div>
				  
	<div class="clearfix"></div>
	<div class="col-md-12">
	<div class="x_panel">
                 <div class="x_title">
                    <h2>Contact Details</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <!--<li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li> <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>-->
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">				  
					
					<div class="col-md-12">
					<div class="form-group col-md-4">
						<div class="title-model">
							Location
						</div>
						<div class="content-model">
							<?php echo $data->location; ?>
						</div>
					</div>
					
					<div class="form-group col-md-4">
						<div class="title-model">
							City
						</div>
						<div class="content-model">
							<?php echo $data->city; ?>
						</div>
					</div>
					
					
					<div class="form-group col-md-4">
						<div class="title-model">
							State
						</div>
						<div class="content-model">
							<?php echo $data->state; ?>
						</div>
					</div>

					<div class="form-group col-md-4">
						<div class="title-model">
							Country
						</div>
						<div class="content-model">
							<?php echo $data->country; ?>
						</div>
					</div>
					
					<div class="form-group col-md-4">
						<div class="title-model">
							Pincode
						</div>
						<div class="content-model">
							<?php echo $data->pincode; ?>
						</div>
					</div>
					
					<div class="form-group col-md-4">
						<div class="title-model">
							Description
						</div>
						<div class="content-model">
							<?php echo $data->description; ?>
						</div>
					</div>
					
					
					
					</div>
					<div class="clearfix"></div>
					
					<div class="col-md-12 map-container">
						<iframe src="https://maps.google.com/maps?q=<?php echo $data->latitude; ?>,<?php echo $data->longitude; ?>&hl=es;z=14&amp;output=embed" width="320" height="180" frameborder="0" style="border:0; width:100%;" allowfullscreen>
					</div>
					
				  </div>
	</div>
	</div>
	<div class="clearfix"></div>    

</div>

