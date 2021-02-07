<div class="row">
    <div class="col-md-8 col-md-offset-1">
        <div class="panel panel-warning">
        <div class="panel-heading">
            <h4>Change Password</h4>
            </div>
<br>
            <?php $attributes = array("name" => "registrationform");
                echo form_open("Truststaff/validate_password", $attributes);?>
            <input type="hidden"  name="uid" value="<?php echo $user_data->login_id; ?>">    
				<div class="col-md-12">
				<div class="col-md-6">
                         <div class="control-group">
                                    <label class="control-label">New Password</label>
                                    
                                   <input type="password"  name="newpassword" placeholder="choose your new password..." 
                        value="<?php echo set_value('newpassword'); ?>" class="form-control span4">

                         <div style="color:red;";> <b><?php echo form_error('newpassword'); ?></b></div>
                             </div>
                             </div>
                            <div class="col-md-6"> 
							<div class="control-group ">
                            <label class="control-label">Verify New Password</label>
                        <input type="password" name="cnewpassword" 
                        placeholder="re-type the password..." value="<?php echo set_value('cnewpassword'); ?>" class="form-control span4">

                         <div style="color:red;"> <b><?php echo form_error('cnewpassword'); ?></b></div>
                               </div>     
                                </div>
                                </div>
                                <div class="box-footer col-md-offset-4">
                        	<button type="submit" class="btn btn-success">Submit</button>
								<button type="cancel" class="btn btn-default">Reset</button>
							</div>
                
                <?php echo form_close(); ?>
         </div>
    </div>
</div>