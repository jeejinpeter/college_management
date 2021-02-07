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
              <h3 class="box-title"> Edit Fee Category</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php $attributes = array("name" => "editfee", "class" => "form-horizontal");
                echo form_open_multipart("Admin/edit_fee_category_processing", $attributes);?>
				 <?php foreach ($fee as $row){
        ?>
		<input type="hidden" name="fid" value="<?php echo $row->fc_id; ?>" class="form-control" >
		<div class="box-body">
                   <div class="form-group has-feedback">
                  <label for="title" class="col-sm-2 control-label">Fee Category</label>
                  <div class="col-sm-5">
                    <input type="text" name="category" value="<?php echo $row->fc_category; ?>" class="form-control">
                    </div>
                <span class="text-danger"><?php echo form_error('category'); ?></span>
                  </div>
				   <div class="form-group has-feedback">
                  <label for="title" class="col-sm-2 control-label">Fee</label>
                  <div class="col-sm-5">
                     <input type="text" name="fee" value="<?php echo $row->fc_fee; ?>" class="form-control">
                <span class="text-danger"><?php echo form_error('fee'); ?></span>
                  </div>
				  </div>
				 	 <?php  } 
					 ?>
					    </div>
						 <div class="box-footer col-md-offset-4">
                <button type="submit"  onclick="cancelFunction()"  class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-warning">Save</button>
              </div>   
					 <?php
					 echo form_close(); ?> 
             
        
		
          </div>
          </div>
		  </div>
          