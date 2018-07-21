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
<div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-eye-open"></i> <?php echo $page_title; ?></h2>
    </div>
    <div class="box-content">
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th class="hidden">Parent Category</th>
        <th>Category Name</th>
        <th>Parent Category</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
	foreach($parent_ctegories as $category) {
	?>
    <tr>
        <td class="hidden"><?php echo $category->parent_category; ?></td>
        <td><?php echo $category->category_name; ?></td>
        <td>
            <?php 
                if($category->parent_category!=0){
                    $get_parent_category = $this->service_model->get_parent_category_detail(array('id'=>$category->parent_category));
                    echo $get_parent_category->category_name; 
                }
                else{
                    echo "-";
                }          
            ?>
        </td>
        
       <td>
            <a class="btn btn-info btn-sm" href="<?php echo base_url(); ?>service/edit_service/<?php echo $service->id; ?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            
            <a class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>service/delete_service/<?php echo $service->id; ?>">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
        </td>
    </tr>
    <?php
	}
	?>
    </tbody>
    </table>
    </div>
    </div>
    </div>
    <!--/span-->

    </div>

<div class="modal modal-wide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>View Service</h3>
                </div>
                <div class="modal-body">
                    <p class="text-center"><img src="<?php echo base_url(); ?>assets/images/ajax-loader-4.gif" /></p>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                    <a href="#" class="btn btn-primary" data-dismiss="modal">Save changes</a>
                </div>
            </div>
        </div>
    </div>