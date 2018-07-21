<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-plus"></i> <?php echo $page_title; ?></h2>

            </div>
            <div class="box-content">
                <form role="form" method="post" class="validate" enctype="multipart/form-data">

                    <div class="form-group ">
                        <label class="control-label" for="shop_id">Shop Name</label>
                        <div class="controls">
                        <select id="selectError" class="col-md-3" data-rel="chosen" name="shop_id" >
                            <?php

                            foreach($shops as $shop) {
                            
                            echo "<option value='".$shop->id."'>".$shop->shop_name."</option>";
                            
                                                     }
                            ?>
                        </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label" for="firstname">First name</label>
                        <input type="text" name="first_name" class="form-control required" placeholder="Enter First name">
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label" for="lastname">Last name</label>
                        <input type="text" name="last_name" class="form-control required" placeholder="Enter Last name">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="lastname">CPR no</label>
                        <input type="text" name="cpr" class="form-control required" placeholder="Enter CPR">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="lastname">Specialist</label>
                        <div class="controls">
                        <select id="selectError"  class="multiselect-ui col-md-5" data-rel="chosen" name="service_id[]" multiple="multiple"  placeholder="Select Specialist">
                            <?php
                            
                            foreach($service as $services_name) {
                            
                            echo "<option value='".$services_name->id."'>".$services_name->service_name."</option>";
                            
                                                     }
                            ?>
                        </select>
                        </div>
                       
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label" for="phone_no">Phone Number</label>
                        <input type="text" name="phone" class="form-control required" placeholder="Enter Phone Number">
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label" for="email_id">Email</label>
                        <input type="email" name="address" class="form-control required" placeholder="Enter Address ">
                    </div>
                    
                  <!--   <div class="form-group">
                        <label class="control-label" for="birthdate">Birth Date</label>
                        <input type="text" name="birthdate" class="form-control required" data-field="date" placeholder="Enter Birth Date">
                    </div> -->
                    <div id="dtBox"></div>
                    <!-- <div class="form-group col-md-12" style="padding-left:0px;">
                        <label class="control-label col-md-12" style="padding-left:0px;" for="gender">Gender</label>
                        <div class="radio-control">
                            <input type="radio" name="gender" id="radio1" value="Male" class="radio" checked/>
                            <label for="radio1" class="radio">Male</label>
                        </div>
        
                        <div class="radio-control">
                            <input type="radio" name="gender" id="radio2" value="Female" class="radio"/>
                            <label for="radio2" class="radio">Female</label>
                        </div>
                   </div>
                     -->
                    <!-- <div class="form-group">
                        <label class="control-label" for="status">Profile Status</label><br>
                        <select id="dropdown" class="col-md-3" data-rel="chosen" name="status">
                        	 <option value="1" name="aft_qst">Enable</option>
                             <option value="0" name="aft_exm">Disable</option>
                            
                        </select>    
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label" for="city">City</label>
                        <input name="city" placeholder="City" rows="3" class="form-control required"></input>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label" for="country">Country</label>
                         <input type="text" name="country" class="form-control required" placeholder="Country">
                        
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label" for="website">Website</label>
                         <input type="text" name="website" class="form-control" placeholder="Website">
                    </div> -->
                    
                    <div class="form-group">
                        <label class="control-label" for="profile_pic">Profile Picture</label>
                        <div class="form-control ">
                        <input type="file" name="profile_pic" class="required" size="20" />
                        </div>
                       
                    </div>
                    
                    <div class="checkbox">
                    <!-- <label>
                    <input type="checkbox" name="notify" /> Notify customer through mail
                    </label> -->
                    </div>
                    
                    <button type="submit" class="btn btn-custom"><i class="glyphicon glyphicon-plus"></i> Add Staff</button>
                </form>

            </div>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->


