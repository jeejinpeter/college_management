<div class="content-wrapper">
 <section class="content-header">
      <h1 class="text-center">
        S N G College of Advanced Studies 
       <br> <small>Chelannur</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li><a href="#">Examination</a></li>
      </ol>
    </section>

<h4>  <?php echo $this->session->flashdata('msg'); ?></h4><br>
                  
     <div class="col-md-10 col-md-offset-1">
<div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title"> Add Exam</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php $attributes = array("name" => "addexam", "class" => "form-horizontal");
                echo form_open_multipart("Admin/add_exam_processing", $attributes);?>
              <div class="box-body">
                   <div class="form-group has-feedback">
                  <label for="title" class="col-sm-2 control-label">Date of Exam</label>
                  <div class="col-sm-6">
                    <input type="date" name="date" class="form-control" required>
                    </div>
                <span class="text-danger"><?php echo form_error('date'); ?></span>
                  </div>
				   <div class="form-group has-feedback">
                  <label for="title" class="col-sm-2 control-label">Course</label>
                  <div class="col-sm-6">
                    <select class="form-control"  name="course" required>
                    <option value ="">--Choose Course--</option>
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
                  <label for="title" class="col-sm-2 control-label">Type of exam</label>
                  <div class="col-sm-6">
                    <select class="form-control"  name="exam" required>
                    <option value ="">--select--</option>
                    <option value="Unit Test 1">Unit Test 1</option>
                    <option value ="Unit Test 2">Unit Test 2</option>
					<option value ="Model">Model</option>
                  </select>
                <span class="text-danger"><?php echo form_error('exam'); ?></span>
                  </div>
				  </div>
                <div class="form-group has-feedback">
                  <label for="title" class="col-sm-2 control-label">Semester</label>
                  <div class="col-sm-6">
                    <select class="form-control"  name="sem" required> 
                    <option value ="">--select--</option>
                    <?php 
     foreach($sem as $row)
     { 
       echo '<option value="'.$row->sem_id.'">'.$row->sem_code.'</option>';
     }?>
				 </select>
                <span class="text-danger"><?php echo form_error('sem'); ?></span>
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
		 