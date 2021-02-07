<div class="content-wrapper">
<section class="content-header">
      <h1 class="text-center">
        S N G College of Advanced Studies 
       <br> <small>Chelannur</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li><a href="#">Change Password</a></li>
      </ol>
    </section>
<h4>  <?php echo $this->session->flashdata('msg'); ?></h4><br>

<!-- Main content -->
    <section class="content">
<div class="col-md-12">
			 <div class="box box-warning">
				 <div class="box-header with-border">
          <h3 class="box-title">Change Password</h3>

          
        </div>
					<div class="box-body">
						<div class="col-md-12">
              <?php $attributes = array("name" => "registrationform");
                echo form_open("Admin/validate_password", $attributes);?>
          
               <div class="control-group ">
                                    <label class="control-label">New Password</label>
                                    <div class="controls">
                                       
										<input type="password"  name="newpassword" placeholder="choose your new password..." 
                        value="<?php echo set_value('newpassword'); ?>" class="form-control span4">

                         <div style="color:red;";> <b><?php echo form_error('newpassword'); ?></b></div>
                                    </div>
                                </div>
								
								
                                <div class="control-group ">
                                    <label class="control-label">Verify New Password</label>
                                    <div class="controls">
                                     
    <input type="password" name="cnewpassword" 
                        placeholder="re-type the password..." value="<?php echo set_value('cnewpassword'); ?>" class="form-control span4">

                         <div style="color:red;";> <b><?php echo form_error('cnewpassword'); ?></b></div>
                                    </div>
                                </div>
								<br/>
                        	<button type="submit" class="btn btn-success">Submit</button>
								<button type="cancel" class="btn btn-default">Reset</button>
							</div>
     
                <?php echo form_close(); ?>
    
    </div>
				</div>
			</div><!-- /.col-->
		</div>
        </div>
        </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>