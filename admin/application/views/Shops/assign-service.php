<?php
if($this->session->flashdata('message')) {
  $message = $this->session->flashdata('message');
  ?>
<div class="alert alert-<?php echo $message['class']; ?>">
    <button class="close" data-dismiss="alert" type="button">×</button>
    <?php echo $message['message']; ?>
</div>
<?php
}
?>
<div class="page-title">
  <div class="title_left">
    <h3><?php echo $page_title; ?></h3>
  </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12">
	 <div class="x_panel">

        <div class="x_content">
            <div class="content-container">
                <form role="form" method="post" class="validate" enctype="multipart/form-data">
                    <div class="form-group col-md-6">
                        <label class="control-label" for="shop_name">Select shop</label>
                        <div class="controls">
                            <select id="selectError" class="col-md-10 required" data-rel="chosen" name="shop_id">
                                <?php
    							foreach($shops as $shop) {
                                    echo "<option value='".$shop->id."'>".$shop->shop_name."</option>";
    							}
    							?>
                            </select>
                    	</div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label" for="service_name">Select service</label>
                        <div class="controls">
                            <select id="selectError" class="select_fileds col-md-10 required" data-rel="chosen" name="service_id">
                                <option value="">-Please Select-</option>
                                <?php
    							foreach($services as $service) {
    							    echo "<option value='".$service->id."'>".$service->service_name."</option>";
    							}
    							?>
                            </select>
                    	</div>
                    </div>
					<!-- <div class="form-group col-md-6">
                        <label class="control-label" for="service_name">Select service Category</label>
                        <div class="controls sscat">
                        <select id="selectError" class="col-md-10" data-rel="chosen" name="service_sub_cat_id">
                            <?php
							// foreach($services_sub_cat as $sub_cat) {
							
							// echo "<option value='".$sub_cat->id."'>".$sub_cat->sub_service_name."</option>";
							
							// }
							
							?>
                        </select>
                    	</div>
                    </div> -->
                    
                    <div class="form-group col-md-6">
                        <label class="control-label" for="price">Price</label>
                        <input type="text" name="price" class="form-control required col-md-10 " placeholder="Enter price">
                    </div>
                    
                    <div class="clearfix"></div>
					 <div class="ln_solid"></div>
                      <div class="form-group text-center">
							<button type="submit" class="btn btn-custom"><i class="glyphicon glyphicon-save"></i> Save</button>
					  </div>
                    <div class="clearfix"></div>
                    
                   
                </form>

            </div>
        </div>
		</div>
    </div>
    <!--/span-->

</div><!--/row-->

<script>
    $('.select_fileds').change(function(){
        
        id = $(this).val();
        alert(id);
        
        $.ajax({
            type:'POST',
            url: '<?php echo base_url('shop/get_sub_service'); ?>',
            data:{service_id:id},
            dataType:'json',
            success: function (data){
                if(data.msg=="success"){
                   console.log(data);
                    var text = '<select id="selectError" class="col-md-10" data-rel="chosen" name="service_sub_cat_id">';
                    text += '<option value=" " ></option>' ;
                    var i;
                    for (i = 0; i < data.subservices.length; i++) {
                     
                        text += '<option value="'+ data.subservices[i].id +'">'+data.subservices[i].sub_service_name+'</option>' ;
                     
                    }
                    text +='</select>';
                    $('.sscat').html(text);
                }
                else{
                    $('.sscat').html('');
                }
            }
        });
    })
</script>