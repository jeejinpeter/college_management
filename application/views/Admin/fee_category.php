<div class="content-wrapper">
<section class="content-header">
      <h1 class="text-center">
        S N G College of Advanced Studies 
       <br> <small>Chelannur</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li><a href="#">Fee Category</a></li>
      </ol>
    </section>
<h4>  <?php echo $this->session->flashdata('msg'); ?></h4><br>
                  
     <div class="col-md-10 col-md-offset-1">
<div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Add Fee Category</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php $attributes = array("name" => "addfee", "class" => "form-horizontal");
                echo form_open_multipart("Admin/add_fee_category_processing", $attributes);?>
				
              <div class="box-body">
                   <div class="form-group has-feedback">
                  <label for="title" class="col-sm-2 control-label">Fee Category</label>
                  <div class="col-sm-6">
                    <input type="text" name="category" placeholder="Enter Fee Category Name" class="form-control" required>
                    </div>
                <span class="text-danger"><?php echo form_error('category'); ?></span>
                  </div>
				   <div class="form-group has-feedback">
                  <label for="title" class="col-sm-2 control-label">Fee</label>
                  <div class="col-sm-6">
                     <input type="text" name="fee" placeholder="Enter Fee" class="form-control" required>
                <span class="text-danger"><?php echo form_error('fee'); ?></span>
                  </div>
				  </div>
				  
                
           </div>
                   
              <!-- /.box-body -->
              <div class="box-footer col-md-offset-4">
                <button type="reset"    class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-warning">Save</button>
              </div>
              <!-- /.box-footer -->
            <?php echo form_close(); ?>
          </div>
          </div>
          </div>
		 