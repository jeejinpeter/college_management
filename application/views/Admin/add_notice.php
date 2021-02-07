<div class="content-wrapper">
<section class="content-header">
      <h1 class="text-center">
        S N G College of Advanced Studies 
       <br> <small>Chelannur</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li><a href="#">Notice Board</a></li>
      </ol>
    </section>
<h4>  <?php echo $this->session->flashdata('msg'); ?></h4><br>
                  
     <div class="col-md-10 col-md-offset-1">
<div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title"> Add Notice </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php $attributes = array("name" => "addnotice", "class" => "form-horizontal");
                echo form_open("Admin/add_notice", $attributes);?>
              <div class="box-body">
                <div class="form-group has-feedback">
                  <label for="name" class="col-sm-2 control-label">Title</label>
                  <div class="col-sm-10">
                    <input type="text" name="title" class="form-control" placeholder="Title" value=""required ="required" >
					 <span class="text-danger"><?php echo form_error('title'); ?></span>
                    </div>
					
                  </div>
               
                <div class="form-group has-feedback">
                  <label for="notice" class="col-sm-2 control-label">Notice</label>
                   <div class="col-sm-10">
				   <textarea class="form-control" name ="notice" rows="3" placeholder="add notice ..."required ="required"></textarea>
                   <span class="text-danger"><?php echo form_error('notice'); ?></span>  
                  </div>				  
                </div>
				 
            <div class="form-group has-feedback">
                  <label for="name" class="col-sm-2 control-label">Date</label>
                  <div class="col-sm-10">
                    <input type="date" name="date" class="form-control" placeholder="" value="" required ="required">
                    </div>
                  </div>
				
                   
                <!--div class="form-group has-feedback">
                  <label for="sms" class="col-sm-2 control-label"> send SMS</label>

                  <div class="col-sm-10">
                                <select class="form-control">
                    <option>Yes</option>
                    <option>No</option>
                    
                  </select>
                </div>
                  </div-->
                </div>
                   
              <!-- /.box-body -->
              <div class="box-footer col-md-offset-4">
                <button type="submit"  onclick="cancelFunction()"  class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-warning">Add notice</button>
              </div>
              <!-- /.box-footer -->
            <?php echo form_close(); ?>
          </div>
          </div>
          </div>
          