<div class="content-wrapper">
<section class="content-header">
      <h1 class="text-center">
        S N G College of Advanced Studies 
       <br> <small>Chelannur</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li><a href="#">Marks</a></li>
      </ol>
    </section>
<h4>  <?php echo $this->session->flashdata('msg'); ?></h4><br>
                  
     <div class="col-md-10 col-md-offset-1">
<div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Marks Lists</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php $attributes = array("name" => "addmark", "class" => "form-horizontal");
                echo form_open_multipart("Admin/mark_listdetails", $attributes);?>
              <div class="box-body">
                   <div class="form-group has-feedback">
                  <label for="title" class="col-sm-2 control-label">Course</label>
                  <div class="col-sm-6">
				  <select class="form-control" name="course" required>
				  <option>--Choose a Course--</option>
                  <?php 
     foreach($course as $row)
     { 
       echo '<option value="'.$row->course_id.'">'.$row->c_name.'</option>';
     }?>
				  </select>
                <span class="text-danger"><?php echo form_error('course'); ?></span>
                  </div>
				    </div>
			  
           	   <div class="form-group has-feedback">
                  <label for="semester" class="col-sm-2 control-label" placeholder="">Semester</label>
                  <div class="col-sm-6">
				   
                    <select class="form-control" name="sem" required>
<option>--Choose a Semester--</option>
                  <?php 
     foreach($sem as $row)
     { 
       echo '<option value="'.$row->sem_id.'">'.$row->sem_code.'</option>';
     }?>
			    </select>
                <span class="text-danger"><?php echo form_error('semester'); ?></span>
                  </div>
				  </div>
				     <div class="form-group has-feedback">
                  <label for="title" class="col-sm-2 control-label">Year</label>
                  <div class="col-sm-6">
                    <select class="form-control" name="batch" required>
                     <option>--Choose Batch--</option>
                  <?php 
     foreach($batch as $row)
     { 
       echo '<option value="'.$row->batch_id.'">'.$row->batch_year.'</option>';
     }?>
                  </select>
                    </div>
                <span class="text-danger"><?php echo form_error('year'); ?></span>
                  </div>
				  
           
                </div>
                   
              <!-- /.box-body -->
              <div class="box-footer col-md-offset-4">
              <button type="submit" class="btn btn-warning">Submit</button>
              </div>
			  
              <!-- /.box-footer -->
            <?php echo form_close(); ?>
          </div>
          </div>
          </div>
       